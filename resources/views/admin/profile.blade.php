@include('templates.adminHeader')
@include('templates.adminNavigation')
<div class="container">
    <div class="row">
            <div class="col-md-6">
                {{-- verfiy your email and update information --}}
                    <section class="mt-5">
                        <header>
                            <h2 class="text-lg font-medium mt-5">
                                {{ __('lang.Profile Information') }}
                            </h2>
                            <p class="mt-1 text-sm">
                                {{ __("lang.Update your account's profile information and email address.") }}
                            </p>
                        </header>
                        {{-- udpate profile --}}
                        <form class="mt-5" method="post" action="{{ route('admin.profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <input id="name" name="name" type="text" class="mt-1 block w-full form-control" value="{{ old('name', Auth::guard('admin')->user()->name) }}"
                                autofocus autocomplete="name" />
                                @error('name')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="email" name="email" type="email" class="mt-1 block w-full form-control" value="{{ old('email', Auth::guard('admin')->user()->email) }}"
                                autocomplete="username" />
                                @error('email')
                                    <span style="color:red;">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="flex items-center gap-4 form-group">
                                <button type="submit" class="btn btn-success" style="background: green;">{{ __('lang.update') }}</button>
                                @if (session('status') === 'profile-updated')
                                    <p>{{ __('lang.Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
            </div>


            <div class="col md-6">
            {{-- update password --}}
                <section class="mt-5">
                    <header class="mt-5">
                        <h2 class="text-lg font-medium">
                            {{ __('lang.Update Password') }}
                        </h2>
                        <p class="mt-1 text-sm">
                            {{ __('lang.Ensure your account is using a long, random password to stay secure.') }}
                        </p>
                    </header>
                    <form method="post" action="{{ route('admin.password.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="current_password">{{ __('lang.current password') }}</label>
                            <input id="current_password" name="current_password"
                            type="text" class="mt-1 block w-full form-control" autocomplete="current-password" />
                            @error('current_password', 'updatePassword')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('lang.new password') }}</label>
                            <input id="password" name="password" type="password"
                            class="mt-1 block w-full form-control" autocomplete="new-password" />
                            {{-- error bag validation as secend parmeters --}}
                            @error('password', 'updatePassword')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password confirmation">{{ __('lang.Password Confrimation') }}</label>
                            <input id="password_confirmation" name="password_confirmation"
                            type="password" class="mt-1 block w-full form-control" autocomplete="new-password" />
                            @error('password_confirmation', 'updatePassword')
                                <span style="color:red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center gap-4 form-group" >
                            <button type="submit" class="btn btn-success form-control" style="background: green;">{{ __('lang.update') }}</button>
                            @if (session('status') === 'password-updated')
                                <p>{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>
                </section>
            </div>

    </div>


        {{-- delete account --}}
            <section class="space-y-6 mt-5">
                <header>
                    <h2 class="text-lg font-medium">
                        {{ __('lang.Delete Account') }}
                    </h2>

                    <p class="mt-1 text-sm">
                        {{ __('lang.Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                    </p>
                </header>

                <button class="btn btn-danger btn-delete" id="btn-delete"
                    x-data=""
                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                >{{ __('lang.Delete Account') }}
                </button>

                <div class='deleteAccount mt-5' id="deleteAccount" name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                    <form method="post" action="{{ route('admin.profile.destroy') }}" class="p-6">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg font-medium">
                            {{ __('lang.Are you sure you want to delete your account') }}
                        </h2>

                        <p class="mt-1 text-sm">
                            {{ __('lang.Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                        </p>

                        <div class="form-group">
                            <label for="password" class="sr-only"></label>
                            <input
                                id="password"
                                name="password"
                                type="password"
                                class="mt-1 block w-3/4 form-control"
                                placeholder="{{ __('lang.Password') }}"
                            />
                            {{-- <input :messages="$errors->userDeletion->get('password')" class="mt-2" /> --}}
                            @error('password', 'userDeletion')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button id="cancelDelete" class="btn btn-primary">
                                {{ __('lang.Cancel') }}
                            </button>

                            <button class="btn btn-danger ml-3">
                                {{ __('lang.Delete Account') }}
                            </button>
                        </div>
                    </form>
                </div>
            </section>
</div>


@include('templates.adminFooter')
