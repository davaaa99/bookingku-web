<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Auth;
use App\Location;
use App\Field;
use App\Http\Resources\PostCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class FieldController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct(Request $request)
    // {
    //     $this->middleware(['auth:api']);
    // }

    /**
     * Display a listing of the field.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){ 
        // try{
        //     $dataField = Field::all();
        // }catch (Exception $e){
        //     return response()->json([
        //         'message' => 'Failed retrieve data.' . $e->getMessage(),
        //         'serve' => []
        //     ],500);
        // }
       
        // return response()->json([
        //     'message' => 'Succesfully retrieved data.',
        //     'serve' => $dataField
        // ], 200);

        return new PostCollection(Field::all());
    }

    /**
     * Display a listing of the field based on id_location.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id_location){
        try{
            $field = Field::where('id_location',$id_location)->get();
        }catch (Exception $e){
            return response()->json([
                'message' => 'Failed retrieve data.' . $e->getMessage(),
                'serve' => []
            ],500);
        }
        
		return response()->json([
            'message' => 'Succesfully retrieved data.',
            'serve' => $field
        ],200);
        // return new PostCollection(Field::all());
    }
    
    /**
     * Display the specified field based on entered name of field.
     *
     * @param  String $field_name
     * @return \Illuminate\Http\Response
     */
    public function search($field_name){
        try{
            $field = Field::where('field_name','LIKE',"%$field_name%")->get();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed retrieve data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully retrieved data.',
            'serve' => $field
        ], 200);
    }

    /**
     * Create and store a new field.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       
        try{
        $field = new Field([
            'id_field' => Uuid::uuid1()->getHex(),
            'id_location' => '3cd6e3f6c8c211e9b008d017c2115739',
            'id_kind_of_field' => '111',
            'field_name' => $request->get('field_name'),
            'field_type' => $request->get('field_type'),
            // 'field_photo' => $request->get('field_photo'),
            ]);
            // $name = time().'.' . explode('/', explode(':', substr($field->field_photo, 0, strpos($field->field_photo, ';')))[''])[''];
            // \Image::make($request->get('field_photo'))->save(public_path('images/').$name);
            // $field= new FileUpload();
            // $field->field_photo = $name;
            $field->save();
        } catch (Exception $e){
            return response()->json([
            'message' => 'Failed delete data.' . $e->getMessage(),
            'serve' => []
            ],500);
        }
            return response()->json([
                'message' => 'Successfully updated field data.',
                'serve' => $field
            ], 200);
            
        
    }

    /**
     * Update the specified field in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String  $id_field
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id_field)
    // {
    //     try{
    //         $dataUser = Auth::user();

    //         $field = Field::find($id_field);
    //         $field->field_type = $request->field_type;
    //         $field->field_name = $request->field_name;
    //         $field->field_photo = $request->field_photo;
    //         $field->updated_by = $dataUser->email;
    //         $field->save();

    //     }catch(Exception $e){
    //         return response()->json([
    //             'message' => 'Failed update field data.' . $e->getMessage(),
    //             'serve' => []
    //         ], 500);
    //     }

    //     return response()->json([
    //         'message' => 'Successfully updated field data.',
    //         'serve' => []
    //     ], 200);
    // }

    /**
     * Remove the specified field from storage.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    try{
      $field = Field::find($request->id_field);
      $field->field_name = $request->field_name;
      $field->field_type = $request->field_type;
      $field->save();
    } catch (Exception $e){
        return response()->json([
        'message' => 'Failed uploaded data.' . $e->getMessage(),
        'serve' => []
        ],500);
    }
      return response()->json([
                'message' => 'Successfully updated field data.',
                'serve' => []
            ], 200);
    }


    /**
     * Remove the specified field from storage.
     *
     * @param  String $id_field
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_field){
        // try{
        //     $dataUser = Auth::user();

            $field = Field::find($id_field);
        //     $field->updated_by = $dataUser->email;
        //     $field->save();
            Field::where('id_field',$id_field)->delete();
            
        // }catch (Exception $e){
        //     return response()->json([
        //     'message' => 'Failed delete data.' . $e->getMessage(),
        //     'serve' => []
        //     ],500);
        // }

        // return response()->json([
        //     'message' => 'Succesfully deleted data.',
        //     'serve' => []
        // ],200);
    }

    
    public function edit(Request $request)
    {
        $field = Field::find($request->id);
        return $field;
    }
    
    public function detail(Request $request)
    {
        $field = Field::find($request->id);
        return $field;
    }

    public function upload(Request $request)
    {
    //    dd($request);
        try{
            $index = 1;
            $field = Field::find($request->id_field);
            foreach($request->file('photo') as $f_photo){
                $extension = $f_photo->getClientOriginalExtension();
                $photoName = $index . $request->id_field . '.' . $extension;
                $path = Storage::disk('public')->putFileAs('/fieldPhotos',$f_photo,$photoName);
                
                if($field->field_photo == NULL)
                    $field->field_photo = '/storage' . '/' . $path;
                else $field->field_photo = $field->field_photo . ';' . '/storage' . '/' . $path;
                $field->save();
                $index++;            
            } 
          
        } catch (Exception $e){
            return response()->json([
            'message' => 'Failed delete data.' . $e->getMessage(),
            'serve' => []
            ],500);
        }
    }

    public function uploadedit(Request $request)
    {
    //    dd($request);
        try{
            $index = 1;
            $field = Field::find($request->id_field);
            foreach($request->file('photo') as $f_photo){
                $extension = $f_photo->getClientOriginalExtension();
                $photoName = $index . $request->id_field . '.' . $extension;
                $path = Storage::disk('public')->putFileAs('/fieldPhotos',$f_photo,$photoName);
                
                // if($field->field_photo == NULL)
                    $field->field_photo = '/storage' . '/' . $path;
                // else $field->field_photo = $field->field_photo . ';' . '/storage' . '/' . $path;
                $field->save();
                $index++;            
            } 
          
        } catch (Exception $e){
            return response()->json([
            'message' => 'Failed delete data.' . $e->getMessage(),
            'serve' => []
            ],500);
        }
    }

}
