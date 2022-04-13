<?php

namespace App\Http\Controllers;

use App\Office;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\EditUserceRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    const PAGINATION_NUMBER = 5;
    protected $user;
    protected $office;

    public function __construct(User $user, Office $office)
    {
        $this->user = $user;
        $this->office = $office;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user::orderBy('id', 'desc')
            ->paginate(self::PAGINATION_NUMBER);

        return view('page.users_page')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return 'create User';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'store User';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user::findOrFail($id);
        $office = $this->office::where('user_id', $id);

        return view('page.user.details')->with(compact('user', 'office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->user::find($id);

        return view('page.user.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserceRequest $request, $id)
    {
        $user = $this->user::find($id);
        if (strlen($request->password) == 0){
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->isAdmin = $request->isAdmin;
            $user->save();

            return redirect()->route('users.index');
        }

        if(strlen($request->password) >=6 && $request->password == $request->comfirmpassword){
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->username;
            $user->isAdmin = $request->isAdmin;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('users.index');
        }

        return redirect()->route('users.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(User::find($id)){
            $user = User::find($id);
            $user->delete();
        }
        else{
            return redirect()->route('users.index')->with('error','not found user');
        }

        return redirect()->route('users.index')->with('success','Delete success');
    }
}
