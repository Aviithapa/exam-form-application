<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function generateRandomUsername($length = 8)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $username = '';

    for ($i = 0; $i < $length; $i++) {
        $randomChar = $characters[rand(0, strlen($characters) - 1)];
        $username .= $randomChar;
    }

    return $username;
}


if (!function_exists('getSiteSetting')) {
    /**
     * @param $name
     * @return null
     */
    function getSiteSetting($name)
    {
        if ($name === 'logo_image') {
            // return App\Models\Website\SiteSetting::getLogoImage($name);
        }

        // return App\Models\Website\SiteSetting::getValue($name);
    }
}


if (!function_exists('imageNotFound')) {
    /**
     * @param null $type
     * @return string
     */
    function imageNotFound($type = null)
    {
        switch ($type) {
            case 'small':
                return 'https://via.placeholder.com/350x150';
                break;
            default:
                return 'https://via.placeholder.com/350x150';
                //return asset('images/default.png');

        }
    }
}




if (!function_exists('getImage')) {
    /**
     * @param null $type
     * @return string
     */
    function getImage($path)
    {
        return  Storage::url('documents/' . $path);
    }
}
