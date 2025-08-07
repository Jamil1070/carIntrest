@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: 0 auto; padding: 20px;">
        <h1 style="text-align: center; margin-bottom: 30px;">Contact</h1>

        <p style="text-align: center; font-style: italic; margin-bottom: 30px; color: #666;">
            Heeft u vragen over onze auto's of wilt u meer informatie? Vul het onderstaande formulier in en wij nemen zo snel mogelijk contact met u op.
        </p>

        {{-- Success bericht --}}
        @if(session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error berichten --}}
        @if($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Contact formulier --}}
        <div style="background-color: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <form action="{{ route('contact.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 20px;">
                @csrf
                
                <div>
                    <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">
                        Naam *
                    </label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') }}"
                           required 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; box-sizing: border-box;">
                </div>

                <div>
                    <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">
                        Email *
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           required 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; box-sizing: border-box;">
                </div>

                <div>
                    <label for="subject" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">
                        Onderwerp *
                    </label>
                    <input type="text" 
                           id="subject" 
                           name="subject" 
                           value="{{ old('subject') }}"
                           required 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; box-sizing: border-box;">
                </div>

                <div>
                    <label for="message" style="display: block; margin-bottom: 5px; font-weight: bold; color: #333;">
                        Bericht *
                    </label>
                    <textarea id="message" 
                              name="message" 
                              required 
                              rows="6"
                              style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; resize: vertical; box-sizing: border-box;">{{ old('message') }}</textarea>
                </div>

                <button type="submit" 
                        style="background-color: #007bff; color: white; border: none; padding: 12px 30px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; transition: background-color 0.3s;">
                    📧 Verstuur bericht
                </button>
            </form>
        </div>

        {{-- Contact informatie --}}
        <div style="margin-top: 40px; text-align: center; color: #666;">
            <h3 style="margin-bottom: 15px;">Andere manieren om contact op te nemen</h3>
            <p style="margin: 5px 0;">📞 Telefoon: +31 6 12345678</p>
            <p style="margin: 5px 0;">📧 Email: info@carintrest.com</p>
            <p style="margin: 5px 0;">📍 Adres: Autostraat 123, 1234 AB Amsterdam</p>
        </div>
    </div>

    <style>
        button[type="submit"]:hover {
            background-color: #0056b3 !important;
        }
    </style>
@endsection
