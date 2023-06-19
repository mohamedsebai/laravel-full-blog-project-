
@include('templates.header')


    @yield('content')



    <!-- Footer Start -->
    <div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="{{ route('home.page') }}" class="navbar-brand">
                    <?php
                        if(LaravelLocalization::getCurrentLocale() == 'en' || LaravelLocalization::getCurrentLocale() !== 'ar' ){ ?>
                        <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary">{{ __('Lang.NEWS') }}
                        </span>{{ __('Lang.ROOM') }}</h1>
                        <?php }elseif(LaravelLocalization::getCurrentLocale() == 'ar'){ ?>
                        <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary">{{ __('Lang.ROOM') }}
                        </span>{{ __('Lang.NEWS') }}</h1>
                    <?php } ?>
                </a>
                <p>{{ __('Lang.website slug') }}</p>
                <div class="d-flex justify-content-start mt-4">
                        @foreach ( $SHARING_MEDIA_ACCOUNTS_DATA as $mediaAccountShare)
                        {{-- / {{ $mediaAccountShare->link }} --}}
                            @if($mediaAccountShare->account = 'facebook')
                                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $mediaAccountShare->link }}"><i class="fa fa-facebook-f"></i></a>
                            @endif
                            @if($mediaAccountShare->account = 'twitter')
                                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="#{{ $mediaAccountShare->link }}"><i class="fa fa-twitter"></i></a>
                            @endif
                            @if($mediaAccountShare->account = 'linkedin')
                                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $mediaAccountShare->link }}"><i class="fa fa-linkedin"></i></a>
                            @endif
                            @if($mediaAccountShare->account = 'instagram')
                                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $mediaAccountShare->link }}"><i class="fa fa-instagram"></i></a>
                            @endif
                            @if($mediaAccountShare->account = 'youtube')
                                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $mediaAccountShare->link }}"><i class="fa fa-youtube"></i></a>
                            @endif
                            @if($mediaAccountShare->account = 'github')
                                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;" href="{{ $mediaAccountShare->link }}"><i class="fa fa-github"></i></a>
                            @endif
                            @if ($loop->iteration >= 1)
                                @break
                            @endif
                        @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">{{ __('Lang.CATEGORIES') }}</h4>
                <div class="d-flex flex-wrap m-n1">
                    @foreach ($SHARAING_CATEGORIES_DATA as $categoryShare)
                        <a href="{{ route('category.show', [ 'id' => $categoryShare->id, 'slug' => $categoryShare->slug] ) }}" class="btn btn-sm btn-outline-secondary m-1">{{ $categoryShare->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">{{ __('Lang.TAGS') }}</h4>
                <div class="d-flex flex-wrap m-n1">
                    @foreach ($SHARAING_TAGS_DATA as $tagShare)
                        <a href="{{ route( 'tag.show', [ 'id' => $tagShare->id, 'slug' => $tagShare->slug] ) }}" class="btn btn-sm btn-outline-secondary m-1">{{ $tagShare->name }}</a>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="font-weight-bold mb-4">{{ __('Lang.QUICK LINKS') }}</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-secondary mb-2" href="{{ route('home.page') }}"><i class="fa fa-angle-right text-dark mr-2"></i>{{ __('Lang.Home') }}</a>
                    <a class="text-secondary mb-2" href="{{ route('about-us.page') }}"><i class="fa fa-angle-right text-dark mr-2"></i>{{ __('Lang.About us') }}</a>
                    <a class="text-secondary mb-2" href="{{ route('privacy.page') }}"><i class="fa fa-angle-right text-dark mr-2"></i>{{ __('Lang.Privacy & policy') }}</a>
                    <a class="text-secondary" href="{{ route('contact.page.index') }}"><i class="fa fa-angle-right text-dark mr-2"></i>{{ __('Lang.Contact') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 px-sm-3 px-md-5">
        <p class="m-0 text-center">
            &copy; <a class="font-weight-bold" href="{{ route('home.page') }}">Arrogantm</a>. {{ __('Lang.All Rights Reserved') }}
			{{ __('Lang.Developed by') }} <a class="font-weight-bold" href="https://www.linkedin.com/in/arrogantm/">{{ __('lang.Owner') }}</a>
        </p>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


@include('templates.footer')
