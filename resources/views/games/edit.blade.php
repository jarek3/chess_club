@extends('layouts.main')

@section('title', 'MyBlog | Edit user')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <h1>
                Users
                <small>Edit game</small>
            </h1>
            <ol class="breadcrumb">
                <li> <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li> <a href="{{route('games.index')}}">Games</a></li>
                <li class="active">Edit game</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                {!! Form::model($game,
                [
                'method'=>'PUT',
                'route' =>['games.update', $game->id],
                'files' => TRUE,
                'id' => 'game-form'
                ])
                !!}

            @include('games.form')

                {!! Form::close() !!}

            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection




