<?php

namespace App\Http\Controllers;
use App\Components\CategoryRecusive;
use Illuminate\Http\Request;
use App\Models\Category;

class AdminProductController extends Controller
{   

    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index () {
        return view ('admin.products.index');
    }

    public function getCategory ($parentId) {
        $data = $this->category->all();
        $recusive = new CategoryRecusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function create() {
        $htmlOption = $this->getCategory($parentId = '');
        return view ('admin.products.create' ,compact('htmlOption'));
    }

    //upload file name feature image
    public function store (Request $request) {
        $filename = $request->feature_image_path->getClientOriginalName();
        $path = $request->file('feature_image_path')->storeAs('public/product', $filename);
    }
}
