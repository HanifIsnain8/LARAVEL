<?php

namespace App\Http\Controllers;

use App\Models\SocialAccount;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class LoginController extends Controller
{


    public function index()
    {
        return view('auth.login');
    }
    
    public function login_proses(Request $request)
    {   
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();
            return redirect('/home')->with('success', 'Selamat Datang ' . $user->name);
        } else {
            return redirect('/login')->withErrors(['email' => 'Email atau password salah']);
        }
    }

    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil logout');
    }


    public function register()
    {
        return view('auth.regis');
    }

    public function register_proses(Request $request)
    {   
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/email/verify');
    }

    public function verify_notice()
    {
        return view('auth.verify');
    }

    public function verification_verify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/home')->with('message', 'Your email has been verified!');
    }

    public function verification_send(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Verification link sent!');
    }

    public function forgot_password(){
        return view('auth.forgot-password');
    }

    public function password_email(Request $request){
        $request->validate(['email' => 'required|email']);
 
        $status = Password::sendResetLink(
            $request->only('email')
        );
     
        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function password_reset(string $token){
        return view('auth.reset-password', ['token' => $token]);
    }

    public function password_update(Request $request){
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);
     
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
     
        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    }







    // LOGIN DENGAN SOCIAL MEDIA
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function handleProvideCallback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('/login')->withErrors(['error' => 'Gagal login dengan ' . ucfirst($provider)]);
        }
    
        // Cari atau buat pengguna berdasarkan data dari $socialUser
        $socialAccount = SocialAccount::where('provider_id', $socialUser->getId())
            ->where('provider_name', $provider)
            ->first();
    
        if ($socialAccount) {
            // Jika akun sosial sudah ada, ambil pengguna terkait
            $authUser = $socialAccount->user;
        } else {
            // Jika akun sosial belum ada, cari pengguna berdasarkan email
            $authUser = User::where('email', $socialUser->getEmail())->first();
    
            if (!$authUser) {
                // Jika pengguna tidak ditemukan, buat pengguna baru
                $authUser = User::create([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'email_verified_at' => now(),
                ]);
            }
    
            // Buat akun sosial baru terkait dengan pengguna
            $authUser->socialAccounts()->create([
                'provider_id' => $socialUser->getId(),
                'provider_name' => $provider
            ]);
        }

        Auth::login($authUser, true);
    
        return redirect()->intended('/home');
    }


}
