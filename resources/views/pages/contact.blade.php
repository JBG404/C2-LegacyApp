<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
</head>
<body>
    <head>
        <x-head/>
    </head>

    <header>
<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <a href="/" title="{{ __('misc.home_alt') }}" alt="{{ __('misc.home_alt') }}">
            <h1>{{ __('misc.homepage_title') }}</h1>
        </a>
        {{ $introduction_text ?? '' }}

        <div class="contact_header_nav">
            <a href="/" title="{{ __('misc.home_alt') }}"
               alt="{{ __('misc.home_alt') }}">{{ __('misc.home') }}</a>
            {{ $breadcrumb ?? '' }}
        </div>
    </div>
</div>

    </header>

    <main>
        <div class="contact-container">
            <h2>Contactformulier</h2>

            @if(session('success'))
                <div class="alert">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('contact.store') }}">
                @csrf
                <label for="name">Naam:</label>
                <input type="text" name="name" id="name" required>

                <label for="email">E-mail:</label>
                <input type="email" name="email" id="email" required>

                <label for="message">Bericht:</label>
                <textarea name="message" id="message" rows="5" required></textarea>

                <button type="submit">Versturen</button>
            </form>
        </div>
    </main>

    <footer>
        <x-footer/>
    </footer>
</body>
</html>
