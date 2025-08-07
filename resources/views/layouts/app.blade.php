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
        }
        header .logo {
            font-weight: bold;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #212121;
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
        @media (max-width: 600px) {
            header {
                flex-direction: column;
                gap: 10px;
            }
            nav ul {
                flex-direction: column;
                gap: 10px;
            }
            main {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">CarIntrest</div>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ url('/faq') }}">FAQ</a></li>
                <li><a href="{{ url('/profiles') }}">Profielen</a></li>
                <li><a href="{{ url('/login') }}">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        herexamen | project backend | Chaud-ry Burhan
    </footer>
</body>
</html>
