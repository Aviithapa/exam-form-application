<?php

use App\Models\ApplicantExam;
use App\Models\Exam;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
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


if (!function_exists('hasPersonalInformation')) {
    /**
     * @param null $type
     * @return string
     */
    function hasPersonalInformation()
    {
        $applicant = Auth::user()->applicant;
        if (!$applicant)
            return false;
        return true;
    }
}

if (!function_exists('hasFamilyInformation')) {
    /**
     * @param null $type
     * @return string
     */
    function hasFamilyInformation()
    {
        $applicant = Auth::user()->applicant;
        if ($applicant && $applicant->familyInformation)
            return true;
        return false;
    }
}


if (!function_exists('carbon')) {
    /**
     * @param null $type
     * @return string
     */
    function carbon($date = null, $format = 'Y-m-d')
    {
        if (!$date)
            return null;
        return $date->setTimezone('Asia/Kathmandu')->format($format);
    }
}

if (!function_exists('editStatus')) {
    /**
     * @param null $type
     * @return string
     */
    function editStatus($applicantId = null)
    {
        if ($applicantId) {
            $applicantExamData = ApplicantExam::all()->where('applicant_id', $applicantId)->first();
            if ($applicantExamData && $applicantExamData->status != 'REJECTED' && $applicantExamData->status != 'NEW')
                return true;
        }
        return false;
    }
}


if (!function_exists('lockEverything')) {
    /**
     * @param null $type
     * @return string
     */
    function lockEverything()
    {
        $latestExam = Exam::latest('created_at')->first(['published']);
        return $latestExam['published'];
    }
}
