<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeDestroyRequest;
use App\Http\Requests\UserDestroyRequest;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $limit = 8;

    public function index(Request $request)
    {
        global $user;
        $users      = User::with('games')->orderBy('name')->paginate($this->limit);
        $usersCount = User::with('games')->count();

            return view("home.index", compact('users', 'usersCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view("home.create", compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->all());
        $user->games()->attach($request->game);

        return redirect("/home")->with("message", "New user was created successfully!");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view("home.edit", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
                $user->update($request->all());

               return redirect("home")->with("message", "User was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(HomeDestroyRequest $request, $id)
    {
        $user = User::findOrFail($id);

       if ('delete')
        {
            $user->games()->delete();
        }

        return redirect("/home")->with("message", "User was deleted successfully");
    }

    public function forceDestroy($id)
    {
        $user = User::findOrFail($id);
        $user->forceDelete();

        return redirect('/home')->with('message', 'User has been deleted successfully');
    }

}
