@include('templates.adminHeader')
<body style="overflow: hidden">


<div class="container">
<div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="register-section  mt-5 p-0">

                    <form  method="POST" action="{{ route('admin.register') }}" class="mt-5">
                        <h2 class="text-center mb-5 mt-5">{{ __('lang.Register New Account') }}</h2>
                        @csrf

                        <div class="form-group">
                            <label for="name">{{ __('Lang.Name') }}</label>
                            <input type="text" class="form-control" id="name"
                            name="name" value="{{ old('name') }}" placeholder="{{ __('Lang.Your Name') }}"
                            required>
                            @error('name')
                                <div style="color:red">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('lang.Email') }}</label>
                            <input class="form-control" id="email" type="email"
                            name="email" value="{{ old('email') }}" placeholder="{{ __('lang.Your Email') }}"
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
                            <button type="submit" class="btn btn-success">{{ __('lang.Register') }}</button>
                        </div>

                        <a href="{{ route('login') }}">{{ __('lang.Already registered') }}?</a>



                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
</div>



@include('templates.adminFooter')

