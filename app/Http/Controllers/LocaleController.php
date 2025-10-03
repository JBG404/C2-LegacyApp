<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function change($language_slug)
    {
        // Alleen 'en' en 'nl' toestaan
        if (!in_array($language_slug, ['en', 'nl'])) {
            $language_slug = 'en';
        }

        session(['locale' => $language_slug]);
        app()->setLocale($language_slug);

        return redirect()->back();
    }
}
