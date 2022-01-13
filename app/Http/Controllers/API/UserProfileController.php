<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\UserProfile;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required | email | min:6',
            'password' => 'required | min:6'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 400, 'errors' => $validator->errors(), 'test'=>$request->password]);
        } else {
            $hashedPassword = Hash::make($request->input('password'));

            $userProfile = new UserProfile();
            $userProfile->first_name = $request->input('first_name');
            $userProfile->middle_name = $request->input('middle_name', '');
            $userProfile->last_name = $request->input('last_name');
            $userProfile->nickname = $request->input('nickname', 'User');
            $userProfile->email_address = $request->input('email_address');
            $userProfile->password = $hashedPassword;
            $userProfile->access_type = $request->input('access_type', 'admin');
            $userProfile->save();

            return response()->json(['status' => 200, 'message' => 'Profile created successfully.']);
        }
    }

    /**
     * Display the specified resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
