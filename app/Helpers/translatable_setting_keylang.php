<?php
if (!function_exists('translatable_setting_keylang')) {
    function translatable_setting_keylang($key)
    {
        return \Illuminate\Support\Str::after($key, translatable_setting_key($key).'_');
    }
}