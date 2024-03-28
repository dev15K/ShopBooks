<?php

namespace App\Http\Controllers\admin;

use App\Enums\RoleName;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MainController;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function Sodium\add;

class AdminUserController extends Controller
{
    public function list()
    {
        $role_admin = Role::where('name', RoleName::ADMIN)->first();
        $admin_user = RoleUser::where('role_id', $role_admin->id)->get();
        $list_userID = [];
        foreach ($admin_user as $item) {
            $list_userID[] = $item->user_id;
        }
        $users = User::where('status', '!=', UserStatus::DELETED)
            ->whereNotIn('id', $list_userID)
            ->orderBy('id', 'desc')
            ->paginate('20');
        return view('admin.pages.user.list', compact('users'));
    }

    public function detail($id)
    {
        $user = User::find($id);
        if (!$user || $user->status == UserStatus::DELETED) {
            return redirect(route('error.not.found'));
        }
        return view('admin.pages.user.detail', compact('user'));
    }

    public function processCreate()
    {
        return view('admin.pages.user.create');
    }

    public function create(Request $request)
    {
        try {
            $user = new User();

            $full_name = $request->input('full_name');
            $username = $request->input('username');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $status = $request->input('status') ?? UserStatus::ACTIVE;
            $password = $request->input('password');
            $re_password = $request->input('re_password');
            $address = $request->input('address');
            $about = $request->input('about') ?? '';

            $isEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
            if (!$isEmail) {
                toast('Email invalid!', 'error', 'top-left');
                return back();
            }

            if ($request->hasFile('avatar')) {
                $item = $request->file('avatar');
                $itemPath = $item->store('user', 'public');
                $thumbnail = asset('storage/' . $itemPath);
                $user->avt = $thumbnail;
            } else {
                alert()->error('Error', 'Please upload avatar!');
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

            $is_valid = User::checkPhone($phone);
            if (!$is_valid) {
                toast('PhoneNumber already exited!', 'error', 'top-left');
                return back();
            }

            if ($password != $re_password) {
                toast('Password or Password Confirm incorrect!', 'error', 'top-left');
                return back();
            }

            if (strlen($password) < 5) {
                toast('Password invalid!', 'error', 'top-left');
                return back();
            }

            $passwordHash = Hash::make($password);

            $user->full_name = $full_name;
            $user->username = $username;
            $user->email = $email;
            $user->phone = $phone;
            $user->about = $about;
            $user->password = $passwordHash;
            $user->address = $address;
            $user->status = $status;

            $success = $user->save();

            (new MainController())->saveRoleUser($user->id);

            if ($success) {
                alert()->success('Success', 'Success, Create user successful!');
                return redirect(route('admin.users.list'));
            }

            alert()->error('Error', 'Error, Create error!');
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);

            $full_name = $request->input('full_name');
            $status = $request->input('status') ?? UserStatus::ACTIVE;
            $address = $request->input('address');
            $about = $request->input('about') ?? '';

            if (!$user || $user->status == UserStatus::DELETED) {
                return redirect(route('error.not.found'));
            }

            if ($request->hasFile('avatar')) {
                $item = $request->file('avatar');
                $itemPath = $item->store('user', 'public');
                $thumbnail = asset('storage/' . $itemPath);
                $user->avt = $thumbnail;
            }

            $email = $request->input('email');
            if ($email != $user->email) {
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
                $user->email = $email;
            }

            $username = $request->input('username');
            if ($username != $user->username) {
                $is_valid = User::checkUsername($username);
                if (!$is_valid) {
                    toast('Username already exited!', 'error', 'top-left');
                    return back();
                }
                $user->username = $username;
            }

            $phone = $request->input('phone');
            if ($phone != $user->phone) {
                $is_valid = User::checkPhone($phone);
                if (!$is_valid) {
                    toast('PhoneNumber already exited!', 'error', 'top-left');
                    return back();
                }
                $user->phone = $phone;
            }

            $password = $request->input('password');
            $re_password = $request->input('re_password');
            if ($password || $re_password) {
                if ($password != $re_password) {
                    toast('Password or Password Confirm incorrect!', 'error', 'top-left');
                    return back();
                }

                if (strlen($password) < 5) {
                    toast('Password invalid!', 'error', 'top-left');
                    return back();
                }
                $passwordHash = Hash::make($password);
                $user->password = $passwordHash;
            }

            $user->full_name = $full_name;
            $user->about = $about;
            $user->address = $address;
            $user->status = $status;

            $success = $user->save();

            if ($success) {
                alert()->success('Success', 'Success, Update user successful!');
                return redirect(route('admin.users.list'));
            }

            alert()->error('Error', 'Error, Update error!');
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }

    public function delete($id)
    {
        try {
            $user = User::find($id);

            $user->status = UserStatus::DELETED;

            $success = $user->save();

            if ($success) {
                alert()->success('Success', 'Success, Delete user successful!');
                return redirect(route('admin.users.list'));
            }

            alert()->error('Error', 'Error, Delete error!');
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }
}
