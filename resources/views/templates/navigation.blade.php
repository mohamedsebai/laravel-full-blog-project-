    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center bg-light px-lg-5">

            <div class="col-12 col-md-8">
                <div class="d-flex justify-content-between">
                    <div class="bg-primary text-white text-center py-2" style="width: 100px;">{{ __('Lang.Trendding') }}</div>
                    <div class="owl-carousel owl-carousel-1 tranding-carousel position-relative d-inline-flex align-items-center ml-3"
                    style="width: calc(100% - 100px); padding-left: 90px;">
                        @foreach ($SHARAING_POSTS_DATA as $postShare)
                                <div class="text-truncate">
                                    <a class="text-secondary" href="{{ route('single.show', ['id' => $postShare->id, 'slug' => $postShare->slug]) }}">{{ $postShare->title }}</a>
                                </div>
                            @if ($loop->iteration >= 5)
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4 text-right d-none d-md-block">
                <span>{{ date('Y:m:d H:i:s') }}</span>
            </div>
        </div>
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-4">
                {{-- in big screen  --}}
                <a href="{{ route('home.page') }}" class="navbar-brand d-none d-lg-block">
                        <?php
                        if(LaravelLocalization::getCurrentLocale() == 'en' || LaravelLocalization::getCurrentLocale() !== 'ar'){ ?>
                        <h1 class="m-0 display-5 text-uppercase">
                            <span class="text-primary">{{ __('Lang.NEWS') }}</span>
                            {{ __('Lang.ROOM') }}
                        </h1>
                        <?php }elseif(LaravelLocalization::getCurrentLocale() == 'ar'){ ?>
                        <h1 class="m-0 display-5 text-uppercase">
                            <span class="text-primary">{{ __('Lang.ROOM') }}</span>
                            {{ __('Lang.NEWS') }}
                        </h1>
                        <?php } ?>
                </a>
            </div>
            <div class="col-lg-8 text-center text-lg-right">
                <img class="img-fluid" src="{{ url('img/ads-700x70.jpg') }}" alt="">
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            {{-- in small screen  --}}
            <a href="{{ route('home.page') }}" class="navbar-brand d-block d-lg-none">
                    <?php
                        if(LaravelLocalization::getCurrentLocale() == 'en' || LaravelLocalization::getCurrentLocale() !== 'ar'){ ?>
                        <h1 class="m-0 display-5 text-uppercase">
                            <span class="text-primary">{{ __('lang.NEWS') }}</span>
                            {{ __('lang.ROOM') }}
                        </h1>
                    <?php }elseif(LaravelLocalization::getCurrentLocale() == 'ar'){ ?>
                        <h1 class="m-0 display-5 text-uppercase">
                            <span class="text-primary">{{ __('lang.ROOM') }}</span>
                            {{ __('lang.NEWS') }}
                        </h1>
                    <?php } ?>

            </a>

            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="{{ route('home.page') }}" class="nav-item nav-link">{{ __('Lang.Home') }}</a>
                    <a href="{{ route('contact.page.index') }}" class="nav-item nav-link">{{ __('Lang.Contact') }}</a>
                    <div class="nav-item dropdown">
                        <span class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('Lang.CATEGORIES') }}</span>
                        <div class="dropdown-menu rounded-0 m-0">
                            @foreach ($SHARAING_CATEGORIES_DATA as $categoryShare)
                                    <a href="{{ route('category.show', ['id' => $categoryShare->id, 'slug' => $categoryShare->slug]) }}" class="dropdown-item">{{ $categoryShare->name }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="nav-item dropdown">
                        <span class="nav-link dropdown-toggle" data-toggle="dropdown">{{ __('Lang.Langs') }}</span>
                        <div class="dropdown-menu rounded-0 m-0">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        {{ $properties['native'] }}
                                    </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- search box --}}
                <form action="{{ route('search.show') }}" method="post">
                    @csrf
                    <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                        <input type="text" class="form-control" placeholder="{{ __('lang.Keyword') }}" name="searchKeyword">
                        <div class="input-group-append">
                            <button class="input-group-text text-secondary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                {{-- search box --}}

            </div>
        </nav>
    </div>
    <!-- Navbar End -->
