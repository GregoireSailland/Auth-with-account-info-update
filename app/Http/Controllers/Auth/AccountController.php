<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\User;
use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
class AccountController extends Controller  //old name : HomeController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        //dd($this);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        /*$user = Auth::user();
        return print_r($user,true);*/
        //return view('logged-in');
        $user = auth()->user();
        //dd($user);
        return view('auth.account', compact('user'));
        
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'. $user->id,
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function update(Request $request)
    {   
        $user=auth()->user();
        $validated = $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id.',id',
            'password' => 'required|string|min:6|confirmed',
        ]);
        //dd($validated);
        $selection = User::find($user->id);
        $success=$selection->update([
            'name' => auth()->user()->name,
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        //dd($success);
        return redirect()->route('account')->with('success', 'Account informations updated successfully');
    }
    /*
    public function update(PostRequest $request, User $user)
    {   
        //$user = Auth::user();
        //return print_r($user,true);

        //return view('logged-in');

        $user = auth()->user();

         $this->authorize('update',$user);
        //$post->update($request->all());
        $post->update($this->params($request));
        return redirect()->route('admin.posts.edit', ['id' => $post->id])->with('success', 'Post updated successfully');

        dd($user);
    }
    */


}
