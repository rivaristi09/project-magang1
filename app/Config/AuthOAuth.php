<?php

namespace Config;

class AuthOAuth
{
    public static function getProviders()
    {
        return [
            'Google' => [
                'enabled' => true,
                'keys' => [
                    'id' => 'GOOGLE_CLIENT_ID',
                    'secret' => 'GOOGLE_CLIENT_SECRET',
                ],
                'scope' => 'email profile',
            ],
            'Facebook' => [
                'enabled' => true,
                'keys' => [
                    'id' => 'FACEBOOK_APP_ID',
                    'secret' => 'FACEBOOK_APP_SECRET',
                ],
                'scope' => 'email public_profile',
            ],
        ];
    }
}
