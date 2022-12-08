<?php

namespace Skcin7\LaravelLinktree;

use Illuminate\Database\Eloquent\Collection;
use Skcin7\LaravelLinktree\Models\Group;
use Skcin7\LaravelLinktree\Models\Setting;

class LinktreeManager
{
    /**
     * All settings loaded about the Linktree are stored here.
     * @var array
     */
    private array $settings = [];

//    /**
//     * Collection of groups of linktree links
//     * @var Collection
//     */
//    private Collection $groups;

    /**
     * Create a new LinktreeManager instance.
     */
    public function __construct()
    {
        foreach(Setting::all() as $setting) {
            $value = $setting->getAttribute('value');

            switch(strtolower($setting->getAttribute('type'))) {
                case 'integer':
                    $value = (int)$value;
                    break;
                case 'float':
                    $value = (float)$value;
                    break;
                case 'string':
                    $value = (string)$value;
                    break;
                case 'json':
                    $value = json_decode($value, true);
                    break;
            }

            $this->settings[$setting->getAttribute('key')] = $setting->getAttribute('value');
        }


//        $this->groups = Group::query()
//            ->withCount('links')
//            ->where('is_hidden', false)
//            ->having('links_count', '>', 0)
//            ->whereHas('links', function($query) {
//                $query->where('is_hidden', false);
//            })
//            ->orderBy('priority')
//            ->get();
    }


    public function getSetting(string $setting_key)
    {
//        return (isset($this->settings['name']) ? $this->settings['name'] : "No Name");
        return $this->settings[$setting_key];
    }

    public function setSetting(string $setting_key, mixed $setting_value)
    {
//        return (isset($this->settings['name']) ? $this->settings['name'] : "No Name");
        $this->settings[$setting_key] = (string)$setting_value;
    }

    public function saveSettings()
    {
        foreach($this->settings as $setting_key => $setting_value) {
            $setting = Setting::where('key', $setting_key)->first();

            // Create the setting on the fly if it doesn't exist already.
            if(!$setting) {
                $setting = new Setting();
                $setting->setAttribute('key', (string)$setting_key);
                $setting->setAttribute('type', "string");
            }

            $setting->setAttribute('value', (string)$setting_value);
            $setting->save();
        }
    }


    public function name()
    {
        return (isset($this->settings['name']) ? $this->settings['name'] : "No Name");
    }

    public function description()
    {
        return (isset($this->settings['description']) ? $this->settings['description'] : "No Description");
    }

    public function avatarUrl()
    {
        return (isset($this->settings['avatar_url']) ? $this->settings['avatar_url'] : asset('images/linktree/NoLinktreeAvatar_215x215.png'));
    }

    public function groups(bool|null $is_hidden = null, $order_by = "created_at", bool $must_have_links = false)
    {
//        return $this->groups;



        $groups_query = Group::query()
            ->withCount('links');

        if(is_bool($is_hidden)) {
            $groups_query
                ->where('is_hidden', $is_hidden);
        }


        if($must_have_links) {
            $groups_query
                ->having('links_count', '>', 0)
                ->whereHas('links', function($query) {
                    $query->where('is_hidden', false);
                });
        }


        $order_by_parts = explode(",", $order_by);
        if(!isset($order_by_parts[1])) {
            $order_by_parts[1] = "asc";
        }

        return $groups_query
            ->orderBy($order_by_parts[0], $order_by_parts[1])
            ->get();
    }

//    public function groupsWithLinks()
//    {
////        return $this->groups;
//
//        return Group::query()
//            ->withCount('links')
//            ->where('is_hidden', false)
//            ->having('links_count', '>', 0)
//            ->whereHas('links', function($query) {
//                $query->where('is_hidden', false);
//            })
//            ->orderBy('priority')
//            ->get();
//    }


//    public function links()
//    {
//        return Link::query()
//            ->where('is_hidden', false)
//            ->get();
//    }



}
