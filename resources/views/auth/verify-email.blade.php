@include('templates.header')
<body style="overflow: hidden">


<div class="container">
<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="login-section  mt-5 p-0">
                    <div class="mb-4">
                        {{ __('lang.Thanks for signing up! Before getting started, could you verify your email address by
    clicking on the link we just emailed to you? If you did not receive the email, we will gladly send you another.')}}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success">
                            {{ __('lang.A new verification link has been sent to the email address you provided during registration') }}
                        </div>
                    @endif

                    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

                    <form  method="POST" action="{{ route('verification.send') }}" class="mt-5">
                        @csrf
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">{{ __('lang.Resend Verification Email') }}</button>
                    </div>

                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="form-group">
                        <button type="submit" class="btn btn-success">{{ __('lang.Logout') }}</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
</div>


@include('templates.footer')
