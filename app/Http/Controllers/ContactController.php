<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        // Honeypot: bots vullen dit verborgen veld in; doe alsof het gelukt is.
        if ($request->filled('website')) {
            return to_route('contact')->with('contact_sent', true);
        }

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:190'],
            'phone' => ['nullable', 'string', 'max:40'],
            'message' => ['required', 'string', 'max:5000'],
        ], [
            'required' => 'Vul uw :attribute in.',
            'email' => 'Vul een geldig e-mailadres in.',
            'max' => 'Uw :attribute mag maximaal :max tekens zijn.',
        ], [
            'name' => 'naam',
            'email' => 'e-mailadres',
            'phone' => 'telefoonnummer',
            'message' => 'bericht',
        ]);

        // Terug naar het formulier zelf, zodat de foutmeldingen ook op mobiel direct zichtbaar zijn
        if ($validator->fails()) {
            return to_route('contact')->withErrors($validator, 'contact')->withInput()->withFragment('formulier');
        }

        $data = $validator->validated();

        Mail::to(config('site.company.contact_recipient'))->send(new ContactMessage($data));

        return to_route('contact')->with('contact_sent', true);
    }
}
