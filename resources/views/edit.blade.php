<div class="box-body ">
    <section class="content">
        <div class="row">
            {!! Form::model($user,
            [
            'method'=>'PUT',
            'route' =>['update', $user->id],
            'files' => TRUE,
            'id' => 'user-form'
            ])
            !!}



    <div class="form-group ">
        <label for="name">Name</label>
        <input class="form-control" name="name" type="text" value="Jane Doe" id="name">

    </div>

    <div class="form-group ">
        <label for="slug">Slug</label>
        <input class="form-control" name="slug" type="text" value="jane-doe" id="slug">

    </div>

    <div class="form-group ">
        <label for="email">Email</label>
        <input class="form-control" name="email" type="text" value="janedoe@test.com" id="email">

    </div>

    <div class="form-group ">
        <label for="password">Password</label>
        <input class="form-control" name="password" type="password" value="" id="password">

    </div>

    <div class="form-group ">
        <label for="password_confirmation">Password Confirmation</label>
        <input class="form-control" name="password_confirmation" type="password" value="" id="password_confirmation">

    </div>

    <div class="form-group ">
        <label for="role">Role</label>

        <select class="form-control" id="role" name="role"><option value="">Choose a role</option><option value="1">Admin</option><option value="2">Editor</option><option value="3" selected="selected">Author</option></select>

    </div>

    <div class="form-group ">
        <label for="bio">Bio</label>
        <textarea rows="5" class="form-control" name="bio" cols="50" id="bio">Animi dignissimos totam qui quae provident. Atque commodi corrupti expedita esse occaecati sunt nisi. Et rerum et illum vel odio. Totam reiciendis dicta illo quam ratione sed recusandae.</textarea>

    </div>

</div>

    {!! Form::close() !!}

</div>
<!-- ./row -->
</section>
