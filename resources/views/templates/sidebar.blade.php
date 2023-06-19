
                <div class="col-lg-4 pt-3 pt-lg-0">
                    <!-- Social Follow Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">{{ __('Lang.Follow us') }}</h3>
                        </div>
                        @foreach ( $SHARING_MEDIA_ACCOUNTS_DATA as $mediaAccountShare)
                        {{-- / {{ $mediaAccountShare->link }} --}}
                            <div class="d-flex mb-3">
                            @if($mediaAccountShare->account = 'facebook')
                            <a href="{{ $mediaAccountShare->link }}" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #39569E;">
                                    <small class="fa fa-facebook-f mr-2"></small><small>{{ $mediaAccountShare->followers }} {{ __('lang.Followers') }}</small>
                            </a>
                            @endif
                            @if($mediaAccountShare->account = 'twitter')
                            <a href="{{ $mediaAccountShare->link }}" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #52AAF4;">
                                    <small class="fa fa-twitter mr-2"></small><small>{{ $mediaAccountShare->followers }} {{ __('lang.Followers') }}</small>
                            </a>
                            @endif
                            </div>

                            <div class="d-flex mb-3">
                            @if($mediaAccountShare->account = 'linkedin')
                            <a href="{{ $mediaAccountShare->link }}" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #0185AE;">
                                    <small class="fa fa-linkedin mr-2"></small><small>{{ $mediaAccountShare->followers }} {{ __('lang.Connects') }}</small>
                            </a>
                            @endif
                            @if($mediaAccountShare->account = 'instagram')
                            <a href="{{ $mediaAccountShare->link }}" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #C8359D;">
                                    <small class="fa fa-instagram mr-2"></small><small>{{ $mediaAccountShare->followers }} {{ __('lang.Followers') }}</small>
                            </a>
                            @endif
                            </div>
                            <div class="d-flex mb-3">
                            @if($mediaAccountShare->account = 'youtube')
                            <a href="{{ $mediaAccountShare->link }}" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #DC472E;">
                                    <small class="fa fa-youtube mr-2"></small><small>{{ $mediaAccountShare->followers }} {{ __('lang.Subscribers') }}</small>
                            </a>
                            @endif
                            @if($mediaAccountShare->account = 'github')
                            <a href="{{ $mediaAccountShare->link }}" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #1AB7EA;">
                                    <small class="fa fa-github mr-2"></small><small>{{ $mediaAccountShare->followers }} {{ __('lang.Followers') }}</small>
                            </a>
                            @endif
                            </div>

                            @if ($loop->iteration >= 1)
                                @break
                            @endif
                        @endforeach
                    </div>

                    <!-- Social Follow End -->

                    <!-- Newsletter Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">Arrogantm</h3>
                        </div>
                        <div class="bg-light text-center p-4 mb-3">
                            @if(!Auth::check())

                                <p>{{ __('lang.add Comment or add news') }}</p>
                                <a href="{{ route('login') }}" class="btn btn-danger" width="50%">{{ __('Lang.Login') }}</a>
                                <a href="{{ route('register') }}" class="btn btn-danger" width="50%">{{ __('Lang.Sign Up') }}</a>

                                @else

                                <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" class="float-left"/>
                                <form class="mt-2 mb-3" method="POST" action="{{ route('logout') }}">
                                @csrf
                                    <button class="btn btn-danger">{{ __('Lang.Logout') }}</button>
                                </form>

                                {{-- profile information --}}
                                @include('templates.user-profile')
                                {{-- profile information --}}
                            @endif

                        </div>
                    </div>
                    <!-- Newsletter End -->

                    <!-- Ads Start -->
                    <div class="mb-3 pb-3">
                        <a href=""><img class="img-fluid" src="{{ url('img/news-500x280-4.jpg') }}" alt=""></a>
                    </div>
                    <!-- Ads End -->

                    <!-- trendding News Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">{{ __('Lang.Trendding') }}</h3>
                        </div>
                        @foreach ($SHARAING_POSTS_DATA as $postShare)
                                <div class="d-flex mb-3">
                                    <img src="{{ url('img/'. $postShare->img) }}" style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                        <div class="mb-1" style="font-size: 13px;">
                                            <a href="{{ route('category.show' , ['id' => $postShare->category->id,
                                            'slug' => $postShare->category['slug_' . LaravelLocalization::getCurrentLocale()]]) }}">
                                                {{ $postShare->category['name_' . LaravelLocalization::getCurrentLocale()] }}
                                            </a>
                                            <span class="px-1">/</span>
                                            <span>{{ $postShare->created_at }}</span>
                                        </div>
                                        <a class="h6 m-0" href="{{ route('single.show',
                                        ['id' => $postShare->id, 'slug' => $postShare->slug]) }}">{{ $postShare->title }}</a>
                                    </div>
                                </div>
                            @if ($loop->iteration >= 5)
                                @break
                            @endif
                        @endforeach
                    </div>
                    <!-- trendding News End -->

                    <!-- Tags Start -->
                    <div class="pb-3">
                        <div class="bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">{{ __('Lang.TAGS') }}</h3>
                        </div>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach ($SHARAING_TAGS_DATA as $tagShare)
                                <a href="{{ route('tag.show', ['id' => $tagShare->id, 'slug' => $tagShare->slug]) }}"
                                    class="btn btn-sm btn-outline-secondary m-1">{{ $tagShare->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    <!-- Tags End -->
                </div>
