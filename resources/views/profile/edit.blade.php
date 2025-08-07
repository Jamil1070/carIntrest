@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: 20px auto; padding: 20px;">
        <h1 style="text-align: center; margin-bottom: 30px;">Profiel Bewerken</h1>

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
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                {{-- Current Profile Photo --}}
                <div style="text-align: center; margin-bottom: 30px;">
                    <img src="{{ $user->getProfilePhotoUrl() }}" 
                         alt="Huidige profielfoto" 
                         style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid #007bff;">
                    <p style="margin: 10px 0 0 0; color: #666; font-size: 14px;">Huidige profielfoto</p>
                </div>

                {{-- Username --}}
                <div style="margin-bottom: 20px;">
                    <label for="username" style="display: block; margin-bottom: 5px; font-weight: bold;">Username (optioneel):</label>
                    <input type="text" 
                           id="username" 
                           name="username" 
                           value="{{ old('username', $user->username) }}"
                           placeholder="Kies een username"
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; box-sizing: border-box;">
                    <small style="color: #6c757d;">Dit wordt getoond op uw profiel in plaats van uw volledige naam</small>
                </div>

                {{-- Birthday --}}
                <div style="margin-bottom: 20px;">
                    <label for="birthday" style="display: block; margin-bottom: 5px; font-weight: bold;">Verjaardag (optioneel):</label>
                    <input type="date" 
                           id="birthday" 
                           name="birthday" 
                           value="{{ old('birthday', $user->birthday?->format('Y-m-d')) }}"
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; box-sizing: border-box;">
                </div>

                {{-- Profile Photo --}}
                <div style="margin-bottom: 20px;">
                    <label for="profile_photo" style="display: block; margin-bottom: 5px; font-weight: bold;">Profielfoto (optioneel):</label>
                    <input type="file" 
                           id="profile_photo" 
                           name="profile_photo" 
                           accept="image/*"
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; box-sizing: border-box;">
                    <small style="color: #6c757d;">Toegestaan: JPEG, PNG, JPG, GIF. Max grootte: 2MB</small>
                </div>

                {{-- About Me --}}
                <div style="margin-bottom: 20px;">
                    <label for="about_me" style="display: block; margin-bottom: 5px; font-weight: bold;">Over mij (optioneel):</label>
                    <textarea id="about_me" 
                              name="about_me" 
                              rows="4"
                              placeholder="Vertel iets over jezelf..."
                              style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; font-size: 14px; resize: vertical; box-sizing: border-box;">{{ old('about_me', $user->about_me) }}</textarea>
                    <small style="color: #6c757d;">Maximaal 500 karakters</small>
                </div>

                {{-- Buttons --}}
                <div style="display: flex; gap: 10px; justify-content: center;">
                    <button type="submit" 
                            style="background-color: #28a745; color: white; border: none; padding: 12px 25px; border-radius: 5px; cursor: pointer; font-size: 16px; font-weight: bold;">
                        💾 Opslaan
                    </button>
                    <a href="{{ route('profile.show') }}" 
                       style="display: inline-block; background-color: #6c757d; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                        ❌ Annuleren
                    </a>
                </div>
            </form>
        </div>

        {{-- Help Text --}}
        <div style="margin-top: 20px; padding: 15px; background-color: #e7f3ff; border: 1px solid #b8daff; border-radius: 5px;">
            <h4 style="margin: 0 0 10px 0; color: #004085;">ℹ️ Profiel Tips</h4>
            <ul style="margin: 0; padding-left: 20px; color: #004085; font-size: 14px;">
                <li>Alle velden zijn optioneel - vul in wat je wilt delen</li>
                <li>Je username wordt getoond in plaats van je volledige naam</li>
                <li>Een profielfoto maakt je profiel persoonlijker</li>
                <li>De "over mij" sectie is een leuke manier om jezelf voor te stellen</li>
            </ul>
        </div>
    </div>
@endsection
