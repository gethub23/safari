<?php

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =
            [
                'name_ar'           =>  'اسم الشركه',
                'name_en'           =>  'company name',
                'edorsement_ar'     =>  'التعهد بالعربيه',
                'edorsement_en'     =>  ' edorsement en  ',
                'facebook'          =>  'www.facebook.com',
                'messanger'         =>  'www.twitter.com',
                'instagram'         =>  'www.instagram.com',
                'wahtsapp'          =>  '01033323110',
                'phone1'            =>  '01033323111',
                'phone2'            =>  '01033323110',
                'about_ar'          =>  'عن الشركه',
                'about_en'          =>  'about company',
                'use_policy_ar'     =>  'الشروط والاحكام ',
                'use_policy_en'     =>  'Terms and Conditions',
                'site_logo'         =>  'logo.png',
                'favicon'           =>  ' fav.png  ',
                'loginBg'           =>  'loginBg.png',
                'default'           =>  'default.png',
                'sms_number'        =>  '055555555',
                'sms_password'      =>  'password',
                'sms_sender_name'   =>  'Sender Name',
            ];

        foreach($permissions as $key => $value)
        {
            DB::table('app_settings')->insert([
                'key'   => $key,
                'value' => $value,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
                ]);
        }
    }
}
