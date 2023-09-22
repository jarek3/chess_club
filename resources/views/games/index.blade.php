@extends('layouts.main')

@section('title', 'MyBlog | Users')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Games
                <small>Display All Games</small>
            </h1>
            <ol class="breadcrumb">
                <li> <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li> <a href="{{route('games.index')}}"> Players</a></li>
                <li class="active">All Players </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header clearfix" >
                            <div class="pull-left">
                               <a href="{{url('games/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                            <div class="pull-right">
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">

                            @include(('games.table'))

                        </div>
                        <!-- /.box-body -->
                        <div class="box <footer clearfix">
                           <div class="pull-left">

                               {{$games->appends(Request::query())->render()}}

                               <div class="pull-right">
                                   <small>{{$gamesCount}} {{Str::plural ('Item', $gamesCount)}}</small>
                               </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
            </div>
        </section>
        <!-- /.content -->

@endsection

@section('script')
    <script type="text/javascript" >
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection


