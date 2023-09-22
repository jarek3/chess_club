@if(session('message'))
    <div class="alert alert-info">
        {{session('message')}}
    </div>
@endif
<table class="table table-bordered">
    <thead>
    <tr>
        <td width="80"> Action</td>
        <td>White - Player name</td>
        <td>Black - Player name</td>
        <td>Winner</td>
        <td>Game Time</td>
        <td>Number of moves - White</td>
        <td>Number of moves - Black</td>
        <td>Min Moves Game</td>

    </tr>
    </thead>
    <?php $request = request();?>

    <tbody> @foreach($games  as $game)

 <tr>

            <td>
                {!! Form::open(['method' => 'DELETE', 'route' => ['games.destroy', $game->id]]) !!}
                <a href="{{route('games.edit', $game->id)}}" class=" btn btn-xs btn-default">
                    <i class="fa fa-edit"></i>
                </a>
                @if($game->id == config('cms.default_game_id') );
                    <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                        <i class="fa fa-times"></i>
                    </button>
                @else

                    <a href="#" onclick="return confirm('Are you sure?');" type="submit" class=" btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </a>
                @endif
                {!! Form::close() !!}

            </td>
            <td>{{$game->getWhite()}}</td>
            <td>{{$game->getBlack()}}</td>
            <td>{{$game->isWinner()}}</td>
            <td>{{$game->game_time}}</td>
            <td>{{$game->whiteMoves}}</td>
            <td>{{$game->blackMoves}}</td>
            <td> {{$game->minMovesGame()}}</td>

        </tr>

    @endforeach
    <?php echo 'All users: '.$usersCount = count(\App\Models\Game::all()); ?>
    </tbody>
</table>
