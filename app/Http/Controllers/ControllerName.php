<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerName extends Controller
{
    public function returnString () {
        return "hello world";
    }

     public function returnParam ($param) {
        return "hello . $param";
    }
    public function returnJson () {
        return response() -> json(["hello ", "hello1"]);
    }

}
