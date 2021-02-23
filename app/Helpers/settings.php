<?php
if (!function_exists('settings')) {
    function settings($key, $default = null)
    {
        if (is_translatable_setting($key)) $key = $key . '_' . app()->getLocale();
        $voyager = app('\TCG\Voyager\Voyager');
        $globalCache = config('voyager.settings.cache', false);
        
        if ($globalCache && \Cache::tags('settings')->has($key)) {
            return \Cache::tags('settings')->get($key);
        }
        
        if ($voyager->setting_cache === null) {
            if ($globalCache) {
                // A key is requested that is not in the cache
                // this is a good opportunity to update all keys
                // albeit not strictly necessary
                \Cache::tags('settings')->flush();
            }
            foreach ($voyager->model('Setting')->all() as $setting) {
                @$voyager->setting_cache[$setting->key] = $setting->value;
                if ($globalCache) {
                    \Cache::tags('settings')->forever($setting->key, $setting->value);
                }
            }
        }
        
        return @$voyager->setting_cache[$key] ?: $default;
    }
}