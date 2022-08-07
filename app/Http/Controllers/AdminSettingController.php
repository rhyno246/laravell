<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSettingsRequest;
use App\Models\Setting;

class AdminSettingController extends Controller
{
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    public function index () {
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', compact('settings'));
    }
    public function create () {
        return view('admin.setting.create');
    }

    public function store (AddSettingsRequest $request) {
        $this->setting->create([
            'config_key'=> $request->config_key,
            'config_value'=>$request->config_value,
            'type' => $request->type
        ]);
        return redirect()->route('setting.index');
    }

    public function edit ($id) {
        $settingDetail = $this->setting->find($id);
        return view('admin.setting.edit', compact('settingDetail'));
    }
}
