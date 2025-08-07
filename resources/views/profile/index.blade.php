@extends('layouts.app')

@section('content')
    <div style="max-width: 1000px; margin: 20px auto; padding: 20px;">
        <h1 style="text-align: center; margin-bottom: 30px;">Alle Profielen</h1>

        <p style="text-align: center; font-style: italic; margin-bottom: 40px; color: #666;">
            Ontdek andere gebruikers van CarIntrest en hun auto-interesses.
        </p>

        @if($users->isEmpty())
            <div style="text-align: center; padding: 40px; background-color: #f8f9fa; border-radius: 10px;">
                <h3 style="color: #666;">Nog geen profielen beschikbaar</h3>
                <p style="color: #888;">Er zijn momenteel geen gebruikers met ingevulde profielen.</p>
                @auth
                    <a href="{{ route('profile.edit') }}" 
                       style="display: inline-block; background-color: #007bff; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; margin-top: 15px;">
                        🎯 Vul jouw profiel in
                    </a>
                @endauth
            </div>
        @else
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
                @foreach($users as $profileUser)
                    <div style="background-color: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
                        {{-- Profile Photo --}}
                        <img src="{{ $profileUser->getProfilePhotoUrl() }}" 
                             alt="Profielfoto" 
                             style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover; border: 3px solid #007bff; margin-bottom: 15px;">
                        
                        {{-- Name/Username --}}
                        <h3 style="margin: 0 0 10px 0; color: #333;">
                            {{ $profileUser->getDisplayName() }}
                            @if($profileUser->isAdmin())
                                <span style="color: #d4af37; font-size: 16px;">👑</span>
                            @endif
                        </h3>
                        
                        {{-- Member Since --}}
                        <p style="margin: 0 0 15px 0; color: #666; font-size: 14px;">
                            Lid sinds {{ $profileUser->created_at->format('M Y') }}
                        </p>

                        {{-- Birthday --}}
                        @if($profileUser->birthday)
                            <p style="margin: 0 0 15px 0; color: #666; font-size: 14px;">
                                🎂 {{ $profileUser->birthday->format('d-m-Y') }}
                            </p>
                        @endif

                        {{-- About Me --}}
                        @if($profileUser->about_me)
                            <div style="margin: 15px 0; padding: 15px; background-color: #f8f9fa; border-radius: 8px; text-align: left;">
                                <h5 style="margin: 0 0 8px 0; color: #333; font-size: 14px;">Over {{ $profileUser->getDisplayName() }}:</h5>
                                <p style="margin: 0; color: #555; font-size: 14px; line-height: 1.5;">
                                    {{ Str::limit($profileUser->about_me, 100) }}
                                </p>
                            </div>
                        @endif

                        {{-- Profile Completeness --}}
                        <div style="margin-top: 15px; display: flex; justify-content: center; gap: 8px;">
                            <span style="font-size: 16px;" title="Username">{{ $profileUser->username ? '✅' : '⭕' }}</span>
                            <span style="font-size: 16px;" title="Verjaardag">{{ $profileUser->birthday ? '✅' : '⭕' }}</span>
                            <span style="font-size: 16px;" title="Profielfoto">{{ $profileUser->profile_photo ? '✅' : '⭕' }}</span>
                            <span style="font-size: 16px;" title="Over mij">{{ $profileUser->about_me ? '✅' : '⭕' }}</span>
                        </div>

                        {{-- View Profile Button (if it's the current user) --}}
                        @auth
                            @if($profileUser->id === auth()->id())
                                <a href="{{ route('profile.show') }}" 
                                   style="display: inline-block; background-color: #007bff; color: white; padding: 8px 15px; text-decoration: none; border-radius: 5px; font-size: 14px; margin-top: 15px;">
                                    👤 Mijn Profiel
                                </a>
                            @endif
                        @endauth
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Call to Action for logged in users --}}
        @auth
            <div style="text-align: center; margin-top: 40px; padding: 20px; background-color: #e7f3ff; border-radius: 10px; border: 1px solid #b8daff;">
                <h3 style="margin: 0 0 10px 0; color: #004085;">✨ Maak jouw profiel compleet!</h3>
                <p style="margin: 0 0 15px 0; color: #004085;">
                    Laat andere auto-liefhebbers weten wie je bent en deel je passie voor auto's.
                </p>
                <a href="{{ route('profile.edit') }}" 
                   style="display: inline-block; background-color: #007bff; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                    🎯 Profiel Bewerken
                </a>
            </div>
        @endauth
    </div>
@endsection
