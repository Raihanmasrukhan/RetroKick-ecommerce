@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="hero-section">
    <h1 class="hero-title retro-title">RETROKICK</h1>
    <p class="hero-subtitle">Step into the 90s with our exclusive retro collection.</p>
    <a href="#products" class="btn hero-btn">EXPLORE DROPS</a>
</section>

<!-- PRODUCTS SECTION -->
<section id="products" style="margin-bottom: 100px; padding-top: 40px;">
    <h2 class="retro-title" style="border-bottom: var(--border-width) solid var(--border-color); padding-bottom: 10px; margin-bottom: 40px;">LATEST DROPS</h2>

    <div class="product-grid" style="margin-bottom: 60px;">
        @foreach($products as $product)
            <div class="product-card">
                <img src="{{ $product->image_path ?? 'https://via.placeholder.com/300x250/20b2aa/ffffff?text=Retro+Kick' }}" alt="{{ $product->name }}" class="product-image">
                <h3 class="product-title retro-title" style="font-size: 1rem;">{{ $product->name }}</h3>
                <p class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <a href="{{ route('products.show', $product->slug) }}" class="btn">VIEW DETAILS</a>
            </div>
        @endforeach
    </div>
</section>

<!-- TESTIMONIALS SECTION -->
<section id="testimonials" style="margin-bottom: 100px;">
    <h2 class="retro-title" style="border-bottom: var(--border-width) solid var(--border-color); padding-bottom: 10px; margin-bottom: 40px;">HALL OF FAME</h2>
    
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
        <div class="testimonial-card" style="background: #fff; border: var(--border-width) solid var(--border-color); padding: 30px; box-shadow: var(--shadow-offset) var(--shadow-offset) 0 var(--secondary-color);">
            <p style="font-size: 1.2rem; font-style: italic; margin-bottom: 20px;">"The best retro kicks in town! I felt like I teleported back to 1985. The quality is absolutely insane."</p>
            <h4 class="retro-title" style="font-size: 0.9rem; color: var(--primary-color);">- Alex Rad</h4>
        </div>
        <div class="testimonial-card" style="background: #fff; border: var(--border-width) solid var(--border-color); padding: 30px; box-shadow: var(--shadow-offset) var(--shadow-offset) 0 var(--primary-color);">
            <p style="font-size: 1.2rem; font-style: italic; margin-bottom: 20px;">"Lightning fast delivery and the neon colors pop just like in the pictures. Highly recommended!"</p>
            <h4 class="retro-title" style="font-size: 0.9rem; color: var(--secondary-color);">- Sarah Vibes</h4>
        </div>
        <div class="testimonial-card" style="background: #fff; border: var(--border-width) solid var(--border-color); padding: 30px; box-shadow: var(--shadow-offset) var(--shadow-offset) 0 var(--border-color);">
            <p style="font-size: 1.2rem; font-style: italic; margin-bottom: 20px;">"Got the Cyberpunk Low-Tops and haven't stopped wearing them. Retrokick never disappoints."</p>
            <h4 class="retro-title" style="font-size: 0.9rem; color: var(--text-color);">- Neo Matrix</h4>
        </div>
    </div>
</section>

<!-- ABOUT / CONTACT SECTION -->
<section id="about" class="about-section">
    <h2 class="retro-title">CONNECT WITH US</h2>
    
    <div style="display: flex; flex-wrap: wrap; gap: 40px;">
        <div style="flex: 1; min-width: 250px;">
            <h3 class="retro-title" style="font-size: 1rem; margin-bottom: 15px;">HQ BASE</h3>
            <p style="font-size: 1.1rem; font-weight: bold; line-height: 1.8;">
                RetroKick Arcade<br>
                Jl. Nostalgia No. 99<br>
                Jakarta Selatan, 12345
            </p>
        </div>
        <div style="flex: 1; min-width: 250px;">
            <h3 class="retro-title" style="font-size: 1rem; margin-bottom: 15px;">COMM LINK</h3>
            <p style="font-size: 1.1rem; font-weight: bold; line-height: 1.8;">
                Email: hello@retrokick.com<br>
                Phone: +62 811 9988 7766
            </p>
        </div>
        <div style="flex: 1; min-width: 250px;">
            <h3 class="retro-title" style="font-size: 1rem; margin-bottom: 15px;">SOCIALS</h3>
            <p style="font-size: 1.1rem; font-weight: bold; line-height: 1.8;">
                IG: @retrokick.id<br>
                X: @retrokick<br>
                TikTok: @retrokick.id
            </p>
        </div>
    </div>
</section>

@endsection
