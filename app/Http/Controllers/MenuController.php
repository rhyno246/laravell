<?php

namespace App\Http\Controllers;

use App\Components\MenuRecusive;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menu;
    public function __construct( Menu $menu )
    {
        $this->menu = $menu;
    }


    public function index () {
        $menus = $this->menu->latest()->paginate(5);
        return view ('menu.index' , compact('menus'));
    }
    public function create ($parentId = '') {
        $htmlOption = $this->getMenus($parentId);
        return view ('menu.create', compact('htmlOption'));
    }

    
    public function store (Request $request) {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect('/menu');
    }

    public function getMenus ($parentId){
        $data = $this->menu->all();
        $recusive = new MenuRecusive($data);
        $htmlOption = $recusive->menuRecusive($parentId);
        return $htmlOption;
    }

    public function edit ($id){
        $menu = $this->menu->find($id);
        $htmlOption = $this->getMenus($menu->parent_id);
        return view('menu.edit' , compact('menu' , 'htmlOption'));
    }

    public function update ($id , Request $request){
        $this->menu->find($id)->update([
            'name' => $request-> name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect('/menu');
    }

    public function delete ($id) {
        $this->menu->find($id)->delete();
        return redirect('/menu'); 
    }
    
}
