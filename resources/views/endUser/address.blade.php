@extends('endUser.layouts.app')

@section('title')
    Vegist - Multipurpose eCommerce HTML Template
@endsection

@section('content')
    <!-- breadcrumb start -->
    <section class="about-breadcrumb">
        <div class="about-back section-tb-padding" style="background-image: url(image/about-image.jpg)">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="about-l">
                            <ul class="about-link">
                                <li class="go-home"><a href="{{route('home')}}">Home</a></li>
                                <li class="about-p"><span>Addresses</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb end -->
    <!-- faq's collapse start -->
    <section class="address-area section-tb-padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="address-title">
                        <h1>Your addresses</h1>
                    </div>
                    <div class="account-link">
                        <a href="">Return to account details</a>
                    </div>
                    <div class="add-area">
                        <a class="address-link">
                            <i class="icon-plus"></i>
                            <span class="sp-link-title">Add a new address</span>
                        </a>
                        <div class="add-title">
                            <h4>Add a new address</h4>
                        </div>
                        @include('partials._errors')
                        @include('partials._session')
                        <form action="{{route('user.address.store')}}" method="post">
                            @csrf
                            <div class="address-content">
                                <ul class="address-input">
                                    <li class="type-add">
                                        <label>City</label>
                                        <input type="text" name="city" placeholder="city" value="{{old('city')}}">
                                        @error('city')
                                        <span class="invalid-feedback text-danger" role="alert">
                                          <p>{{ $message }}</p>
                                        </span>
                                        @enderror
                                    </li>
                                    <li class="type-add">
                                        <label>Address Details</label>
                                        <input name="details" value="{{old('details')}}" placeholder="No.street, floor">
                                    </li>

                                </ul>
                                <label class="check"><input type="checkbox" name="is_default"> Set as default address</label>
                                <div class="add-link">
                                    <button type="submit" class="btn btn-style1">Add address</button>
                                    <a href="" class="btn btn-style1">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq's collapse end -->
@endsection
