<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RetroKick - Retro Gaul Shoe Store</title>
    <!-- Use Vite for CSS (we will just put our css in resources/css/app.css) -->
    @vite(['resources/css/app.css'])
</head>
<body>
    <header>
        <div class="container nav-inner">
            <a href="{{ route('home') }}" class="logo retro-title">RETROKICK</a>
            <nav class="nav-links">
                <a href="{{ route('home') }}">Home</a>
                @php
                    $cartCount = 0;
                    if(Auth::check()) {
                        $cartCount = Auth::user()->cartItems()->sum('quantity');
                    } else {
                        $cartCount = session()->get('cart') ? array_sum(array_column(session()->get('cart'), 'quantity')) : 0;
                    }
                @endphp
                <a href="{{ route('cart.index') }}">Cart ({{ $cartCount }})</a>
                @guest
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}" class="btn" style="margin-left: 20px; color: white;">Register</a>
                @else
                    <a href="#">{{ Auth::user()->name }}</a>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </nav>
        </div>
    </header>

    <main class="container">
        @if(session('success'))
            <div style="background-color: var(--secondary-color); color: white; padding: 15px; border: var(--border-width) solid var(--border-color); box-shadow: var(--shadow-offset) var(--shadow-offset) 0 var(--border-color); margin-bottom: 20px; font-weight: bold;">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <div class="container">
            <p class="retro-title">&copy; {{ date('Y') }} RETROKICK. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
