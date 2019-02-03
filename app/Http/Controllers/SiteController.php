<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public $template;
    public $vars = array();
    
    public function renderOutput(){
        return view($this->template)->with($this->vars);
    }
}
