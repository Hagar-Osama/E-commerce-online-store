@extends('admin.layouts.master')

@section('title')
    Colors | Dashboard
@endsection
@section('css')
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assetsAdmin/plugins/table/datatable/dt-global_style.css')}}">
    <!-- END PAGE LEVEL STYLES -->
@endsection

@section('content')
<!-- row opened -->
<div id="content" class="main-content">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">Show All Colors</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include('partials._session')
                        <table class="table key-buttons text-md-nowrap table-bordered">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">Preview</th>
                                <th class="border-bottom-0">Color Name</th>
                                <th class="border-bottom-0">Hex Code</th>
                                <th class="border-bottom-0">action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($colors as $color)
                                <tr>
                                    <td style="width:10px; background-color:#{{$color->code}}"></td>
                                    <td>{{$color->name}}</td>
                                    <td>#{{$color->code}}</td>
                                    <td>
                                        <div class="d-flex my-xl-auto right-content">
                                            <form method="post" action="{{route('colors.delete', [$color->id])}}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="pr-1 mb-3 mb-xl-0">
                                                    <button class="btn btn-danger btn-icon mr-2" type="submit"><i class="fas fa-trash-alt"></i>Delete</button>
                                                </div>
                                            </form>
                                            <div class="pr-1 mb-3 mb-xl-0">
                                                <a type="button" href="{{route('colors.updatePage', [$color->id])}}" class="btn btn-warning  btn-icon mr-2" data-placement="top" data-toggle="tooltip" title="Edit"><i class="fas fa-user-edit"></i>Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
@endsection

