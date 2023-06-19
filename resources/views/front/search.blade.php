@extends('templates.master')
@section('title', 'Search')
@section('content')
<body>

    {{-- navigation --}}
        @include('templates.navigation')
    {{-- navigation --}}

    <!-- Breadcrumb Start -->
    {{-- <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="{{ route('home.page') }}">{{ __('Lang.Home') }}</a>
                <span class="breadcrumb-item active">{{ $categoryData->name }}</span>
            </nav>
        </div>
    </div> --}}
    <!-- Breadcrumb End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                {{-- News without sidebar --}}
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                                <h3 class="m-0">{{ $searchKeyword }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href=""><img class="img-fluid w-100" src="{{ url('img/ads-700x70.jpg') }}" alt=""></a>
                    </div>
                    <div class="row">
                        {{-- this is return from number 10 to all posts  --}}
                        @foreach ($searchPostsData as $post)
                            <div class="col-lg-6">
                                <div class="d-flex mb-3">
                                    <img src="{{ url('img/' . $post->img) }}" style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="{{ route('category.show' , ['id' => $post->category->id,
                                                    'slug' => $post->category['slug_' . LaravelLocalization::getCurrentLocale()]]) }}">
                                                        {{ $post->category['name_' . LaravelLocalization::getCurrentLocale()] }}
                                                </a>
                                            <span class="px-1">/</span>
                                            <span>{{ $post->created_at }}</span>
                                        </div>
                                        <a href="{{ route('single.show' , ['id' => $post->id, 'slug' => $post->slug ]) }}">
                                            {{ $post->title }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>


                    <div class="row">
                        <div class="col-12">
                        @if ($searchPostsData->hasPages())
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center">
                                <li class="page-item {{ $searchPostsData->currentPage() == 1 ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $searchPostsData->previousPageUrl() }}" aria-label="Previous">
                                    <span class="fa fa-angle-double-left" aria-hidden="true"></span>

                                    <span class="sr-only">{{ __('lang.Previous') }}</span>
                                    </a>
                                </li>
                                @foreach ( $searchPostsData->getUrlRange(1, $searchPostsData->lastPage()) as $pageLink)
                                @php
                                    // fuck you php iam mohamed seabeai
                                    $pageString = strstr($pageLink, 'page=' , false);
                                    $rev = strrev($pageString);
                                    $pageNum = strstr($rev, '=' , true);
                                    $pageNum = strrev($pageNum);
                                @endphp
                                    <li class="page-item {{ substr($pageLink, -1) == $searchPostsData->currentPage() ? 'active': '' }}">
                                        <a class="page-link" href="{{ $pageLink }}">{{ $pageNum }}
                                        </a>
                                    </li>
                                @endforeach
                                <li class="page-item {{  $searchPostsData->currentPage() == $searchPostsData->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $searchPostsData->nextPageUrl() }}" aria-label="Next">
                                    <span class="fa fa-angle-double-right" aria-hidden="true"></span>

                                    <span class="sr-only">{{ __('lang.Next') }} </span>
                                </a>
                                </li>
                                </ul>
                            </nav>
                        @endif
                        </div>
                    </div>


                </div>


                {{-- News without sidebar --}}
                {{-- sidebar --}}
                    @include('templates.sidebar')
                {{-- sidebar --}}
            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->

@endsection
