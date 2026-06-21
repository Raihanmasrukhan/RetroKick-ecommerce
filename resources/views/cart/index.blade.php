@extends('layouts.app')

@section('content')
<h1 class="retro-title" style="margin-bottom: 30px;">YOUR GEAR</h1>

@if(count($cartItems) > 0)
    <table class="cart-table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($cartItems as $id => $details)
                <tr>
                    <td style="font-weight: bold;">{{ $details['name'] }}</td>
                    <td>Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                    <td>{{ $details['quantity'] }}</td>
                    <td>Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style="background-color: #111; padding: 5px 10px; font-size: 0.8rem;">REMOVE</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="cart-total retro-title">
        TOTAL: <span style="color: var(--primary-color);">Rp {{ number_format($total, 0, ',', '.') }}</span>
    </div>

    <div style="text-align: right;">
        <button class="btn btn-secondary" onclick="openCheckoutModal()">PROCEED TO CHECKOUT</button>
    </div>

    <!-- RETRO POPUP MODAL -->
    <div id="checkoutModal" class="retro-modal" style="display: none;">
        <div class="retro-modal-content">
            <h2 class="retro-title" style="color: var(--primary-color); margin-bottom: 20px;">SABI BRO! 🚀</h2>
            <p style="font-size: 1.2rem; margin-bottom: 20px; font-weight: bold;">
                Orderan lo udah masuk sistem kita. Kicks impian lo lagi kita bungkus dan siap meluncur! Santuy aja, sambil nunggu kurir mending main dingdong dulu. 🕹️🔥
            </p>
            <button class="btn" onclick="closeCheckoutModal()">MANTAP!</button>
        </div>
    </div>

    <script>
        function openCheckoutModal() {
            document.getElementById('checkoutModal').style.display = 'flex';
        }
        function closeCheckoutModal() {
            document.getElementById('checkoutModal').style.display = 'none';
        }
    </script>
@else
    <div style="background: #fff; padding: 40px; text-align: center; border: var(--border-width) solid var(--border-color); box-shadow: var(--shadow-offset) var(--shadow-offset) 0 var(--border-color);">
        <h2 class="retro-title" style="margin-bottom: 20px;">YOUR CART IS EMPTY</h2>
        <a href="{{ route('home') }}" class="btn">GO SHOPPING</a>
    </div>
@endif
@endsection
