<?php

namespace App\Console\Commands;

use TCG\Voyager\Facades\Voyager;
use Illuminate\Console\Command;

class TranslatableSetting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'translatable:setting {key}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a settings key translatable';
    
    public $configName = 'translatable-setting';
    public $config = [];
    
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->config = config($this->configName);
    }
    
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (!isset($this->config['keys'])) $this->config['keys'] = [];
        $key = $this->argument('key');
        $this->config['keys'][] = $key;
        $this->config['keys'] = array_values(array_unique($this->config['keys']));
        $langs = config('voyager.multilingual.locales');
        
        $settingModel = Voyager::model('Setting');
        $setting = $settingModel->where('key', $key)->first();
        if (!$setting) return;
        
        $settingLangs = [];
        foreach ($langs as $lang) {
            $settingLangs[] = [
                'key'           => $setting->key.'_'.$lang,
                'display_name'  => $setting->display_name.' '.$lang,
                'value'         => $setting->value,
                'details'       => $setting->details,
                'type'          => $setting->type,
                'order'         => $setting->order,
                'group'         => $setting->group,
            ];
        }
        $settingModel->insert($settingLangs);
        $setting->delete();
        $this->save();
    }
    
    private function getConfigPath()
    {
        return base_path("config/{$this->configName}.php");
    }
    
    public function save()
    {
        return file_put_contents(
            $this->getConfigPath(),
            '<?php return ' . var_export($this->config, true) . ';'
        );
    }
    
    
}