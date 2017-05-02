<?php
/**
 * Created by PhpStorm.
 * User: ningge
 * Date: 2017/3/28
 * Time: 19:28
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;

class UserController extends Controller{
    function __construct(){
        $this->middleware('auth');
    }

    //查看用户
    public function all_user(){
        $user = Auth::user();
        $users = DB::table('users')
            ->select('id','name', 'email', 'leader_id')
            ->get();
        return view('User.AllUser')
            ->with([
                'users' => $users,
                'user' => $user
            ]);
    }

    public function user($id){
        $user = Auth::user();
        $users = DB::table('users')
            ->where('id', $id)
            ->get();
        return view('User.user')
               ->with([
               'users' => $users,
               'user' => $user
              ]);
    }

    //删除用户
    public function delete_user($id){
       $is_success = DB::delete('delete from users where id = ?', [$id]);
        return view('User.AfterDelete', [ 'is_success' => $is_success]);
    }

    //更新用户
    public function update_user(Request $request, $id){
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $password_lock = bcrypt($password);
//        $is_success = DB::update('update users set name = ?, where id = ?', [$name,]);
//
        $is_success = DB::update('update users set name = ?, email = ?, password = ? where id = ?',
            [$name, $email, $password_lock, $id]);
        return view('User.AfterUpdate', [ 'is_success' => $is_success]);
    }

//    //查看用户
//    public function all_user($id){
//        $user = Auth::user();
//        $user = DB::table('blog')
//            ->where('id', $id)
//            ->select('id','title', 'uid', 'content')
//            ->get();
//        $comment = DB::table('comment')
//            ->where('bid', $id)
//            ->get();
//        return view('User.Comment_blog')
//            ->with([
//                'blog' => $blog,
//                'comment' => $comment,
//                'user' => $user
//            ]);
//    }
}