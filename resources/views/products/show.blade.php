@extends('layouts.app')

@section('content')
<div class="product-show">
    <div class="image-wrap">
        <img src="{{ $product->image_path ?? 'https://via.placeholder.com/600x500/20b2aa/ffffff?text=Retro+Kick' }}" alt="{{ $product->name }}" style="width: 100%; border: var(--border-width) solid var(--border-color); background-color: #eee;">
    </div>
    <div class="details">
        <h1 class="retro-title" style="font-size: 2.5rem; margin-bottom: 10px;">{{ $product->name }}</h1>
        <p style="font-size: 1.2rem; margin-bottom: 20px;">{{ $product->description }}</p>
        <p class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        
        <form action="{{ route('cart.add', $product->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn" style="font-size: 1.5rem; padding: 15px 30px; width: 100%;">ADD TO CART</button>
        </form>
        <div style="margin-top: 20px;">
            <a href="{{ route('home') }}" style="color: var(--text-color); font-weight: bold;"><- BACK TO DROPS</a>
        </div>
    </div>
</div>
@endsection
