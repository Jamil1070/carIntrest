@extends('layouts.app')

@section('content')
    <div style="max-width: 400px; margin: 50px auto; padding: 20px;">
        <h2 style="text-align: center; margin-bottom: 30px;">Wachtwoord Vergeten</h2>

        @if(session('status'))
            <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->any())
            <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #f5c6cb;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div style="background-color: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <p style="text-align: center; margin-bottom: 20px; color: #666;">
                Voer uw emailadres in en wij sturen u een link om uw wachtwoord opnieuw in te stellen.
            </p>

            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                
                <div style="margin-bottom: 20px;">
                    <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           required 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; box-sizing: border-box;">
                </div>

                <button type="submit" 
                        style="width: 100%; background-color: #007bff; color: white; border: none; padding: 12px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; margin-bottom: 15px;">
                    📧 Reset Link Versturen
                </button>
            </form>

            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('login') }}" style="color: #007bff; text-decoration: none;">
                    Terug naar inloggen
                </a>
            </div>
        </div>
    </div>
@endsection
