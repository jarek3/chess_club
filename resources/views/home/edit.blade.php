@extends('layouts.main')

@section('title', 'MyBlog | Edit user')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <h1>
                Users
                <small>Edit user</small>
            </h1>
            <ol class="breadcrumb">
                <li> <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li> <a href="{{route('home.index')}}">Players</a></li>
                <li class="active">Edit player</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($user,
                [
                'method'=>'PUT',
                'route' =>['home.update', $user->id],
                'files' => TRUE,
                'id' => 'user-form',
                'winCount' => $user->winCount()
                ])
                !!}

                @include('home.form')

                {!! Form::close() !!}

            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
