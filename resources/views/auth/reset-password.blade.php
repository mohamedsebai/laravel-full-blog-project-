@include('templates.header')
<body style="overflow: hidden">


<div class="container">
<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="login-section  mt-5 p-0">

                    <form  method="POST" action="{{ route('password.store') }}" class="mt-5">
                        <h2 class="text-center">{{ __('lang.Reset Your Password') }}</h2>
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <div class="form-group">
                            <label for="email">{{ __('lang.Email') }}</label>
                            <input type="text" class="form-control" id="email"
                            type="email" name="email" value="{{ old('email' , $request->email) }}" autofocus
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
                            @error('password')
                                <div style="color:red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">{{ __('lang.Password Confrimation') }}</label>
                            <input type="text" class="form-control" id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required autocomplete="new-password" >
                                @error('password_confirmation')
                                    <div style="color:red">{{ $message }}</div>
                                @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">{{ __('lang.Reset Password') }}</button>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
</div>





@include('templates.footer')
