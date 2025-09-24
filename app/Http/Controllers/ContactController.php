<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        // Tekst die in bestand komt
        $content = "Naam: " . $request->name . "\n";
        $content .= "Email: " . $request->email . "\n";
        $content .= "Bericht:\n" . $request->message . "\n";
        $content .= "----------------------------\n";

        // Wegschrijven naar contact_messages.txt
        Storage::append('contact_messages.txt', $content);

        return back()->with('success', 'Bedankt voor je bericht! Het is opgeslagen.');
    }
}
