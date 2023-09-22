@include('home.message')
<table class="table table-bordered">
    <thead>
    <tr>
        <td width="80"> Action</td>
        <td>Name</td>
        <td>Email</td>
        <td>Date of entry</td>
        <td>Count of games</td>
        <td>Number of wins</td>
        <td>Number of losses</td>
        <td>Count of wins with white</td>
        <td>Count of wins with black</td>
        <td>Win ratio white versus black</td>

    </tr>
    </thead>
    <?php $request = request();?>
    <?php $user = App\Models\Game::find($request->all());?>
    <tbody>

       @foreach($users as $user)

        <tr>
            <td>

                <a href="{{route('home.edit', $user->id)}}" class=" btn btn-xs btn-default">
                    <i class="fa fa-edit"></i>
                </a>
                @if ($user->id == config('cms.default_user_id') );//|| $user->id == $currentUser->id)
                    <button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled">
                        <i class="fa fa-times"></i>
                    </button>
                @else

                    <a href="#" onclick="return confirm('Are you sure?');" type="submit" class=" btn btn-xs btn-danger">
                        <i class="fa fa-times"></i>
                    </a>
                @endif

            </td>

            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->date_of_entry}}</td>
            <td>{{$user->gamesCount()}}</td>
            <td>{{$user->winCount()}}</td>
            <td>{{$user->lossCount()}}</td>
            <td>{{$user->winWhiteCount()}}</td>
            <td>{{$user->winBlackCount()}}</td>
            <td>{{$user->ratio()}}</td>

        </tr>

    @endforeach
    <?php echo 'All games: '.$gamesCount = count(\App\Models\Game::all()); ?>
    </tbody>
</table>

