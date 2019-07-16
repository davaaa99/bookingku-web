<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use Ramsey\Uuid\Uuid;

class FieldController extends Controller
{
    public function index(){
    	return Field::all();
    }

    public function create(request $request){
		$data = $request->all();
		$fields = new Field();
		// $location = new Location();
    	// Location::find($id_location)->get();
    	$fields->id_field = $request->id_field;
		$field->field_type = $request->field_type;
    	$field->field_name = $request->field_name;
    	$fields = Field::create($data);
    	// DB::table('field')->insert([
    		// 'id_location' => Location::find($id_location),	
			// 'id_field' => $request->id_field,
			// 'field_name' => $request->field_name,
			// 'FieldType' => $request->field_type,
			
		// ]);
    }

    public function show(){
    	$field = Post::find($id);
    	return view('DetailLapang',compact('fields'));
    }
    public function getClientField(){
    	$db_bookingku = DB::table('fields')->where('id_field',$id_field)->get();
    }

}


