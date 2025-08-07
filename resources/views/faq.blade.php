@extends('layouts.app')

@section('content')
    <div style="max-width: 800px; margin: 0 auto; padding: 20px;">
        <h1 style="text-align: center; margin-bottom: 30px; color: #333;">Veelgestelde Vragen (FAQ)</h1>

        <p style="text-align: center; font-style: italic; margin-bottom: 40px; color: #666;">
            Hier vindt u antwoorden op veelgestelde vragen over auto's, specificaties, onderhoud en meer.
        </p>

        @if($categories->isEmpty())
            <div style="text-align: center; padding: 40px; background-color: #f8f9fa; border-radius: 10px;">
                <h3 style="color: #666;">Nog geen FAQ's beschikbaar</h3>
                <p style="color: #888;">Er zijn momenteel geen veelgestelde vragen beschikbaar.</p>
            </div>
        @else
            @foreach($categories as $category)
                <div style="margin-bottom: 40px; background-color: #fff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); overflow: hidden;">
                    {{-- Category Header --}}
                    <div style="background-color: #007bff; color: white; padding: 20px;">
                        <h2 style="margin: 0; font-size: 24px;">{{ $category->name }}</h2>
                        @if($category->description)
                            <p style="margin: 10px 0 0 0; opacity: 0.9;">{{ $category->description }}</p>
                        @endif
                    </div>

                    {{-- FAQ Items --}}
                    <div style="padding: 20px;">
                        @if($category->faqs->isEmpty())
                            <p style="color: #666; font-style: italic;">Geen vragen beschikbaar in deze categorie.</p>
                        @else
                            @foreach($category->faqs as $faq)
                                <div style="margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 20px;">
                                    {{-- Question --}}
                                    <div style="cursor: pointer; padding: 15px; background-color: #f8f9fa; border-radius: 8px; margin-bottom: 10px; border-left: 4px solid #007bff;"
                                         onclick="toggleAnswer({{ $faq->id }})">
                                        <h4 style="margin: 0; color: #333; display: flex; justify-content: space-between; align-items: center;">
                                            <span>{{ $faq->question }}</span>
                                            <span id="icon-{{ $faq->id }}" style="font-size: 18px; color: #007bff;">▼</span>
                                        </h4>
                                    </div>

                                    {{-- Answer --}}
                                    <div id="answer-{{ $faq->id }}" style="display: none; padding: 15px; background-color: #ffffff; border: 1px solid #e9ecef; border-radius: 8px;">
                                        <p style="margin: 0; line-height: 1.6; color: #555;">{{ $faq->answer }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        @endif

        {{-- Contact Info --}}
        <div style="margin-top: 50px; text-align: center; padding: 30px; background-color: #f8f9fa; border-radius: 10px;">
            <h3 style="margin-bottom: 15px; color: #333;">Geen antwoord gevonden?</h3>
            <p style="margin-bottom: 20px; color: #666;">
                Staat uw vraag er niet bij? Neem dan gerust contact met ons op.
            </p>
            <a href="{{ route('contact') }}" 
               style="display: inline-block; background-color: #007bff; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold; transition: background-color 0.3s;">
                📧 Contact opnemen
            </a>
        </div>
    </div>

    <script>
        function toggleAnswer(faqId) {
            const answer = document.getElementById('answer-' + faqId);
            const icon = document.getElementById('icon-' + faqId);
            
            if (answer.style.display === 'none' || answer.style.display === '') {
                answer.style.display = 'block';
                icon.innerHTML = '▲';
            } else {
                answer.style.display = 'none';
                icon.innerHTML = '▼';
            }
        }

        // Smooth scrolling for better UX
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effects
            const questions = document.querySelectorAll('[onclick^="toggleAnswer"]');
            questions.forEach(question => {
                question.addEventListener('mouseenter', function() {
                    this.style.backgroundColor = '#e9ecef';
                });
                question.addEventListener('mouseleave', function() {
                    this.style.backgroundColor = '#f8f9fa';
                });
            });
        });
    </script>

    <style>
        a[href="{{ route('contact') }}"]:hover {
            background-color: #0056b3 !important;
        }
    </style>
@endsection
