<?php
namespace App\Components;
class MenuRecusive {

    private $data;
    private $htmlSelect = '';
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function menuRecusive ($id = 0 , $text = '') {
        foreach($this->data as $item){
            if($item['parent_id'] == $id){
                $this->htmlSelect .= "<option value=". $item['id'] .">" . $text . $item['name'] ."</option>";
                $this->menuRecusive( $item['id'] , $text . '--');
            }
        }
        return $this->htmlSelect;
    }
}