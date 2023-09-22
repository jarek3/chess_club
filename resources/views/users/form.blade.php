<div class="col-xs-9">
    <div class="box">
        <div class="box-body ">

            <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}

                @if($errors->has('name'))
                    <span class="help-block">{{$errors->first('name')}}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email') !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}

                @if($errors->has('email'))
                    <span class="help-block">{{$errors->first('email')}}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('date_of_entry') ? 'has-error' : '' }}">
                {!! Form::label('date_of_entry', 'Date of entry') !!}

                <div class='input-group date' id='datetimepicker1'>
                    {!! Form::text('date_of_entry', $user->exists ? null : date("Y-m-d H:i:s"), ['class' => 'form-control', 'placeholder' => 'Y-m-d H:i:s']) !!}
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>

                @if($errors->has('date_of_entry'))
                    <span class="help-block">{{ $errors->first('date_of_entry') }}</span>
                @endif
            </div>

            <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
                {!! Form::label('password') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}

                @if($errors->has('password'))
                    <span class="help-block">{{$errors->first('password')}}</span>
                @endif
            </div>

        </div>

        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">{{$user->exists ? 'Update' : 'Save'}}</button>
            <a href="{{route('users.index')}}" class="btn btn-default">Cancel</a>
        </div>

    </div>
    <!-- /.box -->
</div>

