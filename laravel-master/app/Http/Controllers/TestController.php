<?php

namespace App\Http\Controllers;
//use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Session;
use Cookie;
use DB,Input,Redirect,url,Validator,Request;
//use App\Http\Controllers\Controller;
use Storage;
class TestController extends Controller
{
    /**
     * 添加页面
     */
    public function index()
    {
        $rq = Request::input();
//        var_dump($rq);
        $rq['time'] = date("Y-m-d H:i:s");
        $res = DB::insert("insert into liu (username,test,time) values ('$rq[username]','$rq[test]','$rq[time]')");
        if ($res) {
            return redirect('lists');
        } else {
            echo "失败";
        }
    }

    /**
     *展示并分页
     */
    public function lists()
    {
//        $user=DB::select("select * from liu");
        $users = DB::table('liu')->paginate(3);
        return view('lists', ['users' => $users]);
    }

    /**
     * 删除
     */
    public function del()
    {
        $rq = Request::get('id');
//        var_dump($rq);
        $res = DB::delete("delete from liu where id=$rq");
        if ($res) {
            return redirect('lists');
        } else {
            echo "失败";
        }
    }

    /**
     * 修改
     */

    public function update()
    {
//        echo 123;die;
        $id = Request::get('id');
        $uname = Request::get('content');
        $res = DB::update("UPDATE liu set test='$uname' WHERE id =$id");
        if ($res) {
            echo 1;
        } else {
            echo -1;
        }
    }
}