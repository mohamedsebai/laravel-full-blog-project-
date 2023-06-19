@include('templates.header')
<body style="overflow: hidden">


<div class="container">
<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="login-section  mt-5 p-0">
                        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('lang.ForgetPasswordTitle')}}
                    </div>

                    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

                    @if (session()->has('status'))
                        <div class="alert alert-success">{{ session()->get('status') }}</div>
                    @endif

                    <form  method="POST" action="{{ route('password.email') }}" class="mt-5">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('lang.Email') }}</label>
                            <input type="text" class="form-control" id="email" placeholder="{{ __('lang.Your Email') }}"
                            type="email" name="email" value="{{ old('email') }}" autofocus
                            required autofocus autocomplete="username">
                            @error('email')
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">{{ __('lang.Email Password Reset Link') }}</button>
                    </div>

                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
</div>


@include('templates.footer')
