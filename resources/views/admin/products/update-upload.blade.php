@extends('admin.layouts.master')

@section('title')
    Products | UpdateUpload
@endsection

@section('css')
    <link href="{{asset('assetsAdmin/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/select2/select2.min.css')}}">
    <link href="{{asset('assetsAdmin/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="container">
            <div class="container my-5 mx-auto">
                @include('partials.session')
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        {{$error}}
                    @endforeach
                @endif
                <div class="my-3">
                    <form method="post" action="{{route('products.scanImages')}}">
                        @csrf
                        <button class="btn btn-primary" type="submit">Scan images</button>
                    </form>
                </div>

                <form method="post" action="{{route('products.updateUploadProducts')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input id="t-text" type="file" name="file" class="form-control" required>
                    </div>


                    <input type="submit" value="Update" class="btn btn-primary ml-3 mt-3">
                </form>
            </div>
        </div>
    </div>

    <!-- End Card -->
@endsection
@section('js')
    <script src="{{asset('assetsAdmin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script>
        var firstUpload = new FileUploadWithPreview('myFirstImage');
    </script>
@endsection
