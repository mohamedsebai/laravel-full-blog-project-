@include('templates.header')
<body style="overflow: hidden">


<div class="container">
<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="login-section  mt-5 p-0">

                    <form  method="POST" action="{{ route('login') }}" class="mt-5">
                        <h2 class="text-center mb-5 mt-5">{{ __('lang.Login Now') }}!</h2>
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('lang.Email') }}</label>
                            <input type="text" class="form-control" id="email"
                            type="email" name="email" value="{{ old('email') }}"
                            required autofocus autocomplete="username">
                            @error('email')
                                <div style="color:red">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('lang.Password') }}</label>
                            <input type="text" class="form-control" id="password"
                            type="text"
                            name="password"
                            required autocomplete="current-password" >
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                @error('password')
                                    <div style="color:red">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="remember_me" >{{ __('lang.remember me') }}</label>
                                <input id="remember_me" type="checkbox"name="remember">
                            </label>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">{{ __('lang.Login') }}</button>
                        </div>
                        @if (Route::has('password.request'))
                            <a  href="{{ route('password.request') }}">
                                {{ __('lang.Forgot your password') }}
                            </a>
                        @endif



                        {{-- if there is Internet will run that if you want --}}
                        <div class="form-group">
                            <p>{{ __('lang.Google recpatcha') }}</p>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            @error('g-recaptcha-response')
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>

                            <div class="form-group">
                                <h5 class="mt-3 mb-3">{{ __('lang.login with socail accounts') }}</h5>
                                <a style="background: white; padding: 10px; margin-top: 10px" href="{{ route('google.auth.now') }}">Google</a>
                                <a style="background: blue; padding: 10px; margin-top: 10px; color: white" href="{{ route('facebook.auth.now') }}">Facebook</a>
                                <a style="background: black; padding: 10px; margin-top: 10px; color: white" href="{{ route('github.auth.now') }}">Github</a>
                            </div>



                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
</div>


@include('templates.footer')



