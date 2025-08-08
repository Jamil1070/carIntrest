@extends('layouts.app')

@section('content')
    <div style="max-width: 800px; margin: 20px auto; padding: 20px;">
        <h1 style="text-align: center; margin-bottom: 30px; color: #333;">Over CarIntrest</h1>

        {{-- Hero Section --}}
        <div style="background: linear-gradient(135deg, #ffeb3b 0%, #fdd835 100%); padding: 40px; border-radius: 15px; margin-bottom: 40px; text-align: center; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
            <h2 style="margin: 0 0 15px 0; color: #333; font-size: 28px;">🚗 Passie voor Auto's</h2>
            <p style="margin: 0; font-size: 18px; color: #555; line-height: 1.6;">
                "Waar auto liefhebbers samenkomen om hun passie te delen"
            </p>
        </div>

        {{-- Over Auto Liefhebbers --}}
        <div style="background-color: #fff; padding: 30px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <h3 style="color: #333; margin-bottom: 20px; border-bottom: 3px solid #ffeb3b; padding-bottom: 10px;">
                🏁 Voor Auto Liefhebbers
            </h3>
            <p style="line-height: 1.8; color: #555; margin-bottom: 15px;">
                CarIntrest is dé plek voor iedereen die gepassioneerd is over auto's. Of je nu houdt van klassieke oldtimers, 
                moderne sportwagens, elektrische innovaties of gewoon nieuwsgierig bent naar de nieuwste autotrends - 
                hier vind je gelijkgestemde mensen die jouw passie delen.
            </p>
            <p style="line-height: 1.8; color: #555; margin: 0;">
                Onze community bestaat uit enthousiastelingen die graag hun kennis delen, ervaringen uitwisselen 
                en samen de fascinerende wereld van auto's verkennen.
            </p>
        </div>

        {{-- Over Auto's --}}
        <div style="background-color: #fff; padding: 30px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <h3 style="color: #333; margin-bottom: 20px; border-bottom: 3px solid #ffeb3b; padding-bottom: 10px;">
                🚙 Auto Kennis & Informatie
            </h3>
            <p style="line-height: 1.8; color: #555; margin-bottom: 15px;">
                We bieden uitgebreide informatie over verschillende automerken, modellen en specificaties. 
                Van Duitse premium merken zoals BMW, Mercedes-Benz en Audi, tot Italiaanse supercars en 
                betrouwbare Japanse modellen - elk merk heeft zijn eigen verhaal en karakteristieken.
            </p>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 15px; margin-top: 20px;">
                <div style="padding: 15px; background-color: #f8f9fa; border-radius: 8px; text-align: center;">
                    <strong style="color: #007bff;">🔧 Technische Details</strong>
                    <p style="margin: 10px 0 0 0; font-size: 14px; color: #666;">Specificaties, prestaties en innovaties</p>
                </div>
                <div style="padding: 15px; background-color: #f8f9fa; border-radius: 8px; text-align: center;">
                    <strong style="color: #28a745;">🛠️ Onderhoud Tips</strong>
                    <p style="margin: 10px 0 0 0; font-size: 14px; color: #666;">Praktische adviezen voor autoverzorging</p>
                </div>
                <div style="padding: 15px; background-color: #f8f9fa; border-radius: 8px; text-align: center;">
                    <strong style="color: #ffc107;">📊 Vergelijkingen</strong>
                    <p style="margin: 10px 0 0 0; font-size: 14px; color: #666;">Modellen en merken naast elkaar</p>
                </div>
            </div>
        </div>

        {{-- Over het Project --}}
        <div style="background-color: #fff; padding: 30px; border-radius: 10px; margin-bottom: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
            <h3 style="color: #333; margin-bottom: 20px; border-bottom: 3px solid #ffeb3b; padding-bottom: 10px;">
                💻 Over dit Project
            </h3>
            <p style="line-height: 1.8; color: #555; margin-bottom: 15px;">
                CarIntrest is gebouwd als een moderne webapplicatie waar auto-enthusiasten kunnen samenkomen, 
                discussiëren en hun passie delen. Het platform is ontwikkeld met de nieuwste technologieën 
                en focus op gebruiksvriendelijkheid.
            </p>
            
            <div style="margin: 25px 0;">
                <h4 style="color: #333; margin-bottom: 15px;">🛠️ Technische Functionaliteiten:</h4>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 8px; padding-left: 25px; position: relative;">
                        <span style="position: absolute; left: 0; color: #28a745;">✓</span>
                        <strong>Gebruikersprofielen</strong> - Personaliseer je profiel met foto en informatie
                    </li>
                    <li style="margin-bottom: 8px; padding-left: 25px; position: relative;">
                        <span style="position: absolute; left: 0; color: #28a745;">✓</span>
                        <strong>Comment systeem</strong> - Discussieer over verschillende auto's
                    </li>
                    <li style="margin-bottom: 8px; padding-left: 25px; position: relative;">
                        <span style="position: absolute; left: 0; color: #28a745;">✓</span>
                        <strong>FAQ sectie</strong> - Uitgebreide auto-informatie en tips
                    </li>
                    <li style="margin-bottom: 8px; padding-left: 25px; position: relative;">
                        <span style="position: absolute; left: 0; color: #28a745;">✓</span>
                        <strong>Contact formulier</strong> - Directe communicatie met beheerders
                    </li>
                    <li style="margin-bottom: 8px; padding-left: 25px; position: relative;">
                        <span style="position: absolute; left: 0; color: #28a745;">✓</span>
                        <strong>Admin panel</strong> - Content en gebruikersbeheer
                    </li>
                    <li style="margin-bottom: 8px; padding-left: 25px; position: relative;">
                        <span style="position: absolute; left: 0; color: #28a745;">✓</span>
                        <strong>Responsive design</strong> - Werkt perfect op alle apparaten
                    </li>
                </ul>
            </div>

            <div style="padding: 20px; background-color: #f8f9fa; border-radius: 8px; border-left: 4px solid #007bff;">
                <p style="margin: 0; font-style: italic; color: #555;">
                    <strong>Ontwikkeld met:</strong> Laravel 12.x, PHP 8.3, MySQL database, 
                    responsive CSS en moderne webstandaarden voor optimale prestaties en beveiliging.
                </p>
            </div>
        </div>

        {{-- Call to Action --}}
        <div style="background: linear-gradient(135deg, #007bff 0%, #0056b3 100%); padding: 30px; border-radius: 15px; text-align: center; color: white;">
            <h3 style="margin: 0 0 15px 0;">Sluit je aan bij onze community!</h3>
            <p style="margin: 0 0 20px 0; opacity: 0.9;">
                Registreer je vandaag nog en deel jouw autopassie met andere liefhebbers
            </p>
            <div style="margin-top: 20px;">
                @guest
                    <a href="{{ route('register') }}" 
                       style="display: inline-block; background-color: #ffeb3b; color: #333; padding: 12px 25px; text-decoration: none; border-radius: 25px; font-weight: bold; margin-right: 10px;">
                        Registreer Nu
                    </a>
                    <a href="{{ route('login') }}" 
                       style="display: inline-block; background-color: transparent; color: white; padding: 12px 25px; text-decoration: none; border-radius: 25px; border: 2px solid white; font-weight: bold;">
                        Inloggen
                    </a>
                @else
                    <a href="{{ route('profiles') }}" 
                       style="display: inline-block; background-color: #ffeb3b; color: #333; padding: 12px 25px; text-decoration: none; border-radius: 25px; font-weight: bold; margin-right: 10px;">
                        Bekijk Profielen
                    </a>
                    <a href="{{ route('faq') }}" 
                       style="display: inline-block; background-color: transparent; color: white; padding: 12px 25px; text-decoration: none; border-radius: 25px; border: 2px solid white; font-weight: bold;">
                        Auto FAQ
                    </a>
                @endguest
            </div>
        </div>
    </div>
@endsection
