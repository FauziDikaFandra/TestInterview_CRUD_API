<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use League\CommonMark\Block\Element\Document;
use App\Models\UserTable;
use App\Models\User;
use App\Http\Resources\DashboardResource;
class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $usertable = UserTable::paginate(20);
       return DashboardResource::collection($usertable);
    }

   

    public function createnew(Request $request)
    {       
        $UserTableCreate =  New UserTable();
        $UserTableCreate->status = $request->status;
        $UserTableCreate->position = $request->position;
        $UserTableCreate->save();

        $usertable = UserTable::orderBy('user_id', 'desc')->get();
        $userView = UserTable::where('user_id','=', $usertable[0]->user_id)->get();

        $UserCreate =  New User();
        $UserCreate->user_id = $usertable[0]->user_id;
        $UserCreate->username = $usertable[0]->user_id;
        $UserCreate->password = $usertable[0]->user_id;
        

        if ($UserCreate->save())
        {
            return new DashboardResource($userView);
        }

        // UserTable::insert(
        //     [
        //         'status' => $status, 'position' => $position
        //     ]
        // );
        // $usertable = UserTable::orderBy('user_id', 'desc')->get();
        // user::insert(
        //     [
        //         'user_id' => $usertable[0]->user_id, 'username' => $usertable[0]->user_id, 'password' => $usertable[0]->user_id
        //     ]
        // );
    }


    public function update(Request $request, $id)
    {
        $status = $request->status;
        $position = $request->position;
   
        UserTable::where('user_id', $id)
        ->update(['status' => $status, 'position' => $position]);
        $UserTableUpdate = UserTable::orderBy('user_id', 'desc')->get();

        return new DashboardResource($UserTableUpdate);
    }

   
    public function delete($id)
    {
        UserTable::where('user_id', '=', $id)->delete();
        User::where('user_id', '=', $id)->delete();
        return "User_id '" .  $id . "' has been deleted !";
    }
}
