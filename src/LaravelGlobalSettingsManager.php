<?php

namespace Skcin7\LaravelGlobalSettings;

use Illuminate\Database\Eloquent\Collection;
use Skcin7\LaravelGlobalSettings\Models\GlobalSetting;

class LaravelGlobalSettingsManager
{
//    /**
//     * All settings loaded about the Linktree are stored here.
//     * @var array
//     */
//    private $global_settings = [];
//
//    /**
//     * Create a new LaravelGlobalSettingsManager instance.
//     */
//    public function __construct()
//    {
//        foreach(GlobalSetting::all() as $global_setting) {
//            $value = $global_setting->getAttribute('value');
//
//            switch(strtolower($global_setting->getAttribute('type'))) {
//                case 'array':
////                    $value = (array)$value;
//                    $value = json_decode((string)$value, true);
//                    break;
//                case 'boolean':
//                    $value = (bool)filter_var($value, FILTER_VALIDATE_BOOL);
//                    break;
//                case 'float':
//                    $value = (float)$value;
//                    break;
//                case 'integer':
//                    $value = (int)$value;
//                    break;
//                case 'json':
//                    $value = json_decode($value, true);
//                    break;
//                case 'string':
//                    $value = (string)$value;
//                    break;
//            }
//
//            $this->global_settings[$global_setting->getAttribute('key')] = $value;
//        }
//    }

//    /**
//     * @param $format
//     * @return array|false|string
//     */
//    public function all($format = "array")
//    {
//        if($format == "json") {
//            return json_encode($this->global_settings);
//        }
//        else if($format == "json_pretty") {
//            return json_encode($this->global_settings, JSON_PRETTY_PRINT);
//        }
//        return $this->global_settings;
//    }

    /**
     * All the global settings instances are stored here.
     * @var array
     */
    private $global_settings;

    /**
     * Create a new LaravelGlobalSettingsManager instance.
     */
    public function __construct()
    {
        foreach(GlobalSetting::all() as $global_setting) {
            $this->global_settings[$global_setting->getAttribute('key')] = $global_setting;
        }

//        $this->global_settings = GlobalSetting::all();

//        foreach(GlobalSetting::all() as $global_setting) {
//            $value = $global_setting->getAttribute('value');
//
//            switch(strtolower($global_setting->getAttribute('type'))) {
//                case 'array':
////                    $value = (array)$value;
//                    $value = json_decode((string)$value, true);
//                    break;
//                case 'boolean':
//                    $value = (bool)filter_var($value, FILTER_VALIDATE_BOOL);
//                    break;
//                case 'float':
//                    $value = (float)$value;
//                    break;
//                case 'integer':
//                    $value = (int)$value;
//                    break;
//                case 'json':
//                    $value = json_decode($value, true);
//                    break;
//                case 'string':
//                    $value = (string)$value;
//                    break;
//            }
//
//            $this->global_settings[$global_setting->getAttribute('key')] = $value;
//        }
    }

    const PACKAGE_NAME = "Laravel Global Settings";
    const PACKAGE_VERSION = "1.0.0-beta";
    const AUTHOR = "Nick Morgan";
    const CONTACT = "nick@nicholas-morgan.com";

    public function about()
    {
        return self::PACKAGE_NAME . " (v" . self::PACKAGE_VERSION . ")" . " | Made By: " . self::AUTHOR . " <" . self::CONTACT . ">";
    }

    public function all()
    {
        return $this->global_settings;
    }

    /**
     * @param mixed|null $key
     * @return mixed
     */
    public function get(mixed $key = null)
    {
        if(is_string($key) && isset($this->global_settings[$key])) {
            return $this->global_settings[$key];
        }
        return $this->global_settings;
    }


    public function set(string $key, mixed $value)
    {
        $this->global_settings[$key] = (string)$value;
    }

    public function save()
    {
        foreach($this->global_settings as $key => $global_setting) {
            DB::connection(GlobalSetting::databaseConnection())
                ->table(GlobalSetting::tableName())
                ->updateOrInsert(
                    [GlobalSetting::tableKeyColumn() => $key],
                    [
                        GlobalSetting::tableKeyColumn() => $global_setting['key'],
                        GlobalSetting::tableValueColumn() => $global_setting['value'],
                        GlobalSetting::tableTypeColumn() => $global_setting['type'],
                    ]
                );
        }

//        foreach($this->settings as $setting_key => $setting_value) {
//            $setting = Setting::where('key', $setting_key)->first();
//
//            // Create the setting on the fly if it doesn't exist already.
//            if(!$setting) {
//                $setting = new Setting();
//                $setting->setAttribute('key', (string)$setting_key);
//                $setting->setAttribute('type', "string");
//            }
//
//            $setting->setAttribute('value', (string)$setting_value);
//            $setting->save();
//        }




    }



}
