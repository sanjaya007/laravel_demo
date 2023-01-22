<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('name', 'email', 'contact')->where('status', 'Active')->get();
        if (count($users) <= 0) {
            return response()->json([
                'status' => 'success',
                'message' => 'No users registered.'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Total ' . count($users) . ' users are registered and active.',
            'data' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->address = $request->address;
            $user->contact = $request->contact;
            $user->save();
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Error creating user'
            ], 500);
        }

        return response()->json([
            'success' => 'success',
            'message' => 'User created successfully',
            'data' => $user
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json([
                'success' => 'success',
                'message' => 'User not found.'
            ]);
        }

        return response()->json([
            'success' => 'success',
            'message' => 'User found',
            'data' => $user
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json([
                'success' => 'success',
                'message' => 'User not found.'
            ]);
        }

        try {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->contact = $request->contact;
            $user->save();

            return response()->json([
                'success' => 'success',
                'message' => 'User updated successfully.',
                'data' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Error updating user.'
            ], 500);
        }
    }

    public function change_password(Request $request, $id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json([
                'success' => 'success',
                'message' => 'User not found.'
            ]);
        }

        try {
            if (!Hash::check($user->password, $request->old_password)) {
                return response()->json([
                    'success' => 'success',
                    'message' => 'Old password is wrong.',
                ]);
            }

            if ($request->new_password != $request->confirm_password) {
                return response()->json([
                    'success' => 'success',
                    'message' => 'New password not matched.',
                ]);
            }

            $user->password = $request->new_password;
            $user->save();

            return response()->json([
                'success' => 'success',
                'message' => 'Password changed successfully.',
            ]);
            return response()->json([
                'success' => 'success',
                'message' => 'User updated successfully.',
                'data' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Error changing password.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (is_null($user)) {
            return response()->json([
                'success' => 'success',
                'message' => 'User not found.'
            ]);
        }

        try {
            $user->delete();
            return response()->json([
                'success' => 'success',
                'message' => 'User deleted successfully.',
                'data' => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Error deleting user.'
            ], 500);
        }
    }
}
