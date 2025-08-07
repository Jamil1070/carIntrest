@extends('layouts.app')

@section('content')
    <div style="max-width: 600px; margin: 20px auto; padding: 20px;">
        <h1 style="text-align: center; margin-bottom: 30px;">Mijn Profiel</h1>

        @if(session('success'))
            <div style="background-color: #d4edda; color: #155724; padding: 15px; border-radius: 5px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
                {{ session('success') }}
            </div>
        @endif

        <div style="background-color: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            {{-- Profile Photo --}}
            <div style="text-align: center; margin-bottom: 30px;">
                <img src="{{ $user->getProfilePhotoUrl() }}" 
                     alt="Profielfoto" 
                     style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid #007bff;">
            </div>

            {{-- User Info --}}
            <div style="margin-bottom: 25px;">
                <h3 style="margin: 0 0 15px 0; color: #333; text-align: center;">
                    {{ $user->getDisplayName() }}
                </h3>
                <p style="text-align: center; color: #666; margin: 0 0 5px 0;">
                    <strong>Email:</strong> {{ $user->email }}
                </p>
                @if($user->birthday)
                    <p style="text-align: center; color: #666; margin: 0 0 5px 0;">
                        <strong>Verjaardag:</strong> {{ $user->birthday->format('d-m-Y') }}
                    </p>
                @endif
                <p style="text-align: center; color: #666; margin: 0;">
                    <strong>Lid sinds:</strong> {{ $user->created_at->format('d-m-Y') }}
                </p>
            </div>

            {{-- About Me --}}
            @if($user->about_me)
                <div style="margin-bottom: 25px; padding: 20px; background-color: #f8f9fa; border-radius: 8px; border-left: 4px solid #007bff;">
                    <h4 style="margin: 0 0 10px 0; color: #333;">Over mij</h4>
                    <p style="margin: 0; line-height: 1.6; color: #555;">{{ $user->about_me }}</p>
                </div>
            @endif

            {{-- Action Buttons --}}
            <div style="text-align: center; margin-top: 30px;">
                <a href="{{ route('profile.edit') }}" 
                   style="display: inline-block; background-color: #007bff; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; margin-right: 10px;">
                    ✏️ Profiel Bewerken
                </a>
                <a href="{{ route('profiles') }}" 
                   style="display: inline-block; background-color: #6c757d; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold;">
                    👥 Alle Profielen
                </a>
            </div>
        </div>

        {{-- Profile Stats --}}
        <div style="margin-top: 30px; background-color: #f8f9fa; padding: 20px; border-radius: 10px;">
            <h4 style="margin: 0 0 15px 0; text-align: center; color: #333;">Profiel Volledigheid</h4>
            <div style="display: flex; justify-content: space-around; text-align: center;">
                <div>
                    <span style="font-size: 24px;">{{ $user->username ? '✅' : '❌' }}</span>
                    <br><small>Username</small>
                </div>
                <div>
                    <span style="font-size: 24px;">{{ $user->birthday ? '✅' : '❌' }}</span>
                    <br><small>Verjaardag</small>
                </div>
                <div>
                    <span style="font-size: 24px;">{{ $user->profile_photo ? '✅' : '❌' }}</span>
                    <br><small>Profielfoto</small>
                </div>
                <div>
                    <span style="font-size: 24px;">{{ $user->about_me ? '✅' : '❌' }}</span>
                    <br><small>Over mij</small>
                </div>
            </div>
        </div>
    </div>
@endsection
