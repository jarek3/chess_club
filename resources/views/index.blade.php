{{--<?php--}}
<title>@yield('title', env('APP_NAME'))</title>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</head>
<link href="{{ mix('css/app.css') }}" rel="stylesheet" />

<script src="{{ mix('js/app.js') }}"></script>

<div class="col-xs-9">
    <div class="box">
        <div class="box-body ">

<table class="table table-striped table-bordered table-hover table-bordered">
  <thead>
    <tr>
      <td width="80">Action</td>
      <th scope="col">#</th>
      <th scope="col">First name</th>
      <th scope="col">Last name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Date of entry</th>
    </tr>
  </thead>
  <tbody>
  </td>

    @foreach($users as $user)
        <tr>
            <td>

{{--               <a href="{{route('/users/edit', $user->id)}}" class=" btn btn-xs btn-default">--}}
                <a href="#" class=" btn btn-xs btn-default">
                    <i class="fa fa-edit"></i>
                </a>
                @if($user->id == config('cms.default_user_id'))// || $user->id == $currentUser->id)
                    <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                        <i class="fa fa-times"></i>
                    </button>
                @else

                    <a href="#" onclick="return confirm('Are you sure?');" type="submit" class=" btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </a>
            @endif
  <td>{{$user->id}}</td>
  <td>{{$user->name}}</td>
  <td>{{$user->email}}</td>
  <td>{{$user->date_of_entry}}</td>
  </tbody>
    @endforeach
</table>
</div>
    </div>
</div>
