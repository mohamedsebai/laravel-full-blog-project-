@extends('templates.master')
@section('title', 'Contact')
@section('content')
<body>

    {{-- navigation --}}
        @include('templates.navigation')
    {{-- navigation --}}

    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="{{ route('home.page') }}">{{ __('Lang.Home') }}</a>
                <span class="breadcrumb-item active">{{ __('Lang.Contact') }}</span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Contact Start -->
    <div class="container-fluid py-3">
        <div class="container">

            <div class="bg-light py-2 px-4 mb-3">
                <h3 class="m-0">{{ __('lang.contact us title') }}</h3>
            </div>
            @if ( session()->has('message') )
                {!! session()->get('message') !!}
            @endif
            <div class="row">
                <div class="col-md-5">
                    <div class="bg-light mb-3" style="padding: 30px;">
                        <h6 class="font-weight-bold">{{ __('Lang.Get in touch') }}</h6>
                        <p>{{ __('Lang.Get in touch content') }}</p>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h6 class="font-weight-bold">{{ __('Lang.Our office') }}</h6>
                                <p class="m-0">{{ $contactData->our_office }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="fa fa-2x fa-envelope-open text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h6 class="font-weight-bold">{{ __('Lang.Email us') }}</h6>
                                <p class="m-0">{{ $contactData->our_email }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="fas fa-2x fa-phone-alt text-primary mr-3"></i>
                            <div class="d-flex flex-column">
                                <h6 class="font-weight-bold">{{ __('Lang.Call us') }}</h6>
                                <p class="m-0">{{ $contactData->our_phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="contact-form bg-light mb-3" style="padding: 30px;">
                        <div id="success"></div>
                        <form method="post" action="{{ route('contact.page.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input type="text" name="name"
                                        class="form-control p-4" id="name" placeholder="{{ __('Lang.Your Name') }}"
                                        data-validation-required-message="Please enter your name"
                                        value="{{ Auth::check() ? Auth::user()->name : '' }}"/>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    @error('name')
                                        <div class="alert alert-danger px-0 py-0">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="control-group">
                                        <input type="text" name="email"
                                        class="form-control p-4" id="email" placeholder="{{ __('Lang.Your Email') }}"
                                        data-validation-required-message="Please enter your email"
                                        value="{{ Auth::check() ? Auth::user()->email : ''  }}"/>
                                        <p class="help-block text-danger"></p>
                                        @error('email')
                                        <div class="alert alert-danger px-0 py-0">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <input type="text" name="subject" class="form-control p-4"
                                id="subject" placeholder="{{ __('Lang.Subject') }}"
                                data-validation-required-message="Please enter a subject"
                                value="{{ old('subject') }}"/>
                                <p class="help-block text-danger"></p>
                                @error('subject')
                                        <div class="alert alert-danger px-0 py-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="control-group">
                                <textarea name="message" class="form-control" rows="4"
                                id="message" placeholder="{{ __('Lang.Message') }}"
                                data-validation-required-message="Please enter your message">{{ old('message') }}</textarea>
                                <p class="help-block text-danger"></p>
                                @error('message')
                                        <div class="alert alert-danger px-0 py-0">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button class="btn btn-danger mt-2" style="background-color: red"
                                    style="height: 50px;" type="submit" id="sendMessageButton">{{ __('Lang.Send Message') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->

@endsection
