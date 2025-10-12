<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Resources\ContactResource;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(ContactRequest $request) : ContactResource
    {
        $contact = Contact::create($request->validated());

        Mail::to('admin@example.com')->send(new ContactMail($contact));

        return ContactResource::make($contact);
    }
}
