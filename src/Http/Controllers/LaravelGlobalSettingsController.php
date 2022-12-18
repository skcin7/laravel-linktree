<?php

namespace Skcin7\LaravelGlobalSettings\Http\Controllers;

use Illuminate\Http\Request;
use Skcin7\LaravelGlobalSettings\Models\GlobalSetting;
use Illuminate\Support\Facades\Config;

class LaravelGlobalSettingsController extends Controller
{
    public function index(Request $request)
    {
        $global_settings = GlobalSetting::all();
        return view('global_settings::global_settings', [
            'global_settings' => $global_settings,
        ]);
    }

    public function about(Request $request)
    {
        dd('About');
    }

    private function createOrUpdateFromRequest(Request $request, GlobalSetting $global_setting)
    {
        $global_setting->setAttribute(GlobalSetting::tableKeyColumn(), $request->input('key'));
        $global_setting->setAttribute(GlobalSetting::tableValueColumn(), $request->input('value'));
        $global_setting->setAttribute(GlobalSetting::tableTypeColumn(), $request->input('type'));
        $global_setting->save();
        return $global_setting;
    }

    public function create(Request $request)
    {
        $request->validate(GlobalSetting::validationRules());

        $new_global_setting = new GlobalSetting();
        $new_global_setting = $this->createOrUpdateFromRequest($request, $new_global_setting);


    }

    public function update(Request $request, string $key)
    {
        $request->validate(GlobalSetting::validationRules());

        $existing_global_setting = GlobalSetting::where(GlobalSetting::tableKeyColumn(), $key)->firstOrFail();
        $existing_global_setting = $this->createOrUpdateFromRequest($request, $existing_global_setting);


    }

    public function delete(Request $request, string $key)
    {
        $existing_global_setting = GlobalSetting::where(GlobalSetting::tableKeyColumn(), $key)->firstOrFail();
        $existing_global_setting->delete();

        return redirect()->route(Config('global_settings.routes.name_prefix') . 'index')
            ->with('flash_message', [
                'message' => 'The global setting <strong>' . $existing_global_setting->getAttribute('key') . '</strong> has been successfully deleted!',
                'type' => 'success',
            ]);
    }


}
