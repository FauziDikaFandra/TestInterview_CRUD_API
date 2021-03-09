<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use League\CommonMark\Block\Element\Document;
use App\Models\UserTable;
use App\Models\User;
use App\Http\Resources\DashboardResource;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usertable = UserTable::paginate(20);
        return view('dashboard', ['dashboard' => $usertable]);
       //return DashboardResource::collection($usertable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createnew(Request $request)
    {       
        $status = $request->status;
        $position = $request->position;
        UserTable::insert(
            [
                'status' => $status, 'position' => $position
            ]
        );
        $usertable = UserTable::orderBy('user_id', 'desc')->get();
        user::insert(
            [
                'user_id' => $usertable[0]->user_id, 'username' => $usertable[0]->user_id, 'password' => $usertable[0]->user_id
            ]
        );
    }


    
    public function edit($id)
    {
        $usertable = UserTable::where('user_id', '=', $id)->get();
        return view('edit', ['dashboard' => $usertable]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $status = $request->status;
        $position = $request->position;
        $user_id = $request->user_id;
        UserTable::where('user_id', $user_id)
            ->update(['status' => $status, 'position' => $position]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        UserTable::where('user_id', '=', $id)->delete();
        User::where('user_id', '=', $id)->delete();
        //$usertable = UserTable::paginate(20);
        //return view('dashboard', ['dashboard' => $usertable]);
        return redirect('/');
    }
}
