@extends('templates.master')
{{-- @section('title', 'Single') --}}
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
                <span class="breadcrumb-item">{{ __('Lang.CATEGORIES') }}</span>/

                <a href="{{ route('category.show' , ['id' => $postData->category->id,
                'slug' => $postData->category['slug_' . LaravelLocalization::getCurrentLocale()]]) }}">
                    {{ $postData->category['name_' . LaravelLocalization::getCurrentLocale()] }}
                </a>
                /<span class="breadcrumb-item active">   {{ substr($postData->title, 0, 100) . '..  ' }} </span>
            </nav>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- News With Sidebar Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="{{ url('img/'. $postData->img) }}" style="object-fit: cover;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-3">
                                <a href="{{ route('category.show' , ['id' => $postData->category->id,
                                    'slug' => $postData->category['slug_' . LaravelLocalization::getCurrentLocale()]]) }}">
                                        {{ $postData->category['name_' . LaravelLocalization::getCurrentLocale()] }}
                                </a>
                                <span class="px-1">/</span>
                                <span>{{ $postData->created_at }}</span>
                            </div>
                            <div>
                                <h3 class="mb-3">{{ $postData->title }}</h3>
                                <p style="word-break: break-word;">{{ $postData->content }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- News Detail End -->


                    {{-- show comments if there is user authitcate --}}
                    @if(Auth::check())
                        <!-- Comment List Start -->
                        <div class="bg-light mb-3" style="padding: 30px;">
                            <h3 class="mb-4">{{ count($postData->comments) }} {{ __('lang.Comments') }}</h3>
                            @if ( session()->has('commentMessage') )
                                {{ session()->get('commentMessage') }}
                            @endif
                            @foreach ($postData->comments as $parentComment)
                                @if ($parentComment->parent == 0)
                                    <div class="media">
                                            <img src="{{ url('img/user.jpg') }}" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                                            <div class="media-body">
                                            <h6>
                                                <a href="">
                                                    {{ $parentComment->user->name }}
                                                </a>
                                                <small><i>{{ $parentComment->created_at }}</i></small>
                                            </h6>
                                                <p>{{ $parentComment->content }}</p>

                                                {{-- delete comment  --}}
                                                <form action="{{ route('single.destroy', $parentComment->id) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-primary py-0 px-1 mt-1 mb-2">{{ __('lang.delete') }}</button>
                                                </form>
                                                {{-- update comment  --}}
                                                <form action="{{ route('single.update', $parentComment->id) }}" method="POST" class="edit-form" id="edit-form">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="text" name="comment_content" class="form-control" value="{{ $parentComment->content }}">
                                                    <button class="btn btn-primary py-1 px-1 mt-1">{{ __('lang.update') }}</button>
                                                </form>


                                                <button class="btn btn-sm btn-outline-secondary btn-reply" id="btn-reply">{{ __('lang.Replies') }}</button>
                                                <div class="mt-4 child-comment" id="child-comment">
                                                @foreach($postData->comments as $childComment)
                                                    @if($childComment->parent == $parentComment->id)


                                                        <div class="media-body">
                                                            <img src="{{ url('img/user.jpg') }}" alt="Image" class="img-fluid mr-3 mt-1"
                                                            style="width: 45px;">
                                                                <h6><a href="">{{ $childComment->user->name }}</a> <small><i>{{ $childComment->created_at }}</i></small></h6>
                                                                <p>{{ $childComment->content }}</p>
                                                            {{-- delete comment Child--}}
                                                            <form action="{{ route('single.destroy', $childComment->id) }}" method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-primary py-0 px-1 mt-1 mb-2">{{ __('lang.delete') }}</button>
                                                            </form>
                                                            {{-- update comment  Child--}}
                                                            <form action="{{ route('single.update', $childComment->id) }}" method="POST" class="edit-form" id="edit-form">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="text" name="comment_content" class="form-control" value="{{ $childComment->content }}">
                                                                <button class="btn btn-primary py-1 px-1 mt-1">{{ __('lang.update') }}</button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                </div>
                                                    <div class="child-reply">
                                                        @error('comment_content')
                                                            <div class="alert alert-danger px-1 py-1">{{ $message }}</div>
                                                        @enderror
                                                        {{-- add comment  Child reply to parent--}}
                                                        <form action="{{ route('single.store') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                            <input type="hidden" name="post_id" value="{{ $postData->id }}">
                                                            <input type="hidden" name="parent_id" value="{{ $parentComment->id }}">
                                                            <input type="text" name="comment_content" class="form-control" required>
                                                            <button class="btn btn-primary py-1 px-1 mt-1"> {{ __('lang.send reply') }} </button>
                                                        </form>
                                                        <hr>
                                                    </div>
                                            </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <!-- Comment List End -->
                        <!-- Comment Form Start -->
                        <div class="bg-light mb-3" style="padding: 30px;">
                            <h3 class="mb-4">{{ __('lang.Leave a comment') }}</h3>
                            {{-- add parent comment --}}
                            <form action="{{ route('single.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="post_id" value="{{ $postData->id }}">
                                <input type="hidden" name="parent_id" value="0">
                                <input type="text" name="comment_content" class="form-control" required>
                                <button class="btn btn-primary py-1 px-1 mt-1">{{ __('lang.Leave a comment') }}</button>
                            </form>
                        </div>
                        <!-- Comment Form End -->

                    @else
                        <div>{{ __('Lang.add Comment or add news') }}</div>
                        <a class="btn btn-danger" href="{{ route('login') }}">{{ __('Lang.Login') }}</a>
                        <a class="btn btn-danger" href="{{ route('register') }}">{{ __('Lang.Sign Up') }}</a>
                    @endif

                </div>

                {{-- sidebar --}}
                    @include('templates.sidebar')
                {{-- sidebar --}}
            </div>
        </div>
    </div>
    </div>
    <!-- News With Sidebar End -->


@endsection
