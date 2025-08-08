<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2|max:255|regex:/^[a-zA-ZÀ-ÿ\s]+$/',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|min:3|max:255',
            'message' => 'required|string|min:10|max:1000',
        ], [
            'name.required' => 'Naam is verplicht.',
            'name.min' => 'Naam moet minimaal 2 karakters bevatten.',
            'name.max' => 'Naam mag maximaal 255 karakters bevatten.',
            'name.regex' => 'Naam mag alleen letters en spaties bevatten.',
            'email.required' => 'E-mailadres is verplicht.',
            'email.email' => 'Voer een geldig e-mailadres in.',
            'subject.required' => 'Onderwerp is verplicht.',
            'subject.min' => 'Onderwerp moet minimaal 3 karakters bevatten.',
            'subject.max' => 'Onderwerp mag maximaal 255 karakters bevatten.',
            'message.required' => 'Bericht is verplicht.',
            'message.min' => 'Bericht moet minimaal 10 karakters bevatten.',
            'message.max' => 'Bericht mag maximaal 1000 karakters bevatten.',
        ]);

        // Sanitize input data
        $sanitizedData = [
            'name' => strip_tags(trim($request->name)),
            'email' => filter_var(trim($request->email), FILTER_SANITIZE_EMAIL),
            'subject' => strip_tags(trim($request->subject)),
            'message' => strip_tags(trim($request->message)),
        ];

        // Sla contact bericht op in database
        Contact::create($sanitizedData);

        // Verstuur email naar admin (optioneel)
        try {
            Mail::send('emails.contact', [
                'name' => $sanitizedData['name'],
                'email' => $sanitizedData['email'],
                'subject' => $sanitizedData['subject'],
                'messageContent' => $sanitizedData['message'],
            ], function ($mail) use ($sanitizedData) {
                $mail->to('admin@carintrest.com') // Pas dit aan naar jouw admin email
                     ->subject('Nieuw contactbericht: ' . $sanitizedData['subject'])
                     ->from($sanitizedData['email'], $sanitizedData['name']);
            });
        } catch (\Exception $e) {
            // Email versturen gefaald, maar bericht is wel opgeslagen
        }

        return redirect()->back()->with('success', 'Uw bericht is succesvol verzonden!');
    }
}
