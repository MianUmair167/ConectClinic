@extends('admin.layouts.main')

@section('content')
<div class="container col-md-offset-4">

    <div class="block-content">
        <nav class="breadcrumb push">
            <a class="breadcrumb-item" href="{{ route('admin') }}">Dashboard</a>
            <a class="breadcrumb-item" href="{{ route('userTypes') }}">UserTypes</a>
            <span class="breadcrumb-item active">Edit UserType</span>
        </nav>
    </div>

    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Users Data</h3>
        </div>
        <div class="block-content block-content-full">
            <form method="post" name="editForm" action={{ url('/admin/userType/edit', ['id'=>$type->id]) }}>
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$type->name}}" class="form-control" id="name" placeholder="Enter Name">
                </div>



                <input name="_token" type="hidden" value="{{ csrf_token() }}"/>



                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </form>


            @include('admin.includes.form_error')


        </div>
    </div>


</div>

    @endsection