<?php
if (!function_exists('translatable_setting_key')) {
    function translatable_setting_key($key)
    {
        $langs = config('voyager.multilingual.locales');
        foreach ($langs as $lang) {
            $key = \Illuminate\Support\Str::before($key, '_'.$lang);
        }
        return $key;
    }
}