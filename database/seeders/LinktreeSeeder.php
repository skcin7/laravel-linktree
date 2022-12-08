<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Skcin7\LaravelLinktree\Models\Setting;
use Skcin7\LaravelLinktree\Models\Group;
use Skcin7\LaravelLinktree\Models\Link;

class LinktreeSeeder extends Seeder
{
    private static $settings = [
        [
            'key' => 'impressions',
            'value' => 0,
            'type' => 'integer',
        ],
        [
            'key' => 'name',
            'value' => "Your Name",
            'type' => 'string',
        ],
        [
            'key' => 'description',
            'value' => "Optional Description",
            'type' => 'string',
        ],
        [
            'key' => 'avatar_url',
            'value' => "",
            'type' => 'string',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::$settings as $setting) {
            $linktree_setting = new Setting();
            $linktree_setting->setAttribute('key', $setting['key']);
            $linktree_setting->setAttribute('value', $setting['value']);
            $linktree_setting->setAttribute('type', $setting['type']);
            $linktree_setting->save();
        }

        $linktree_group = new Group();
        $linktree_group->setAttribute('name', "Example Linktree Group");
        $linktree_group->setAttribute('description', "An example of the most basic Linktree group.");
        $linktree_group->save();

        $linktree_link = new Link();
        $linktree_link->group()->associate($linktree_group);
        $linktree_link->setAttribute('name', "Example Link");
        $linktree_link->setAttribute('description', "An example of the most basic Linktree link.");
        $linktree_link->setAttribute('href', "https://my-web-app.io/");
        $linktree_link->save();

    }
}
