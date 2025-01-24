@extends('layouts.master')

@section('title', 'Форма сброса пароля')

@section('content')
    <style>
        main {
            width: 50%;
        }
    </style>

    <section class="vh-90 mt-5">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Форма сброса пароля</p>
                                    <form method="post" action="{{route('password.update')}}" class="mx-1 mx-md-4">
                                        @csrf
                                        <input type="hidden" name="token" value="{{$token}}">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input name="email" type="email" id="form3Example3c" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}"/>
                                                <label class="form-label" for="form3Example3c">Ваш Email</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input name="password" type="password" id="form3Example4c" class="form-control @error('password') is-invalid @enderror"/>
                                                <label class="form-label" for="form3Example4c">Пароль</label>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input name="password_confirmation" type="password" id="form3Example4cd" class="form-control"/>
                                                <label class="form-label" for="form3Example4cd">Повторите пароль</label>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Сбросить</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection