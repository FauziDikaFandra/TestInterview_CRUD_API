<?php





namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserTable;
use Carbon\Carbon;



class MainController extends Controller
{

    public function login()
    {           
            if (!Session::get('login')) {
                return view('login');
            } else {
                $usertable = UserTable::paginate(20);
                return view('dashboard', ['dashboard' => $usertable]);
            }       
    }

    public function home(Request $request)
    {
        $user = $request->input('user');
        $password = $request->input('password');
        if (user::join('s_user_table', 's_user.user_id', '=', 's_user_table.user_id')
            ->where([['s_user.user_id', '=', $user], ['s_user.password', '=', $password],['s_user_table.status', '=', 'Active']])
            ->doesntExist()
        ) {
            return view('login', ['status' => 'Failed']);
        } else {
            $userDB = user::join('s_user_table', 's_user.user_id', '=', 's_user_table.user_id')
            ->where([['s_user.user_id', '=', $user], ['s_user.password', '=', $password],['s_user_table.status', '=', 'Active']])
                ->get();
        }
        Session::put('user', $user);
        Session::put('login', TRUE);
        $usertable = DB::table('s_user_table')
        ->paginate(20);
        return view('dashboard', ['dashboard' => $usertable]);
    }

    public function logout()
    {
        Session::forget('user');
        Session::forget('login');
        return redirect('/');
    }

}
