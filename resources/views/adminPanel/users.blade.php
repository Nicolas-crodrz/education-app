@extends('layouts.partials.head')


<section class="text-center text-lg-start">
    <!-- Jumbotron -->
    <div class="container py-4">
        <div class="row g-0 align-items-center justify-content-center">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="card cascading-right"
                    style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                    <div class="card-body pt-2 shadow-5 text-center">
                        <h2 class="fw-bold mb-5"> {{ __('Sign up now') }}</h2>
                        <form method="POST" action="{{ route('users') }}">
                            @csrf
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">

                                        <input type="text" id="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus />

                                        <label class="form-label" for="name">{{ __('First name') }}</label>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">

                                        <input type="text" id="lastname"
                                            class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                            value="{{ old('lastname') }}" required autocomplete="lastname" autofocus />

                                        <label class="form-label" for="lastname">{{ __('Last name') }}</label>
                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" />
                                <label class="form-label" for="email">{{ __('Email address') }}</label>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- ROLE --}}
                            <div class="form-outline mb-4">
                                <select class="form-select" id="role" name="role"
                                    aria-label="Default select example">
                                    <option selected>{{ __('Open this select menu') }}</option>
                                    <option value="1">{{ __('student') }}</option>
                                    <option value="2">{{ __('teacher') }}</option>
                                    <option value="3">{{ __('admin') }}</option>
                                </select>
                                <label class="form-label" for="role">{{ __('Role') }}</label>
                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" />
                                    <label class="form-label" for="password">{{ __('Password') }}</label>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Password Confirm input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password-confirm" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password" />
                                    <label class="form-label" for="password-confirm">{{ __('New Password') }}</label>
                                </div>

                                <!-- Checkbox -->
                                <div class="form-check d-flex justify-content-center mb-4">
                                    <input class="form-check-input me-2" type="checkbox" value=""
                                        id="form2Example33" checked />
                                    <label class="form-check-label" for="form2Example33">
                                        {{ __('Subscribe to our newsletter') }}
                                    </label>
                                </div>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4">
                                    {{ __('Sign up') }}
                                </button>
                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>{{ __('or sign up with:') }}</p>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="bi bi-facebook"></i>
                                    </button>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="bi bi-google"></i>
                                    </button>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="bi bi-twitter"></i>
                                    </button>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="bi bi-github"></i>
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
