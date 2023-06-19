@extends('templates.master')
@section('title', 'Contact')
@section('content')
<body>

    {{-- navigation --}}
        @include('templates.navigation')
    {{-- navigation --}}

    <div class="container-fluid py-3 " style="direction: rtl;">
    <div class="container">
    @if ( LaravelLocalization::getCurrentLocale() == 'ar')
                @include('front.ar_pages.privacy')
            @elseif(LaravelLocalization::getCurrentLocale() == 'en')
                @include('front.en_pages.privacy')
            @endif
    </div>
</div>
@endsection
