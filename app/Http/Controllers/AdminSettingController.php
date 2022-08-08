<?php

namespace App\Http\Controllers;
use App\Traits\DeleteModelTrait;
use App\Http\Requests\AddSettingsRequest;
use App\Models\Setting;

class AdminSettingController extends Controller
{
    use DeleteModelTrait;
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

    public function update (AddSettingsRequest $request,$id){
        $this->setting->find($id)->update([
            'config_key'=> $request->config_key,
            'config_value'=>$request->config_value,
            'type' => $request->type
        ]);
        return redirect()->route('setting.index');
    }   
    public function delete ($id){
        return $this->deleteModelTrait($id, $this->setting);
    }
}
