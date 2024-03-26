<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use JWTAuth;

class AuthController extends Controller
{
    public function processLogin()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        try {
            $loginRequest = $request->input('email');
            $password = $request->input('password');

            $credentials = [
                'email' => $loginRequest,
                'password' => $password,
            ];

            $user = User::where('email', $loginRequest)->first();
            if (!$user) {
                toast('Account not found!', 'error', 'top-left');
                return back();
            }

            switch ($user->status) {
                case UserStatus::ACTIVE:
                    break;
                case UserStatus::INACTIVE:
                    toast('Account not active!', 'error', 'top-left');
                    return back();
                case UserStatus::BLOCKED:
                    toast('Account has been blocked!', 'error', 'top-left');
                    return back();
                case UserStatus::DELETED:
                    toast('Account has been deleted!', 'error', 'top-left');
                    return back();
            }

            if (Auth::attempt($credentials)) {
                $token = JWTAuth::fromUser($user);
                $user->token = $token;
                $user->save();
                $expiration_time = time() + 86400;
                setCookie('accessToken', $token, $expiration_time, '/');
                toast('Welcome ' . $user->email, 'success', 'top-left');
                return redirect(route('home'));
            }
            toast('Email or password incorrect', 'error', 'top-left');
            return back();
        } catch (\Exception $exception) {
            toast('Error, Please try again!', 'error', 'top-left');
            return back();
        }
    }

    public function processRegister()
    {
        if (Auth::check()) {
            return redirect(route('home'));
        }
        return view('auth.register');
    }

    public function register(Request $request)
    {
        try {
            $name = $request->input('name');
            $email = $request->input('email');
            $username = $request->input('username');
            $password = $request->input('password');
            $password_confirm = $request->input('password_confirm');

            $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isEmail) {
                toast('Email invalid!', 'error', 'top-left');
                return back();
            }

            $is_valid = User::checkEmail($email);
            if (!$is_valid) {
                toast('Email already exited!', 'error', 'top-left');
                return back();
            }

            $is_valid = User::checkUsername($username);
            if (!$is_valid) {
                toast('Username already exited!', 'error', 'top-left');
                return back();
            }

            if ($password != $password_confirm) {
                toast('Password or Password Confirm incorrect!', 'error', 'top-left');
                return back();
            }

            if (strlen($password) < 5) {
                toast('Password invalid!', 'error', 'top-left');
                return back();
            }

            $passwordHash = Hash::make($password);

            $user = new User();

            $user->full_name = $name ?? '';
            $user->username = $username;
            $user->phone = $contact_phone ?? '';
            $user->email = $email;
            $user->password = $passwordHash;

            $user->address = '';
            $user->about = '';
            $user->status = UserStatus::ACTIVE;

            $success = $user->save();

            (new MainController())->saveRoleUser($user->id);

            if ($success) {
                toast('Register success, Please login to continue...!', 'success', 'top-left');
                return redirect(route('auth.processLogin'));
            }
            toast('Register error!', 'error', 'top-left');
            return back();
        } catch (\Exception $exception) {
            toast('Error, Please try again!', 'error', 'top-left');
            return back();
        }
    }

    public function logout()
    {
        try {
            if (Auth::check()) {
                $user = Auth::user();
                $user->token = null;
                $user->save();
            }
            Auth::logout();
            return redirect(route('home'));
        } catch (\Exception $exception) {
            return redirect(route('home'));
        }
    }
}
