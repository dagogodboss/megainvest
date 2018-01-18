<?php

use App\Helper\FunctionInitializer;
use App\Helpers\General\HtmlHelper;
use App\Helper\Model\ModelInitializer;

if (! function_exists('app_name')) {
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('powered_by')) {
    function powered_by()
    {
        return 'Powered By '. app_name();
    }
}

if (! function_exists('api')) {
    /**
     * Helper to grab the application api used in the site.
     *
     * @return mixed
     */
    function api($value)
    {
        return config('api.'.$value);
    }
}

if (! function_exists('model')) {
    function model()
    {
        return new ModelInitializer();
    }
}

if (! function_exists('sitefunc')) {
    function sitefunc()
    {
        return new FunctionInitializer();
    }
}

if (! function_exists('check')) {
    function check($data){
        if($data != null){
            return true;
        }
        return false;
    }
}

if (! function_exists('hashThis')) {
    function hashThis($uuid)
    {
        return hash('sha256', $uuid.config('app.salt'));
    }
}

if (! function_exists('message')) {
    /**
     * Helper to grab the application messages.
     *
     * @return mixed
     */
    function message($value)
    {
        return config('messages.'.$value);
    }
}

if (! function_exists('icons')) {
    /**
     * Helper to grab the application messages.
     *
     * @return mixed
     */
    function icons($value)
    {
        return config('icons.'.$value);
    }
}

if (! function_exists('LogUser')) {
    /**
     * Helper to grab the application Log In User.
     *
     * @return mixed
     */
    function LogUser()
    {
        return Auth::user();
    }
}
if (! function_exists('json_success')) {
    /**
     * Helper to grab the application Json Success Message.
     *
     * @return mixed
     */
    function json_success()
    {
        return response()->json([
            'success' => 'true'
        ], 200);;
    }
}
