<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainPageController extends Controller
{
    public function parallax(){
        
        return view('mainPage.showParallaxPicture');

    }
}
