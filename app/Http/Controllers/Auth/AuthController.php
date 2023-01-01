<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {    
        $email = $request->email;
        $password = $request->password; 

        # Check apakah data user ada    
        if (
            Auth::attempt(['email' => $email, 'password' => $password, 'status_user' => 'aktif'], $request->checkBoxRememberMe)
<<<<<<< HEAD
=======
            
>>>>>>> 96ef6381689b581a74f833bdac31cacd28e36f24
        ) {
            # Get data user
            $user = User::whereRaw('email = ? AND status_user = ?', [$email, 'aktif'])->first();

            # The user is active, not suspended, and exists.
            if(!$request->checkBoxRememberMe){
                $user->remember_token = null;
                $user->save();
            }
             
            # Check apakah token sudah ada
            if ($user->api_token) {
                # Inisialisasi token dari db
                $token = $user->api_token;
            } else {
                # Membuat Token
                $token = Str::random(150);
                # $user->api_token = hash('sha256', $token); # Encrypt token user
                $user->api_token = $token;
                $user->save();
            }

            $session = array(
                'isLogin' => encrypt($token),
                'id_user' => $user->id,
            );
            
            Log::info(['User login: ' . encrypt($email)]); 

            session()->put($session);
            return redirect('home')->with('message', 'Login Berhasil!');
        } 

        return redirect('login')->withErrors(['message' => 'Email atau Password anda salah']);
    }

    public function logout()
    {
        session()->flush();
        return redirect('login')->with('message', 'Logout Berhasil!'); 
    }
}
