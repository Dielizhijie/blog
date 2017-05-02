<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class BlogController extends Controller{

    function __construct(){
        $this->middleware('auth');
    }

    //发表一个博客
    public function add(Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');
        $user = Auth::user();
        $max = DB::table('blog')->max('id');
        $date = date('Y-m-d H:i:s', time());
        $is_success = DB::insert('insert into blog (title, content, uid, uname, created_at, updated_at)
        VALUES (?,?,?,?,?,?)', [$title, $content, $user->id, $user->name, $date, $date]);
        return view('Blog.AfterAdd', [ 'is_success' => $is_success]);
    }

    //浏览所有的blog
    public function browse(){
        $blog = DB::table('blog')
            ->select('id','title', 'uname')
            ->get();
        return view('Blog.Allbrowse') ->with('blog',$blog);
    }

    //查看自己的blog
    public function mine(){
        $user = Auth::user();
        $blog = DB::table('blog')
            ->where('uid',$user->id)
            ->select('id','title')
            ->get();
        return view('Blog.Only-mine') ->with('blog', $blog);
    }

    //修改自己的blog
    public function my_article($id){
        $user = Auth::user();
        $blog = DB::table('blog')
            ->where('uid', $user->id)
            ->where('id', $id)
            ->select('id','title', 'content')
            ->get();
        $comment = DB::table('comment')
            ->where('bid', $id)
            ->get();
        return view('Blog.amend')
            ->with([
                'blog' => $blog,
                'comment' => $comment,
                'user' => $user
            ]);
    }

    //评论所有的blog
    public function all_article($id){
        $user = Auth::user();
        $blog = DB::table('blog')
            ->where('id', $id)
            ->select('id','title', 'uid', 'content')
            ->get();
        $comment = DB::table('comment')
            ->where('bid', $id)
            ->get();
        return view('Blog.Comment_blog')
               ->with([
                   'blog' => $blog,
                   'comment' => $comment,
                   'user' => $user
               ]);
    }

    //get a post
    public function get($id){
//        echo '123';
//        dd(route('getPost', 10));
//        return 'this function will do something';
        $blog = DB::select('select * from blog where id = ?', [(int)$id]);
        dd($blog);
        return view('BlogTest');
    }

    //更新自己的blog
    public function update(Request $request, $id) {
        $content = $request->input('content');
        $is_success = DB::update('update blog set content = ? where id = ?' , [$content, $id]);
        return view('Blog.AfterUpdate', [ 'is_success' => $is_success]);
    }

    //删除自己的blog
    public function delete($id){
        $user = Auth::user();
        $uid = $user->id;
        $is_success = DB::delete('delete from blog where id = ? and uid = ?' , [$id, $uid]);
        return view('Blog.AfterAdd', [ 'is_success' => $is_success]);
    }
}
