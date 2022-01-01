@extends('endUser.layouts.app')

@section('title')
    Vegist - Multipurpose eCommerce HTML Template
@endsection
        <!-- mobile menu end -->
@section('content')

    <!-- breadcrumb start -->
    <section class="about-breadcrumb">
        <div class="about-back section-tb-padding" style="background-image: url(image/about-image.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="about-l">
                            <ul class="about-link">
                                <li class="go-home"><a href="index1.html">Home</a></li>
                                <li class="about-p"><span>Register</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- login start -->
    <section class="section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="register-area">
                        <div class="register-box">
                            <h1>Create account</h1>
                            <p>Please register below account detail</p>
                            <form method="POST" action="{{route('user.register')}}">
                                @csrf
                                <input type="text" name="name" placeholder="name">
                                @error('name')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <input type="text" name="email" placeholder="Email">
                                @error('email')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <input type="password" name="password" placeholder="Password">
                                @error('password')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror
                                <input type="tel" name="phone" placeholder="Phone">
                                @error('phone')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                                @enderror

                                <button type="submit" class="btn-style1">Create</button>
                            </form>
                        </div>
                        <div class="register-account">
                            <h4>Already an account holder?</h4>
                            <a href="{{route('user.loginPage',['en'])}}" class="ceate-a">Log in</a>
                            <div class="register-info">
                                <a href="terms-conditions.html" class="terms-link"><span>*</span> Terms & conditions.</a>
                                <p>Your privacy and security are important to us. For more information on how we use your data read our <a href="privacy-policy.html">privacy policy</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  @endsection
