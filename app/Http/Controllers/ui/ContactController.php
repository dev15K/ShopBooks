<?php

namespace App\Http\Controllers\ui;

use App\Enums\ContactStatus;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(Request $request)
    {
        try {
            $contact = new Contact();

            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $email = $request->input('email');
            $subject = $request->input('subject');
            $message = $request->input('message');
            $status = ContactStatus::PENDING;

            $contact->first_name = $first_name;
            $contact->last_name = $last_name;
            $contact->email = $email;
            $contact->subject = $subject;
            $contact->message = $message;
            $contact->status = $status;

            $contact->save();
            alert()->success('Success', 'Success, Send successfully!');
            return back();
        } catch (\Exception $exception) {
            alert()->error('Error', 'Error, please try again!');
            return back();
        }
    }
}
