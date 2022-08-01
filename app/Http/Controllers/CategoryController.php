<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Components\CategoryRecusive;
use App\Models\Category;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index () {
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function create ($parentId = '') {
        $htmlOption = $this->getCategory($parentId);
        return view('admin.category.create' , compact('htmlOption'));
    }

    public function store (Request $request) {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect('/admin.categories');
    }

    public function getCategory ($parentId) {
        $data = $this->category->all();
        $recusive = new CategoryRecusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function edit ($id) {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit' , compact('category','htmlOption'));
    }


    public function update ($id , Request $request) {
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect('/admin.categories');
    }

    public function delete ($id) {
        $this->category->find($id)->delete();
        return redirect('/admin.categories'); 
    }
}
