<?php

namespace App\Http\Controllers;

use App\Models\Silde;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminSliderController extends Controller
{
    use StorageImageTrait , DeleteModelTrait;
    private $slide;
    public function __construct(Silde $slide)
    {
        $this->slide = $slide;
    }
    public function index () {
        $slider = $this->slide->latest()->paginate(5);
        return view('admin.slider.index', compact('slider'));
    }
    public function create () {
        return view ('admin.slider.create');
    }

    public function store (Request $request) {
        try {
            $dataSlider = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataSliderImage = $this->storageTraitUpload($request , 'feature_image_path', 'slider');
            if(!empty($dataSliderImage)){
                $dataSlider['image_name'] = $dataSliderImage['file_name'];
                $dataSlider['image_path'] = $dataSliderImage['file_path'];
            }
            $this->slide->create($dataSlider);
            return redirect()->route('slider.index');

        } catch (\Exception $exception) {
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }

    public function update(Request $request ,  $id){
        try {
            $dataSliderUpdate = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataSliderImage = $this->storageTraitUpload($request , 'feature_image_path', 'slider');
            if(!empty($dataSliderImage)){
                $dataSliderUpdate['image_name'] = $dataSliderImage['file_name'];
                $dataSliderUpdate['image_path'] = $dataSliderImage['file_path'];
            }
            $this->slide->find($id)->update($dataSliderUpdate);
            return redirect()->route('slider.index');
        } catch (\Exception $exception) {
            Log::error('Message : ' . $exception->getMessage() . '-----------------Line : ' . $exception->getLine());
        }
    }

    public function edit($id) {
        $sliderDetail = $this->slide->find($id);
        return view('admin.slider.edit', compact('sliderDetail'));
    }
    public function delete ($id){   
        return $this->deleteModelTrait($id, $this->slide);
    }
}
