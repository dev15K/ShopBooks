<?php

namespace App\Http\Controllers\ui;

use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(Request $request)
    {
        return view('ui.pages.profile');
    }

    public function updateProfile(Request $request)
    {
        try {
            $full_name = $request->input('full_name');
            $username = $request->input('username');
            $address = $request->input('address');
            $phone = $request->input('phone');
            $email = $request->input('email');
            $about = $request->input('about');

            $user = Auth::user();

            $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isEmail) {
                alert()->error('Error', 'Email invalid!');
                return back();
            }

            if ($email != $user->email) {
                $old_user = User::where('email', $email)->where('status', '!=', UserStatus::DELETED)->first();
                if ($old_user) {
                    alert()->error('Error', 'Email already exited!');
                    return back();
                }
                $user->email = $email;
            }

            if ($phone != $user->phone) {
                $old_user = User::where('phone', $phone)->where('status', '!=', UserStatus::DELETED)->first();
                if ($old_user) {
                    alert()->error('Error', 'Phone already exited!');
                    return back();
                }
                $user->phone = $phone;
            }

            if ($username != $user->username) {
                $old_user = User::where('username', $username)->where('status', '!=', UserStatus::DELETED)->first();
                if ($old_user) {
                    alert()->error('Error', 'Username already exited!');
                    return back();
                }
                $user->username = $username;
            }

            $user->full_name = $full_name;
            $user->about = $about;
            $user->address = $address;

            $success = $user->save();
            if ($success) {
                alert()->success('Success', 'Success, Update profile successful!');
            } else {
                alert()->error('Error', 'Error, Update profile error!');
            }
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $password = $request->input('password');
            $newpassword = $request->input('newpassword');
            $renewpassword = $request->input('renewpassword');

            $user = Auth::user();

            $oldPassword = $user->password;

            $check = Hash::check($password, $oldPassword);
            if (!$check) {
                alert()->error('Error', 'Error, Password incorrect!');
                return back();
            }

            if ($newpassword != $renewpassword) {
                alert()->error('Error', 'Error, Password or Password Confirm incorrect!');
                return back();
            }

            if (strlen($newpassword) < 5) {
                alert()->error('Error', 'Error, Password invalid!');
                return back();
            }

            $passwordHash = Hash::make($newpassword);

            $user->password = $passwordHash;

            $success = $user->save();
            if ($success) {
                alert()->success('Success', 'Success, Change password successful!');
            } else {
                alert()->error('Error', 'Error, Change password error!');
            }
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }

    public function changeAvt(Request $request)
    {
        try {
            $user_id = $request->input('user_id');

            $user = User::find($user_id);
            if (!$user || $user->status == UserStatus::DELETED) {
                return response('User not found', 404);
            }

            if ($request->hasFile('avatar')) {
                $item = $request->file('avatar');
                $itemPath = $item->store('user/avatar', 'public');
                $avatar = asset('storage/' . $itemPath);

                $user->avt = $avatar;

                $success = $user->save();

                if ($success) {
                    return response('Change avatar success!', 200);
                }
                return response('Change avatar error!', 400);
            } else {
                return response('Please upload image!', 400);
            }
        } catch (\Exception $exception) {
            return response($exception->getMessage(), 400);
        }
    }

    public function deleteAvt(Request $request)
    {
        try {
            $user_id = $request->input('user_id');

            $user = User::find($user_id);
            if (!$user || $user->status == UserStatus::DELETED) {
                return response('User not found', 404);
            }

            $avatar = asset('image/avatar-default.svg');

            $user->avt = $avatar;

            $success = $user->save();

            if ($success) {
                return response('Delete avatar success!', 200);
            }
            return response('Delete avatar error!', 400);
        } catch (\Exception $exception) {
            return response($exception->getMessage(), 400);
        }
    }
}
