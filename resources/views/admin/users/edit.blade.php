@extends('admin.layouts.main')

@section('content')
    <div class="container col-md-offset-4">
        <div class="block-content">
            <nav class="breadcrumb push">
                <a class="breadcrumb-item" href="{{ route('admin') }}">Dashboard</a>
                <a class="breadcrumb-item" href="{{ route('users') }}">Users</a>
                <span class="breadcrumb-item active">Edit User</span>
            </nav>
        </div>


        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">Edit User</h3>
            </div>
            <div class="block-content block-content-full">
                <form method="post" name="editForm" action={{ url('/admin/user/edit', ['id'=>$user->id]) }}>
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{$user->name}}" class="form-control" id="name" placeholder="Enter Name">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="text" id="email" value="{{$user->email}}" name="email" class="form-control" placeholder="Enter Email">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="select">Role</label>
                        <select class="form-control" name="role" id="role">
                            <option value="">Select Role</option>
                            @foreach ($userType as $Type)
                                <option value="{{$Type->id}}" {{ $Type->id == $user->userType->id ? 'selected' : '' }}  >{{ $Type->name }}</option>
                            @endforeach

                        </select>
                    </div>



                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <input name="id" type="hidden" />



                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </form>

            @include('admin.includes.form_error')
                <!-- DataTables functionality is initialized with .js-dataTable-full-pagination class in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->


            </div>

        </div>




    </div>

    @endsection