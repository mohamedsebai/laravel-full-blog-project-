@extends('templates.master')
@section('title', 'Home')
@section('content')
<body>

    {{-- navigation --}}
        @include('templates.navigation')
    {{-- navigation --}}


    <!-- Top News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
                @foreach ($postData as $data)
                    <div class="d-flex">
                        <img src="{{ url('img/' . $data->img) }}" style="width: 80px; height: 80px; object-fit: cover;">
                        <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                            <a class="text-secondary font-weight-semi-bold" href="{{ route('single.show', ['id' => $data->id, 'slug' => $data->slug ]) }}">{{ $data->title }}</a>
                        </div>
                    </div>
                    @if ($loop->iteration >= 10)
                        @break
                    @endif
                @endforeach

            </div>
        </div>
    </div>
    <!-- Top News Slider End -->


    <!-- Main News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">
                        @foreach ($postData as $data)
                            <div class="position-relative overflow-hidden" style="height: 435px;">
                            <img class="img-fluid h-100" src="{{ url('img/' . $data->img) }}" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-1">
                                    <a class="text-white" href="">{{ $data->user->name }}</a>
                                    <span class="px-2 text-white">/</span>
                                    <span class="text-white">{{ $data->created_at }}</span>
                                </div>
                                <a class="h2 m-0 text-white font-weight-bold" href="{{ route('single.show', ['id' => $data->id, 'slug' => $data->slug]) }}">
                                    {{ $data->title }}
                                    @if ($loop->iteration >= 3)
                                        {{ 'slider number : 3' }}
                                    @endif
                                </a>
                            </div>
                            </div>
                            {{-- stop the loop --}}
                            @if ($loop->iteration >= 3)
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                @foreach ($categoryData as $data)
                    <div class="position-relative overflow-hidden mb-2" style="height: 80px;">
                        <img class="img-fluid w-100 h-100" src="{{ url('img/'. $data->img) }}" style="object-fit: cover;">

                        <a href="{{ route('category.show', ['id' => $data->id, 'slug' => $data->slug]) }}" class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                            {{ $data->name }}
                        </a>
                    </div>
                    @if ($loop->iteration >= 5)
                        @break
                    @endif
                @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Featured Category News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">{{ __('Lang.Featured') }}</h3>
            </div>
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">
                @foreach ( $postData  as $data )
                    @if ($data->classified == 'featured')
                        <div class="position-relative overflow-hidden" style="height: 300px;">
                            <img class="img-fluid w-100 h-100" src="{{ url('img/news-300x300-4.jpg') }}" style="object-fit: cover;">
                            <div class="overlay">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a class="text-white" href="">{{ $data->user->name }}</a>
                                    <span class="px-1 text-white">/</span>
                                    <span class="text-white">{{ $data->created_at }}</span>
                                </div>
                                <a class="h4 m-0 text-white" href="{{ route('single.show', ['id' => $data->id, 'slug' => $data->slug]) }}">
                                    {{ substr($data->title, 0 , 20)  }}
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Featured Category News Slider End -->


    <!-- Category News Slider Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                @foreach ($categoryData as $data)
                    @if(count($data->posts) > 0)
                    <div class="col-lg-6 py-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">{{ $data->name }}</h3>
                        </div>
                        <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                            @foreach ( $data->posts  as $post )
                                    <div class="position-relative">
                                        <img class="img-fluid w-100" src="{{ url('img/' . $post->img) }}" style="object-fit: cover;">
                                        <div class="overlay position-relative bg-light">
                                            <div class="mb-2" style="font-size: 13px;">
                                                <a href=""><a href="">{{ $post->user->name }}</a></a>
                                                <span class="px-1">/</span>
                                                <span>{{ $post->created_at }}</span>
                                            </div>

                                            <a class="h4 m-0" href="{{ route('single.show', ['id' => $post->id,
                                            'slug' => $post['slug_' . LaravelLocalization::getCurrentLocale()]]) }}">
                                            {{ substr($post['title_' . LaravelLocalization::getCurrentLocale()], 0 , 20)  }}
                                            </a>

                                        </div>
                                    </div>
                                {{-- limit 2 post form each category --}}
                                @if ($loop->iteration >= 4)
                                    @break
                                @endif
                            @endforeach
                        </div>
                        {{-- limit of category --}}
                        @if ($loop->iteration >= 4)
                            @break
                        @endif
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-- Category News Slider End -->




    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">

                <div class="col-lg-8">
                    <!-- popular -->
                    <div class="row mb-3">

                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">{{ __('Lang.Popular') }}</h3>
                            </div>
                        </div>
                        @foreach ($postData as $data)
                            @if ($data->classified == 'popular')
                                <div class="col-lg-6">
                                    <div class="d-flex mb-3">
                                        <img src="{{ url('img/' . $data->img) }}" style="width: 100px; height: 100px; object-fit: cover;">
                                        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                            <div class="mb-1" style="font-size: 13px;">
                                                <a href="">{{ $data->user->name }}</a>
                                                <span class="px-1">/</span>
                                                <span>{{ $data->created_at }}</span>
                                            </div>
                                            <a class="h4 m-0" href="{{ route('single.show', ['id' => $data->id, 'slug' => $data->slug ]) }}">
                                            {{ substr($data->title, 0 , 40)  }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if ($loop->iteration >= 12)
                            @break
                            @endif
                        @endforeach
                    </div>

                    {{-- ads html --}}
                    <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid w-100" src="{{ url('img/ads-700x70.jpg') }}" alt=""></a>
                    </div>
                    {{-- ads end html --}}
                    <!-- popular -->

                    <!-- latest -->
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">{{ __('Lang.Latest') }}</h3>
                                <a class="text-secondary font-weight-medium text-decoration-none" href="">{{ __('Lang.View all') }}</a>
                            </div>
                        </div>

                        @foreach ($postData as $data)
                            <div class="col-lg-6">
                                <div class="d-flex mb-3">
                                    <img src="{{ url('img/' . $data->img) }}" style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="">{{ $data->user->name }}</a>
                                            <span class="px-1">/</span>
                                            <span>{{ $data->created_at }}</span>
                                        </div>
                                        <a class="h4 m-0" href="{{ route('single.show', ['id' => $data->id, 'slug' => $data->slug ]) }}">
                                            {{ substr($data->title, 0 , 20)  }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            @if ($loop->iteration >= 14)
                            @break
                            @endif
                        @endforeach


                    </div>
                    <!-- latest -->
                </div>

                <!-- sidebar -->
                    @include('templates.sidebar')
                <!-- sidebar -->
            </div>
        </div>
    </div>
    <!-- News With Sidebar End -->


@endsection
