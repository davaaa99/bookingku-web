<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class FieldController extends Controller
{
	//untuk get all data
    public function index(){
    	return Field::all();
    }

	//input atau store data
    public function create(request $request){
		// $data = $request->all();
		$fields = new Field();
		// $location = new Location();
		// Location::find($id_location)->get();
		// $kind_of_Field = new KindOfField();
		// KindOfField::find($id_kind_of_field)->get();
    	$fields->id_field =  (string) Str::uuid();
		$fields->field_type = $request->field_type;
    	$fields->field_name = $request->field_name;
		$fields->save();
		return $fields;
    }
	
	// untuk mendapatkan lapang berdasarkan id lokasi
    public function getLapangLocation($id_location){
		$field = Field::where('id_location',$id_location)->get();
		return $field;
	}
	
	// mendapatkan lapang berdasarkan id lapang
	public function getLapangDetail($id_field){
		$field = Field::where('id_field',$id_field)->get();
		return $field;
	}

}




















// DB::table('field')->insert([
    		// 'id_location' => Location::find($id_location),	
			// 'id_field' => $request->id_field,
			// 'field_name' => $request->field_name,
			// 'FieldType' => $request->field_type,
			
		// ]);

// public function show(){
    // 	$field = Post::find($id);
    // 	return view('DetailLapang',compact('fields'));
	// }