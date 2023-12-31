@if(session('message'))
    <div class="alert alert-info">
        {{session('message')}}
    </div>

@elseif(session('trash-message'))
    <?php list($message, $userId) = session('trash-message')?>
    {!! Form::open(['method'=>'PUT', 'route' => ['backend.blog.restore', $userId]]) !!}
        <div class="alert alert-info">
        {{$message}}
         <button type="submit" class="btn btn-sm btn-warning"><i class="fa fa-undo"></i>Undo</button>
    {!! Form::close() !!}
        </div>
@endif
