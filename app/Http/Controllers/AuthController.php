<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function login(Request $request){
        $rules = [
            'email'    => 'required|email',
            'password' => 'required|string'
        ];

        $messages = [
            'email.required'    => 'Please provide email address.',
            'email.email'       => 'Please provide a valid email address.',
            'password.required' => 'Please provide your password.',
            'password.string'   => 'Please provide a valid password.'
        ];

        $this->validate($request, $rules, $messages);

        $email    = $request->email;
        $password = $request->password;

        $auth = Auth::attempt([
            'email'    => $email,
            'password' => $password,
        ]);

        if (!$auth) {
            return Redirect::back()
                ->withErrors(['password', 'You have provided the wrong credentials.']);
        } else {
            $loggedUser = Auth::user();

            if (!in_array((int)$loggedUser->user_role_id, [1, 2, 3, 4])) {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return Redirect::back()
                    ->withErrors(['permission', 'You don\'t have permission to access.']);
            }
        }

        return redirect('');
    }



    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
