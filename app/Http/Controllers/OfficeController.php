<?php

namespace App\Http\Controllers;

use App\Office;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\EditRequest;
use App\Http\Requests\CreateOfficeRequest;

class OfficeController extends Controller
{
    const PAGINATION_NUMBER = 5;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = DB::table('offices')
            ->join('users', 'users.id', '=', 'offices.user_id')
            ->select('offices.*', 'users.username')
            ->orderBy('offices.id', 'desc')
            ->paginate(self::PAGINATION_NUMBER);

        return view('page.offices_page', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.office.create_office');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOfficeRequest $request)
    {
        Office::create($request->all());

        return redirect()->route('offices.index')->with('success','Create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->ajax()){
            $output = '';
            $user_Name = DB::table('users')->where('username', 'LIKE', '%' . $request->search . '%')->get();
            if ($user_Name) {
                foreach ($user_Name as $key => $item) {
                    $output .= '<option class="list-group-item" value="'.$item->id.'">'.$item->username.'</option>';
                }
            }

            return Response($output);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $office = Office::findOrFail($id);

        return view('page.office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $id)
    {
        $office = Office::findOrFail($id);
        $office->role = $request->role;
        $office->update();

        return redirect()->route('offices.edit', $id)->with('success', 'Update success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Office::find($id)){
            $user = Office::find($id);
            $user->delete();
        }
        else{
            return redirect()->route('offices.index')->with('error','not found id');
        }

        return redirect()->route('offices.index')->with('success','Delete success');
    }

    public function search(Request $request)
    {
        if ($request->ajax()){
            $output = '';
            $user_Name = DB::table('users')->where('username', 'LIKE', '%' . $request->search . '%')->get();
            if ($user_Name) {
                foreach ($user_Name as $key => $item) {
                    $output .= '<option class="list-group-item" value="'.$item->id.'">'.$item->username.'</option>';
                }
            }

            return Response($output);
        }
    }
}
