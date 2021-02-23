<?php
if (!function_exists('is_translatable_setting')) {
    function is_translatable_setting($key, $hasSuffix = false)
    {
        if ($hasSuffix) {
            $key = translatable_setting_key($key);
        }
        return in_array($key, config('translatable-setting.keys'));
    }
}