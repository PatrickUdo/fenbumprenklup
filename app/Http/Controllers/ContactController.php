<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Throwable;

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
        $recipient = config('site.company.contact_recipient');

        // De bezoeker krijgt bij een fout alleen een algemene melding te zien;
        // het ontvangende adres en de technische fout komen alleen in de log.
        try {
            if (blank($recipient)) {
                throw new \RuntimeException('CONTACT_RECIPIENT is niet ingesteld in .env.');
            }

            Mail::to($recipient)->send(new ContactMessage($data, now()));
        } catch (Throwable $e) {
            Log::error('Contactformulier kon niet worden verstuurd: '.$e->getMessage());

            return to_route('contact')
                ->withInput()
                ->with('contact_failed', true)
                ->withFragment('formulier');
        }

        return to_route('contact')->with('contact_sent', true);
    }
}
