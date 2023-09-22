@if(session('message'))
    <div class="alert alert-info">
        {{session('message')}}
    </div>
@endif
<table class="table table-bordered">
    <thead>
    <tr>
        <td width="80"> Action</td>
        <td>Name</td>
        <td>Email</td>
        <td>Date of entry</td>
{{--    <td>Password</td>--}}
{{--    <td>Number of moves</td>--}}
        <td>Number of wins</td>
        <td>Number of losses</td>

    </tr>
    </thead>
    <?php $request = request();?>

    <tbody> @foreach($users as $user)

        <tr>
            <td>
                {!! Form::open(['method' => 'DELETE', 'route' => ['user.destroy', $user->id]]) !!}
                <a href="{{route('users.edit', $user->id)}}" class=" btn btn-xs btn-default">
                    <i class="fa fa-edit"></i>
                </a>

                <button onclick="return confirm('Are you sure?');" type="submit" class="btn btn-xs btn-danger">
                    <i class="fa fa-times"></i>
                </button>
                {!! Form::close() !!}

            </td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->date_of_entry}}</td>
            <td>{{$user->winCount()}}</td>
            <td>{{$user->lossCount()}}</td>

        </tr>

    @endforeach
    <?php echo 'All games: '.$gamesCount = count(\App\Models\Game::all()); ?>
    </tbody>
</table>
