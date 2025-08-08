@extends('layouts.app')

@section('content')
    {{-- Success message --}}
    @if(session('success'))
        <div style="background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 12px; border-radius: 5px; margin-bottom: 20px; text-align: center;">
            {{ session('success') }}
        </div>
    @endif

    <h1 style="text-align:center; margin-bottom: 10px;">Auto's lijst</h1>

    <p class="intro-text" style="text-align:center; font-style: italic; margin-bottom: 30px;">
        Hier vind je een overzicht van alle beschikbare auto's in onze collectie.
    </p>

    <div class="cars-list" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px;">
        @foreach ($cars as $car)
            <div class="car-item" style="border: 1px solid #ccc; padding: 15px; width: 280px; text-align: center; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                @if(!empty($car->photo_url))
                    <img src="{{ asset($car->photo_url) }}" alt="{{ $car->name }}" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                @else
                    <div class="no-image" style="height: 150px; background: #eee; line-height: 150px; color: #888; margin-bottom: 10px;">
                        Geen afbeelding
                    </div>
                @endif
                <h3>{{ $car->name }} ({{ $car->model }})</h3>
                <p>{{ $car->description ?? 'Geen beschrijving beschikbaar.' }}</p>

                {{-- Comments sectie --}}
                <div class="comments" style="text-align: left; margin-top: 15px;">
                    <h4>Comments:</h4>
                    @if($car->comments->isEmpty())
                        <p style="font-style: italic; color: #666;">Nog geen comments.</p>
                    @else
                        <ul style="padding-left: 20px;">
                            @foreach($car->comments as $comment)
                                <li id="comment-{{ $comment->id }}" style="margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 10px;">
                                    <strong>{{ $comment->user->name ?? $comment->author ?? 'Onbekend' }}:</strong> {{ $comment->content }}
                                    <br>
                                    <small style="color: #999;">{{ $comment->created_at->diffForHumans() }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                    
                    {{-- Commentaar toevoegen formulier - alleen voor ingelogde gebruikers --}}
                    @auth
                        <div style="margin-top: 15px; padding: 10px; background-color: #f8f9fa; border-radius: 5px;">
                            <h5 style="margin-bottom: 10px;">Voeg commentaar toe:</h5>
                            <form action="{{ route('comments.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 8px;">
                                @csrf
                                <input type="hidden" name="car_id" value="{{ $car->id }}">
                                <textarea name="content" placeholder="Jouw commentaar" required rows="2"
                                          style="padding: 5px; border: 1px solid #ddd; border-radius: 3px; font-size: 12px; resize: vertical;"></textarea>
                                <button type="submit" 
                                        style="background-color: #28a745; color: white; border: none; padding: 5px 10px; border-radius: 3px; cursor: pointer; font-size: 12px;">
                                    💬 Plaats commentaar
                                </button>
                            </form>
                        </div>
                    @else
                        <div style="margin-top: 15px; padding: 10px; background-color: #e9ecef; border-radius: 5px; text-align: center;">
                            <p style="margin: 0; color: #6c757d; font-size: 12px;">
                                <a href="{{ route('login') }}" style="color: #007bff; text-decoration: none;">Log in</a> 
                                of 
                                <a href="{{ route('register') }}" style="color: #007bff; text-decoration: none;">registreer</a> 
                                om een commentaar te plaatsen.
                            </p>
                        </div>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>

@endsection
