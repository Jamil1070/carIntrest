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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        // Sla contact bericht op in database
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // Verstuur email naar admin (optioneel)
        try {
            Mail::send('emails.contact', [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'messageContent' => $request->message,
            ], function ($mail) use ($request) {
                $mail->to('admin@carintrest.com') // Pas dit aan naar jouw admin email
                     ->subject('Nieuw contactbericht: ' . $request->subject)
                     ->from($request->email, $request->name);
            });
        } catch (\Exception $e) {
            // Email versturen gefaald, maar bericht is wel opgeslagen
        }

        return redirect()->back()->with('success', 'Uw bericht is succesvol verzonden!');
    }
}
