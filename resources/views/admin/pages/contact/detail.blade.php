@extends('admin.layouts.master')
@section('title')
    Detail Category
@endsection
@section('content')
    <div class="pagetitle">
        <h1>Detail Category</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                <li class="breadcrumb-item active">Detail Category</li>
            </ol>
        </nav>
    </div>

    <div class="container-fluid">
        <form action="{{ route('admin.contacts.changeStatus', $contact->id) }}" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="first_name" class="text-black">First Name <span
                                class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                           value="{{ $contact->first_name }}" disabled>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="text-black">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                           value="{{ $contact->last_name }}" disabled>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="email" class="text-black">Email <span
                                class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}"
                           disabled>
                </div>
                <div class="col-md-6">
                    <label for="subject" class="text-black">Subject </label>
                    <input type="text" class="form-control" id="subject" name="subject" value="{{ $contact->subject }}"
                           disabled>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <label for="message" class="text-black">Message </label>
                    <textarea name="message" id="message" cols="30" rows="7"
                              class="form-control" disabled>{{ $contact->message }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-4">
                    <label for="status" class="text-black">Status </label>
                    <select class="form-select" name="status" id="status">
                        <option {{ $contact->status == \App\Enums\ContactStatus::PENDING ? 'selected' : '' }}
                                value="{{ \App\Enums\ContactStatus::PENDING }}">
                            {{ \App\Enums\ContactStatus::PENDING }}
                        </option>
                        <option {{ $contact->status == \App\Enums\ContactStatus::APPROVED ? 'selected' : '' }}
                                value="{{ \App\Enums\ContactStatus::APPROVED }}">
                            {{ \App\Enums\ContactStatus::APPROVED }}
                        </option>
                        <option {{ $contact->status == \App\Enums\ContactStatus::COMPLETE ? 'selected' : '' }}
                                value="{{ \App\Enums\ContactStatus::COMPLETE }}">
                            {{ \App\Enums\ContactStatus::COMPLETE }}
                        </option>
                        <option {{ $contact->status == \App\Enums\ContactStatus::REFUSE ? 'selected' : '' }}
                                value="{{ \App\Enums\ContactStatus::REFUSE }}">
                            {{ \App\Enums\ContactStatus::REFUSE }}
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12 mt-3">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" value="Save">
                </div>
            </div>
        </form>
    </div>
@endsection
