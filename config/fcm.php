<?php

return [
    'driver' => env('FCM_PROTOCOL', 'http'),
    'log_enabled' => false,

    'http' => [
        'server_key' => env('FCM_SERVER_KEY', 'AAAA8l8uCT8:APA91bGZy6nAhD3c_Nn7yCNNO8T_3bYzi9TUfevlyV7SSEn_kXy4p7KZFBVwbMBnSLHj_XDkmyO668sHF3apYLfvGYFebYmKSgFn6SCS_0LgQaLiQo1VpA8LthCcZBhUXlvWL77EyldW'),
        'sender_id' => env('FCM_SENDER_ID', '1040978938175'),
        'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
        'server_group_url' => 'https://android.googleapis.com/gcm/notification',
        'timeout' => 30.0, // in second
    ],
];
