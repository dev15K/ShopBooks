<?php

namespace App\Http\Controllers\admin;

use App\Enums\ContactStatus;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function list()
    {
        $contacts = Contact::where('status', '!=', ContactStatus::DELETED)
            ->orderByDesc('id')
            ->paginate(20);
        return view('admin.pages.contact.list', compact('contacts'));
    }

    public function detail($id)
    {
        $contact = Contact::find($id);
        if (!$contact || $contact->status == ContactStatus::DELETED) {
            return redirect(route('error.not.found'));
        }
        return view('admin.pages.contact.detail', compact('contact'));
    }

    public function changeStatus(Request $request, $id)
    {
        try {
            $contact = Contact::find($id);

            if (!$contact) {
                return back();
            }

            $status = $request->input('status') ?? ContactStatus::APPROVED;
            $contact->status = $status;

            $contact->save();

            alert()->success('Success', 'Success, Change status successfully!');
            return redirect(route('admin.contacts.list'));
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }

    public function delete($id)
    {
        try {
            $contact = Contact::find($id);

            if (!$contact) {
                return back();
            }

            $contact->status = ContactStatus::DELETED;

            $contact->save();

            alert()->success('Success', 'Success, Delete successfully!');
            return redirect(route('admin.contacts.list'));
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, Please try again!');
            return back();
        }
    }
}
