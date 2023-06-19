@include('templates.header')
<body style="overflow: hidden">


<div class="container">
<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="login-section  mt-5 p-0">
                    <div class="mb-4">
                        {{ __('lang.This is a secure area of the application. Please confirm your password before continuing.') }}
                    </div>

                    {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

                    <form  method="POST" action="{{ route('password.confirm') }}" class="mt-5">
                        @csrf
                        <div class="form-group">
                            <label for="password">{{ __('lang.Password') }}</label>
                            <input type="text" class="form-control" id="password"
                            type="text"
                            name="password"
                            required autocomplete="current-password" >
                            @error('password')
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">{{ __('lang.Confirm') }}</button>
                    </div>

                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
</div>

@include('templates.footer')

