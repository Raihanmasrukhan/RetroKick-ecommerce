@extends('layouts.app')

@section('content')
<div class="auth-form">
    <h2 class="retro-title" style="text-align: center; margin-bottom: 30px;">REGISTER</h2>

    @if($errors->any())
        <div style="color: var(--primary-color); font-weight: bold; margin-bottom: 20px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">FULL NAME</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="email">EMAIL ADDRESS</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">CONFIRM PASSWORD</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <div style="margin-top: 30px;">
            <button type="submit" class="btn btn-secondary" style="width: 100%;">JOIN THE CREW</button>
        </div>
        <div style="text-align: center; margin-top: 20px;">
            <a href="{{ route('login') }}" style="color: var(--text-color); font-weight: bold;">ALREADY A MEMBER? LOGIN</a>
        </div>
    </form>
</div>
@endsection
