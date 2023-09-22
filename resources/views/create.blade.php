<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<section class="content">

<div class="row">
    <form method="POST" action="http://localhost/chess_club_source/public/backend/users" accept-charset="UTF-8" id="user-form" enctype="multipart/form-data"><input name="_token" type="hidden" value="2SlE0GpyrFlSpXrXZ2pILDOzjNwl9GpNWOwAJajX">
<div class="col-xs-9">
    <div class="box">
        <div class="box-body">

            <div class="form-group ">
                <label for="name">Firstname</label>
                <input class="form-control" name="name" type="text" id="name">

            </div>

            <div class="form-group ">
                <label for="slug">Lastname</label>
                <input class="form-control" name="slug" type="text" id="slug">

            </div>

            <div class="form-group ">
                <label for="email">Email</label>
                <input class="form-control" name="email" type="text" id="email">

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

                <select class="form-control" id="role" name="role"><option selected="selected" value="">Choose a role</option><option value="1">Admin</option><option value="2">Editor</option><option value="3">Author</option></select>

            </div>

            <div class="form-group ">
                <label for="bio">Bio</label>
                <textarea rows="5" class="form-control" name="bio" cols="50" id="bio"></textarea>

            </div>

        </div>

        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="http://localhost/chess_club_source/public/backend/users" class="btn btn-default">Cancel</a>
        </div>

    </div>
</div>
</form>
</div>
</section>
