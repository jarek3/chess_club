@extends('layouts.main')

@section('title', 'MyBlog | Users')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users
                <small>Display All Players</small>
            </h1>
            <ol class="breadcrumb">
                <li> <a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li> <a href="{{route('home.index')}}"> Players</a></li>
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
                               <a href="{{url('home/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> Add New</a>
                            </div>
                            <div class="pull-right">
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">

                          @if(!$users->count())
                            <div class="alert alert-danger">
                              <strong> No Record Found </strong>
                            </div>

                          @else
                            @include(('home.table'))
                          @endif
                        </div>
                        <!-- /.box-body -->
                        <div class="box <footer clearfix">
                           <div class="pull-left">

                               {{$users->appends(Request::query())->render()}}
                               <div class="pull-right">
                                   <small>{{$usersCount}} {{Str::plural ('Item', $usersCount)}}</small>
                               </div>

                            </div>
                        </div>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>
    </div>
        <!-- /.content -->

@endsection

@section('script')
    <script type="text/javascript" >
        $('ul.pagination').addClass('no-margin pagination-sm');
    </script>
@endsection

