<?php

namespace App\Http\Controllers\admin;

use App\Enums\MemberStatus;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMemberController extends Controller
{
    public function list()
    {
        $members = Member::where('status', '!=', MemberStatus::DELETED)
            ->orderBy('stt', 'asc')
            ->paginate('20');
        return view('admin.pages.member.list', compact('members'));
    }

    public function detail($id)
    {
        $member = Member::find($id);
        if (!$member || $member->status == MemberStatus::DELETED) {
            return redirect(route('error.not.found'));
        }
        return view('admin.pages.member.detail', compact('member'));
    }

    public function processCreate()
    {
        return view('admin.pages.member.create');
    }

    public function create(Request $request)
    {
        try {
            $member = new Member();

            $name = $request->input('name');
            $position = $request->input('position');
            $about = $request->input('about');
            $stt = $request->input('stt');
            $status = $request->input('status') ?? MemberStatus::ACTIVE;

            if ($request->hasFile('avatar')) {
                $item = $request->file('avatar');
                $itemPath = $item->store('member', 'public');
                $thumbnail = asset('storage/' . $itemPath);
                $member->avt = $thumbnail;
            } else {
                alert()->error('Error', 'Please upload avatar!');
                return back();
            }

            $old_member = Member::where('stt', $stt)->first();
            if ($old_member) {
                alert()->error('Error', 'Error, Priority has been other user used!');
                return back();
            }

            $member->name = $name;
            $member->about = $about;
            $member->position = $position;
            $member->stt = $stt;
            $member->status = $status;

            $member->created_by = Auth::user()->id;

            $success = $member->save();

            if ($success) {
                alert()->success('Success', 'Success, Create member successful!');
                return redirect(route('admin.members.list'));
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
            $member = Member::find($id);

            $name = $request->input('name');
            $position = $request->input('position');
            $about = $request->input('about');
            $stt = $request->input('stt');
            $status = $request->input('status') ?? MemberStatus::ACTIVE;

            if ($request->hasFile('avatar')) {
                $item = $request->file('avatar');
                $itemPath = $item->store('member', 'public');
                $thumbnail = asset('storage/' . $itemPath);
                $member->avt = $thumbnail;
            }

            if ($stt != $member->stt) {
                $old_member = Member::where('stt', $stt)->first();
                if ($old_member) {
                    alert()->error('Error', 'Error, Priority has been other user used!');
                    return back();
                }
            }

            $member->name = $name;
            $member->about = $about;
            $member->position = $position;
            $member->stt = $stt;
            $member->status = $status;

            $success = $member->save();

            if ($success) {
                alert()->success('Success', 'Success, Update member successful!');
                return redirect(route('admin.members.list'));
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
            $member = Member::find($id);

            $member->status = MemberStatus::DELETED;
            $member->stt = 0 - $member->stt;

            $success = $member->save();

            if ($success) {
                alert()->success('Success', 'Success, Delete member successful!');
                return redirect(route('admin.members.list'));
            }

            alert()->error('Error', 'Error, Delete error!');
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }
}
