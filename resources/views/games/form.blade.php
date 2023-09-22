<div class="col-xs-9">
    <div class="box">
        <div class="box-body ">

            <div class="form-group {{$errors->has('white') ? 'has-error' : ''}}">
                {!! Form::label('white', 'White - Player name') !!}
                {!!Form::select('white', App\Models\User::pluck('name', 'id'), null, ['class'=>'form-control', 'placeholder'=>'Choose a player']) !!}
                @if($errors->has('white'))
                    <span class="help-block">{{$errors->first('white')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('black') ? 'has-error' : ''}}">
                {!! Form::label('black', 'Black - Player name') !!}
                {!!Form::select('black', App\Models\User::pluck('name', 'id'), null, ['class'=>'form-control', 'placeholder'=>'Choose a player']) !!}

                @if($errors->has('black'))
                    <span class="help-block">{{$errors->first('black')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('winner') ? 'has-error' : ''}}">
                {!! Form::label('winner') !!}
                {!!Form::select('winner', App\Models\User::pluck('name', 'id'), null, ['class'=>'form-control', 'placeholder'=>'Choose a player']) !!}

                @if($errors->has('winner'))
                    <span class="help-block">{{$errors->first('winner')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('whiteMoves') ? 'has-error' : ''}}">
                {!! Form::label('whiteMoves', 'Number of moves - White') !!}
                  {!! Form::text('whiteMoves', null, ['class'=>'form-control', 'placeholder'=>'Movies with white']) !!}

                @if($errors->has('whiteMoves'))
                    <span class="help-block">{{$errors->first('whiteMoves')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('blackMoves') ? 'has-error' : ''}}">
                {!! Form::label('blackMoves', 'Number of moves - Black') !!}
                {!! Form::text('blackMoves', null, ['class'=>'form-control', 'placeholder'=>'Movies with black']) !!}

                @if($errors->has('blackMoves'))
                    <span class="help-block">{{$errors->first('blackMoves')}}</span>
                @endif
            </div>

        </div>

        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{$game->exists ? 'Update' : 'Save'}}</button>
            <a href="{{route('games.index')}}" class="btn btn-default">Cancel</a>
        </div>

    </div>
    <!-- /.box -->
</div>

