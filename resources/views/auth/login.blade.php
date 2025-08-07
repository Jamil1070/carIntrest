@extends('layouts.app')

@section('content')
    <div style="max-width: 400px; margin: 50px auto; padding: 20px;">
        <h2 style="text-align: center; margin-bottom: 30px;">Inloggen</h2>

        @if(session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                {{ session('success') }}
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
            <form action="{{ route('login.post') }}" method="POST">
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

                <div style="margin-bottom: 20px;">
                    <label for="password" style="display: block; margin-bottom: 5px; font-weight: bold;">Wachtwoord:</label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           required 
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; box-sizing: border-box;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: flex; align-items: center; cursor: pointer;">
                        <input type="checkbox" name="remember" style="margin-right: 8px;">
                        <span>Onthoud mij</span>
                    </label>
                </div>

                <button type="submit" 
                        style="width: 100%; background-color: #007bff; color: white; border: none; padding: 12px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold; margin-bottom: 15px;">
                    🔐 Inloggen
                </button>
            </form>

            <div style="text-align: center; margin-top: 20px;">
                <a href="{{ route('register') }}" style="color: #007bff; text-decoration: none; margin-right: 15px;">
                    Nog geen account? Registreer hier
                </a>
                <br><br>
                <a href="{{ route('password.request') }}" style="color: #6c757d; text-decoration: none; font-size: 14px;">
                    Wachtwoord vergeten?
                </a>
            </div>
        </div>

        {{-- Test account info --}}
        <div style="margin-top: 30px; padding: 15px; background-color: #fff3cd; border: 1px solid #ffeaa7; border-radius: 5px;">
            <h4 style="margin: 0 0 10px 0; color: #856404;">Test Account</h4>
            <p style="margin: 0; font-size: 14px; color: #856404;">
                <strong>Email:</strong> admin@ehb.be<br>
                <strong>Password:</strong> Password!321
            </p>
        </div>
    </div>
@endsection
