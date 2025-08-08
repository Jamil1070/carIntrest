<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'CarIntrest')</title>
    <style>
        body {
            background-color: #ffffff; /* Witte achtergrond */
            margin: 0;
            font-family: Arial, sans-serif;
            color: #212121;
        }
        header {
            background-color: #ffeb3b; /* Gele header */
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: relative;
        }
        header .logo {
            font-weight: bold;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #212121;
        }
        
        /* Hamburger Menu Styles */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            padding: 8px;
            background: none;
            border: none;
            z-index: 1001;
        }
        
        .hamburger span {
            width: 25px;
            height: 3px;
            background: #212121;
            margin: 3px 0;
            transition: 0.3s;
            border-radius: 2px;
        }
        
        .hamburger.active span:nth-child(1) {
            transform: rotate(-45deg) translate(-5px, 6px);
        }
        
        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }
        
        .hamburger.active span:nth-child(3) {
            transform: rotate(45deg) translate(-5px, -6px);
        }
        
        nav {
            transition: all 0.3s ease;
        }
        
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }
        nav ul li a {
            text-decoration: none;
            color: #212121;
            font-weight: 600;
            transition: color 0.3s;
        }
        nav ul li a:hover {
            color: #000000;
        }
        footer {
            background-color: #ffeb3b; /* Gele footer */
            color: #212121;
            text-align: center;
            padding: 15px 0;
            margin-top: 50px;
            font-size: 14px;
            letter-spacing: 1px;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.5);
        }
        main {
            padding: 20px;
            max-width: 1000px;
            margin: 0 auto;
        }

        /* Responsive for smaller screens */
        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }
            
            nav {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: #ffeb3b;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
            }
            
            nav.active {
                max-height: 500px;
            }
            
            nav ul {
                flex-direction: column;
                gap: 0;
                padding: 20px;
                width: 100%;
            }
            
            nav ul li {
                width: 100%;
            }
            
            nav ul li a {
                display: block;
                padding: 12px 15px;
                border-radius: 8px;
                background: rgba(255,255,255,0.1);
                margin-bottom: 8px;
                text-align: center;
                transition: all 0.3s ease;
            }
            
            nav ul li a:hover {
                background: rgba(255,255,255,0.2);
                transform: translateY(-2px);
            }
            
            main {
                padding: 15px;
            }
        }
        
        @media (max-width: 480px) {
            header {
                padding: 12px 15px;
            }
            
            header .logo {
                font-size: 18px;
                letter-spacing: 1px;
            }
            
            nav ul {
                padding: 15px;
            }
            
            nav ul li a {
                font-size: 14px;
                padding: 10px 12px;
            }
            
            main {
                padding: 10px;
            }
            
            footer {
                font-size: 12px;
                padding: 12px 0;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">CarIntrest</div>
        
        <!-- Hamburger Menu Button -->
        <button class="hamburger" onclick="toggleMenu()">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <nav id="nav-menu">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('news.index') }}">Nieuws</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ route('faq') }}">FAQ</a></li>
                <li><a href="{{ url('/profiles') }}">Profielen</a></li>
                
                @auth
                    <li><a href="{{ route('profile.show') }}">Mijn Profiel</a></li>
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Uitloggen ({{ auth()->user()->name }})</a></li>
                    @if(auth()->user()->isAdmin())
                        <li><a href="{{ route('admin.dashboard') }}" style="color: #d4af37; font-weight: bold;">👑 Admin Dashboard</a></li>
                    @endif
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Registreer</a></li>
                @endauth
            </ul>
        </nav>

        @auth
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endauth
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        herexamen | project backend | Chaud-ry Burhan
    </footer>

    <script>
        function toggleMenu() {
            const nav = document.getElementById('nav-menu');
            const hamburger = document.querySelector('.hamburger');
            
            nav.classList.toggle('active');
            hamburger.classList.toggle('active');
        }

        // Close menu when clicking on a link (mobile)
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('nav ul li a');
            const nav = document.getElementById('nav-menu');
            const hamburger = document.querySelector('.hamburger');
            
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        nav.classList.remove('active');
                        hamburger.classList.remove('active');
                    }
                });
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInsideNav = nav.contains(event.target);
                const isClickOnHamburger = hamburger.contains(event.target);
                
                if (!isClickInsideNav && !isClickOnHamburger && nav.classList.contains('active')) {
                    nav.classList.remove('active');
                    hamburger.classList.remove('active');
                }
            });

            // Close menu on window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    nav.classList.remove('active');
                    hamburger.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>
