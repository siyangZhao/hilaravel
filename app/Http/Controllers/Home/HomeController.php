<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use \DB;
use App\User;
use \Auth;
use \Crypt; //加密
use \Hash;
use \Session;
use \Validator; //认证

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only' => ['getPost','getRead']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('layouts.home.index');
    }


    public function getLogin()
    {
        return view('layouts.home.login');
    }


    public function getPost()
    {
        return view('layouts.home.post_article')->with('nodes',DB::table('nodes')->get());
    }


    public function getLogout()
    {
        Auth::logout();
        return redirect()->back();
    }


    public function getRead($id)
    {
        $article = Article::find($id);
        if($article)
        {
            $article = DB::table('articles')->where('articles.id','=',$id)
                                            ->leftJoin('users','articles.user_id','=','users.id')
                                            ->leftJoin('nodes','articles.node_id','=','nodes.id')
                                            ->select('articles.*','users.name as user_name','nodes.name as node_name')
                                            ->get();

            return view('layouts.home.read')->with('articles',$articles);
        }else{

            $returnInf = [];
            array_push($returnInf,'您查看的记录不存在');
            Session::flash('operationResult','am-alert-warning');
            Session::flash('returnInf',$returnInf);

            return redirect(url('home'));
        }
    }


    // public function getAdmin()
    // {
    //     if(User::)
    //     return view('layouts.home.admin');
    // }


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
