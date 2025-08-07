@extends('layouts.app')

@section('content')
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
                                <li>
                                    <strong>{{ $comment->author }}:</strong> {{ $comment->content }}
                                    <br><small style="color: #999;">{{ $comment->created_at->diffForHumans() }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
