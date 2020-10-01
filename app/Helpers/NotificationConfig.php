<?php

	use App\Models\SmsEmailNotification;
	use LaravelFCM\Facades\FCM;
	use LaravelFCM\Message\OptionsBuilder;
	use LaravelFCM\Message\PayloadDataBuilder;
	use LaravelFCM\Message\PayloadNotificationBuilder;

	#one signal notification code to user
	function OneSignalToUser( $device_id, $notification )
	{
		$ids      = $device_id;
		$database = SmsEmailNotification ::first();

		$fields
			= [
			'app_id'             => $database -> oneSignal_application_id,
			'include_player_ids' => [ $ids ],
			'data'               => [ "foo" => "bar" ],
			'contents'           => $notification
		];

		$fields = json_encode( $fields );

		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications" );
		curl_setopt( $ch, CURLOPT_HTTPHEADER,
		             array( 'Content-Type: application/json; charset=utf-8', 'Authorization: Basic ' . $database -> oneSignal_authorization ) );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
		curl_setopt( $ch, CURLOPT_HEADER, FALSE );
		curl_setopt( $ch, CURLOPT_POST, TRUE );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $fields );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );

		$response = curl_exec( $ch );
		curl_close( $ch );
	}

	#one signal notification code to all
	function OneSignalToAll( $notification )
	{

		$database = SmsEmailNotification ::first();

		$fields = array(
			'app_id'            => $database -> oneSignal_application_id,
			'included_segments' => array( 'All' ),
			'data'              => array( "foo" => "bar" ),
			'contents'          => $notification
		);

		$fields = json_encode( $fields );

		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications" );
		curl_setopt( $ch, CURLOPT_HTTPHEADER,
		             array( 'Content-Type: application/json; charset=utf-8', 'Authorization: Basic ' . $database -> oneSignal_authorization ) );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
		curl_setopt( $ch, CURLOPT_HEADER, FALSE );
		curl_setopt( $ch, CURLOPT_POST, TRUE );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $fields );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );

		$response = curl_exec( $ch );
		curl_close( $ch );
	}


	function SendFCM( $device_id, $sent_data, $device_type = 'android' )
	{

        $sent_data['priority']='high';
		$optionBuilder = new OptionsBuilder();
		$optionBuilder -> setTimeToLive( 60 * 20 );
        $priority = 'high';// or 'normal'
        $optionBuilder->setPriority($priority);


		$notificationBuilder = new PayloadNotificationBuilder( $sent_data['title']);
		$notificationBuilder -> setTitle( $sent_data[ 'title' ]  ) -> setBody( $sent_data[ 'body' ] ) -> setSound( 'default' );

		$option       = $optionBuilder -> build();
		$notification = $notificationBuilder -> build();
		$dataBuilder  = new PayloadDataBuilder();
		$dataBuilder -> addData( $sent_data );

		$data  = $dataBuilder -> build();
		$token = $device_id;

		if ( $device_type == 'ios' || $device_type == 'web'  ) {
			$downstreamResponse = FCM ::sendTo( $token, $option, $notification, $data );
		} else {
			$downstreamResponse = FCM ::sendTo( $token, $option, null, $data );
		}

		$downstreamResponse -> numberSuccess();
		$downstreamResponse -> numberFailure();
		$downstreamResponse -> numberModification();

		dd( $downstreamResponse);

	}

	function availableUser( $user )
	{
		if ( $user -> mute_notifications )
			return 0;
		return 1;


	}


	function notifyUser( $user, $not )
	{
//		if ( availableUser( $user ) ) {

			//            dd($user->device);
			foreach ( $user -> devices as $device ) {
				if ( $device -> device_id && $device -> device_type )
					SendFCM( $device -> device_id, $not, $device -> device_type );

			}
//		}

	}
