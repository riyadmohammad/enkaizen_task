<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\User;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('index');
    }

    public function reg(){
        return view('registration');
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
        // dd($request->all());

        $rules = [
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email',
            'phone'    => 'required|string|unique:users,phone',
            'password' => 'required|min:4'
        ];

        $messages = [
            'name.required'     => 'Please provide your name.',
            'name.string'       => 'Please provide a valid Name.',
            'email.email'       => 'Please provide a valid Email Address.',
            'email.unique'      => 'Please provide a unique Email Address.',
            'phone.required'    => 'Please provide your Contact Number.',
            'phone.string'      => 'Please provide a valid Contact Number.',
            'phone.unique'      => 'Provided Contact Number has already been taken.',
            'password.required' => 'Please provide a Password.',
            'password.min'      => 'Password must contain minimum 4 characters with at-least one letter and one number.'
        ];




        $this
            ->validate($request, $rules, $messages);



        $contact  = $request->phone;
        $password = $request->password;

        $isChar = preg_match('/[a-zA-Z]+/', $password);
        $isNum  = preg_match('/\d+/', $password);

        if (!($isChar && $isNum)) {
                return Redirect::back()
                    ->withErrors(['Password must contain minimum 4 characters with at-least one letter and one number.']);
        }



        $user = new User;

        $user->name         = $request->input('name');
        $user->email        = $request->input('email');
        $user->phone        = $contact;
        $user->password     = Hash::make($password);
        // $user->token        = Str::uuid();

        try {

            $user->save();
            // dd($request->all());
        } catch (QueryException $ex) {
            return Redirect::back()
            ->withErrors(['Some Error happend']);
        }

        return redirect('/');
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
