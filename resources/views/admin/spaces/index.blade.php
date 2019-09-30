@section('extracss')
    <link rel="stylesheet" href="{{asset('js/plugins/datatables/dataTables.bootstrap4.css')}}" />
@endsection


@extends('admin.layouts.main')
@section('content')



    <div class="container">
        <div class="block-content">
            <nav class="breadcrumb push">
                <a class="breadcrumb-item" href="{{ route('admin')}}">Dashboard</a>
                <span class="breadcrumb-item active">Spaces</span>
            </nav>
        </div>



        {{----------------------------------------------------------------------------------------------------}}
        {{---------------------                Table of Spaces                          ----------------------}}
        {{----------------------------------------------------------------------------------------------------}}

        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Users Data</h3>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                    <thead>
                    <tr>
                        <th class="text-center"></th>
                        <th>Title</th>
                        <th class="d-none d-sm-table-cell">Description</th>
                        <th class="d-none d-sm-table-cell">Full Address</th>
                        <th class="d-none d-sm-table-cell text-center">Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($spaces as $space)
                        <tr>
                            <td class="text-center"></td>
                            <td class="font-w600">{{$space->title}}</td>
                            <td class="d-none d-sm-table-cell">{{$space->description}}</td>
                            <td class="d-none d-sm-table-cell">{{$space->full_address}}</td>
                            <td class="text-center">


                                <button type="button" class="btn btn-sm btn-circle btn-alt-info bg-earth-light" data-toggle="modal" data-target="#editUserModal" title="Edit User" >
                                    <i class="fa fa-edit"></i>
                                </button>
                                <form id="deleteForm" action="{{ url('/admin/space/delete',['id' =>$space->id]) }}" method="post" style="display: inline-block">
                                    <input type="hidden" value="delete" name="_method">
                                    <button type="submit" class="btn btn-sm btn-circle btn-alt-danger" data-toggle="tooltip" title="Delete User">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    {{ csrf_field() }}
                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{----------------------------------------------------------------------------------------------------}}
        {{---------------------             End Table of Spaces                         ----------------------}}
        {{----------------------------------------------------------------------------------------------------}}











    </div>

@endsection

@section('extrajs')


    <script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('js/pages/be_tables_datatables.min.js')}}"></script>
    <script src="{{asset('js/plugins/slick/slick.min.js')}}"></script>

    <!-- Page JS Helpers (Slick Slider plugin) -->
    <script> jQuery(function(){ Codebase.helpers('slick'); }); </script>

    <script src="{{asset('js/plugins/jquery-raty/jquery.raty.js')}}"></script>

    <!-- Page JS Code -->
    <script src="{{asset('js/pages/be_comp_rating.min.js')}}"></script>
@endsection