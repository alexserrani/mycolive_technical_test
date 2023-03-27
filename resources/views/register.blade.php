@extends('layout.auth')

@section('main')
<body>
    <div class="container">
        <div class="wrapper">
            <form class="auth-container" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="page-title">
                    <h2>SIGN UP</h2>
                </div>

                <div class="form-container">
                    <input type="text" placeholder="username" required name="username">
                </div>

                <div class="form-container">
                    <input type="password" placeholder="password" required name="password">
                </div>

                <div class="form-container">
                    <input type="password" placeholder="confirm password" required name="password_confirmation">
                </div>

                <button class="button-submit" type="submit">Signup</button>

                <span class="redirect">
                    Already have an account? <a href="/login">Login here</a>
                </span>
            </form>
        </div>
    </div>
</body>
@endsection
