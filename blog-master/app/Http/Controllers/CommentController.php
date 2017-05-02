<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class CommentController extends Controller{
    function __construct(){
        $this->middleware('auth');
    }

    //添加评论
    public function add(Request $request, $bid) {
        $user = Auth::user();
        $comment = $request->input('comment');
        $date = date('y-m-d h:i:s', time());
        $is_success = DB::insert('insert into comment(comment, bid, uid, uname, created_at, updated_at)
        values(?,?,?,?,?,?)', [$comment, $bid, $user->id, $user->name, $date, $date]);
        return view('Comment.AfterAdd', ['bid' => $bid, 'is_success' => $is_success]);
    }

    //修改评论
    public function update(Request $request, $bid, $uid, $id) {
        $user = Auth::user();
        if ($user->id == $uid) {
            $comment = $request->input('comment');
            $date = date('y-m-d h:i:s', time());
            $num = DB::table('comment')
                ->where(['id' => $id, 'uid' => $user->id])
                ->update([
                    'bid' => $bid,
                    'comment' => $comment,
                    'updated_at' => $date
                ]);
            if($num > 0) {
                $is_success = true;
            }
            else {
                $is_success = false;
            }
        }
        else {
            $is_success = false;
        }
        return view('Comment.AfterUpdate', ['bid' => $bid, 'is_success' => $is_success]);
    }

    //删除评论
    public function delete($bid, $uid, $id){
        $user = Auth::user();
        if ($user->id == $uid) {
            $is_success = DB::table('comment')
                ->where(['id' => $id, 'uid' => $user->id])
                ->delete();
        }
        return view('Comment.AfterDelete', ['bid' => $bid, 'is_success' => $is_success]);
    }

    //博主删除别人的评论
    public function master_delete($bid, $uid, $id){
        $is_success = DB::table('comment')
            ->where(['id' => $id, 'uid' => $uid])
            ->delete();
        return view('Comment.AfterDelete', ['bid' => $bid, 'is_success' => $is_success]);
    }
}