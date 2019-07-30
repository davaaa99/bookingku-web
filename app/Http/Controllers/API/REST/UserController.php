<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

    /**
     * Display a listing of the Client.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClient()
    {
        try{
            $clients = User::where('user_type',2)->get();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed retrieve data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully retrieved data.',
            'serve' => $clients
        ], 200);
    }

    /**
     * Display a listing of the User.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUser()
    {
        try{
            $clients = User::where('user_type',3)->get();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed retrieve data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully retrieved data.',
            'serve' => $clients
        ], 200);
    }

    /**
     * Display the specified Client based on name.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchClient($name)
    {
        try{
            $clients = User::where('user_type',2)
                                ->where('name','LIKE',"%$name%")
                                ->get();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed retrieve data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully retrieve data.',
            'serve' => $clients
        ], 200);
    }

    /**
     * Display the specified User based on name.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchUser($name)
    {
        try{
            $clients = User::where('user_type',3)
                                ->where('name','LIKE',"%$name%")
                                ->get();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed retrieve data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully retrieve data.',
            'serve' => $clients
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified client in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $dataUser = Auth::user();

            $client = User::find($dataUser->id_user);
            $client->email = $request->email;
            $client->password = $request->password;
            $client->name = $request->name;
            $client->account_number = $request->account_number;
            $client->phone_number = $request->phone_number;
            $client->user_photo = $request->user_photo;
            $client->updated_by = $dataUser->email;
            $client->save();

        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed update client data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully updated client data.',
            'serve' => $client
        ], 200);
    }

    /**
     * Remove the specified client from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            User::where('id_user',$id)->delete();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed delete data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully deleted data.',
            'serve' => []
        ], 200);
    }
}
