@extends('layouts.app')

@section('content')
<div class="auth-form">
    <h2 class="retro-title" style="text-align: center; margin-bottom: 30px;">LOGIN</h2>
    
    @if($errors->any())
        <div style="color: var(--primary-color); font-weight: bold; margin-bottom: 20px;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">EMAIL ADDRESS</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div style="margin-top: 30px;">
            <button type="submit" class="btn" style="width: 100%;">ACCESS DEN</button>
        </div>
        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('register') }}" style="color: var(--text-color); font-weight: bold;">NO ACCOUNT? REGISTER HERE</a>
        </div>
    </form>
</div>
@endsection
