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
}
