@extends('admin.layouts.master')

@section('title')
    Colors | Dashboard
@endsection
@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">

            <div class="container">


                <div class="row layout-top-spacing">

                    <div id="basic" class="col-lg-12 layout-spacing">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Create New Color</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">

                                <div class="row">
                                    <div class="col-lg-6 col-12 mx-auto">
                                        @if($errors->any())
                                            @foreach($errors->all() as $error)
                                                {{$error}}
                                            @endforeach
                                        @endif
                                        <form method="post" action="{{route('colors.create.store')}}">
                                            @csrf
                                            @include('admin.colors._forms')
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
@endsection
