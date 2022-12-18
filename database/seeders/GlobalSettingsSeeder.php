<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Skcin7\LaravelGlobalSettings\Models\GlobalSetting;
use Illuminate\Support\Facades\DB;

class GlobalSettingsSeeder extends Seeder
{
    /**
     * The default global settings data to be used for the database seeds.
     * @var string[][]
     */
    private static $default_global_settings = [
        [
            'key' => 'example_associative_array',
            'value' => "{'first_name': 'Bob', 'last_name': 'Smith', 'company_name': '', 'line1': '1234 Fake Street', 'line2': '', 'city': '', 'state': '', 'postalCode': '', 'email': 'bobsmith@gmail.com', 'phone': '+1 555 555 5555'}",
            'type' => 'array',
        ],
        [
            'key' => 'example_indexed_array',
            'value' => "['Apple', 'Banana', 'Grape', 'Kiwi', 'Orange', 'Pear']",
            'type' => 'array',
        ],
        [
            'key' => 'example_boolean',
            'value' => "false",
            'type' => 'boolean',
        ],
        [
            'key' => 'example_float',
            'value' => "420.69",
            'type' => 'float',
        ],
        [
            'key' => 'example_integer',
            'value' => "9001",
            'type' => 'integer',
        ],
        [
            'key' => 'example_json',
            'value' => "{'first_name': 'Bob', 'last_name': 'Smith', 'company_name': '', 'line1': '1234 Fake Street', 'line2': '', 'city': '', 'state': '', 'postalCode': '', 'email': 'bobsmith@gmail.com', 'phone': '+1 555 555 5555'}",
            'type' => 'json',
        ],
        [
            'key' => 'example_string',
            'value' => "The quick brown fox jumps over the lazy dog.",
            'type' => 'string',
        ],
    ];

    /**
     * Run the global settings database seeds.
     * @return void
     */
    public function run()
    {
        foreach(self::$default_global_settings as $default_global_setting) {
            DB::table(GlobalSetting::tableName())->insert([
                GlobalSetting::tableKeyColumn() => $default_global_setting['key'],
                GlobalSetting::tableValueColumn() => $default_global_setting['value'],
                GlobalSetting::tableTypeColumn() => $default_global_setting['type'],
            ]);
        }
    }
}
