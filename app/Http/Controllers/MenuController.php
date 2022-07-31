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
        return view ('menu.index');
    }
    public function create () {
        $data = $this->menu->all();
        $recusive = new MenuRecusive($data);
        $htmlOption = $recusive->menuRecusive();
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

    
}
