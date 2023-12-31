@extends('layouts.main')

@section('title', 'MyBlog | Add new user')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <h1>
                Users
                <small>Add new user</small>
            </h1>
            <ol class="breadcrumb">
                <li> <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li> <a href="{{route('users.index')}}">Users</a></li>
                <li class="active">Add new</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($user,
                [
                'method'=>'POST',
                'route' =>'users.store',
                'files' => TRUE,
                'id' => 'user-form'
                ])
                !!}

            @include('users.form')

                {!! Form::close() !!}

            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@include('users.script')


