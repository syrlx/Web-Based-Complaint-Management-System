<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Listing;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/user_dashboard')->with('message', 'User created and logged in');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            // Check if the authenticated user is an admin
            if (auth()->user()->role_as == 1) {

                $get_list = Listing::all();
                $countA = count($get_list);

                $get_complete = Listing::where('status', 'Completed')->get();
                $countB = count($get_complete);

                $get_pending = Listing::where('status', 'Pending')->get();
                $countC = count($get_pending);

                if($countA > 0){
                    $total_all = $countA;
                }
                else{
                    $total_all = 0;
                }
                
                if($countB > 0){
                    $total_complete = $countB;
                }
                else{
                    $total_complete = 0;
                }
                
                if($countC > 0){
                    $total_pending = $countC;
                }
                else{
                    $total_pending = 0;
                }

                return redirect()->route('admin.dashboard')->with('message', 'You are now logged in as an admin')
                                                        ->with('total_all', $total_all)
                                                        ->with('total_complete', $total_complete)
                                                        ->with('total_pending', $total_pending);

            }
            else if(auth()->user()->role_as == 0){

                return redirect('/user_dashboard')->with('message', 'You are now logged in');

            }
            else{

                return redirect('/')->with('message', 'You dont have an account');

            }
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}

