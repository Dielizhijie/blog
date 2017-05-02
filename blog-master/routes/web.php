<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    return view('Blog.BlogTest', ['post_name' => 'a normal post']);
    return view('welcome');
});

//Route::get('/ceshi', function(){
//   return view('ceshi');
//});

//post module

//show add post page
Route::get('/article', function(){
   return view('Blog.add');
});

Route::get('/fuck', function(){
    return view('Blog.fuck');
});

////测试
//Route::get('/ceshi', 'BlogController@ceshi');
//浏览所有的文章
Route::get('/browse','BlogController@browse');

//查看或者修改自己的blog
Route::get('/mine', 'BlogController@mine');

//对自己的blog进行修改
Route::get('/my_article/{id}', 'BlogController@my_article');

//对他人的blog进行评论
Route::get('all_article/{id}', 'BlogController@all_article');

//删除自己的blog
Route::get('delete/{id}', 'BlogController@delete');

////更新自己的blog
//Route::get('update/{id}', 'BlogController@update');
////add a
Route::get('/artposticle', 'BlogController@add');

//
////update a post
//
Route::put('/article/{id}', 'BlogController@update');

Route::get('/article/update/{id}', function($id){
   return view('Blog.update', ['id' => $id]);
});

Route::get('/article/delete/{id}', function($id){
    return view('Blog.delete', ['id' => $id]);
});

//delete a post
Route::delete('/article/{id}', 'BlogController@delete');

//
//get a post
Route::get('/article/{id}', ['uses'=> 'BlogController@get', 'as'=> 'getPost']);
Auth::routes();

//评论
//新增评论
Route::get('/comment/add/{bid}', function ($bid) {
    return view('Comment.Add', ['bid' => $bid]);
});

Route::post('/comment/add/{bid}', 'CommentController@add');

//修改评论
Route::get('/comment/update/{bid}/{uid}/{cid}', function ($bid, $uid, $cid) {
    return view('Comment.Update', ['bid' => $bid, 'uid' => $uid, 'cid' => $cid]);
});

Route::post('/comment/update/{bid}/{uid}/{cid}', 'CommentController@update');

//删除评论
Route::get('/comment/delete/{bid}/{uid}/{cid}', 'CommentController@delete');


//博主删除评论
Route::get('/master_comment/delete/{bid}/{uid}/{cid}', 'CommentController@master_delete');

////用户
//Route::get('/session', 'UserController@session');
Route::get('/home', 'HomeController@index');

Route::get('/blogList', function(){
   return view('Blog.fuck');
});

//查看用户
Route::get('/all_user', 'UserController@all_user');
Route::get('/user/{id}', 'UserController@user');

//删除用户
Route::get('/user/delete/{id}', 'UserController@delete_user');

//修改用户
Route::get('/user/update/{id}', function($id){
    return view('User.Update');
});
Route::get('/update_user/{id}', 'UserController@update_user');

Route::get('/user/update/{id}', function($id){
    return view('User.Update', ['id' => $id]);
});
