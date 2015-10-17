<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use \DB;
use App\User;
use App\Node;
use App\Common;
use App\Article;
use \Auth;
use \Crypt; //加密dd
use \Hash;
use \Session;
use \Validator; //认证



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return 'Hello World!';
    }


    public function postLogin(Request $request)
    {
        $returnInf = [];
        $input = $request->all();
        if(Auth::attempt(['name' => $input['name'],'password' => $input['password']],isset($input['remember']) ? true : false))
        {
            array_push($returnInf,'欢迎登陆本站');
            Session::flash('returnInf',$returnInf);
            Session::flash('operationResult','am-alert-success');

            return redirect(url('home'));
        }
        else
        {
            array_push($returnInf,'用户名和密码不匹配');
            Session::flash('returnInf',$returnInf);
            Session::flash('operationResult','am-alert-warning');

            return redirect()->back();
        }
    }
    

    public function postPost(Request $request)
    {
        $input = $request->all();
        $rules = ['title' => ['max:20','required'],
                  'content' => ['min:10','required']];
        $validator = Validator::make($input,$rules);

        $returnInf = [];

        if($validator->fails()){

            $messages = $validator->messages();
            foreach ($array_dot($messages->toArray) as $value) {
                array_push($returnInf,$value);
            }
            Session::flash('operationResult','am-alert-warning');
            Session::flash('returnInf',$returnInf);
            return redirect()->back()->withInput(Request::flash());
        }else{

            $article = Article::create(['title' => $input['title'],
                              'content' => Common::encodeTopicContent($input['content']),
                              'node_id' => $input['node_id'],
                              'user_id' => $input['user_id']]); 
            if($article->id > 0){
                array_push($returnInf,'发帖成功');
                Session::flash('operationResult','am-alert-success');

                Node::find($input['node_id'])->increment('article_count');
                User::find($input['user_id'])->increment('article_count');
            }else{
                array_push($returnInf, '我们的数据库出问题啦，请稍后再试=。=');
                Session::flash('operationResult','am-alert-warning');
            }
        }

        Session::flash('returnInf',$returnInf);
        return redirect()->back();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
