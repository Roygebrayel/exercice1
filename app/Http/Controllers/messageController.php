<?php

namespace App\Http\Controllers;

use App\Models\message;
use Illuminate\Http\Request;

class messageController extends Controller
{
    public function create(){
        $obj = new message();
        $obj -> name = "item1";
        $obj -> description= "this is my description";
        $obj -> phone= "7493794";
        $obj -> save();
        return response()->json(["message" => "the item was created"],201);


    }
    public function create2(){
      message::create(
        [
            "name" => "item1",
            "description" => "this is the description",
            "price" => 20.0
        ]
        );
return response()-> json(["the message was created"],201);
    }

        public function delete($id){
     
            $obj = message::find($id);
            $obj->delete();
            $obj = message::where('id',">",0)->delete();
            return "i am a deleted";

    }


        public function edit($id){
     
            $obj = message::find($id);
            $obj->name = "item 1 updated";
            $obj->description = "item 1 updated";
            $obj->save();
            $obj = message::where('id' , ">",0)
            ->update(["name"=>"item updated","description"=>"updated mass"]);
            return response()-> json(["message"=>"the item was updated"],201);
           

            

    }
    

}
