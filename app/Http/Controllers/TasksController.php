<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; //indexアクションでModelの一覧を取得するため

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     // getでmessages/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        //タスク一覧取得
        $tasks=Task::all();//use App\Models\Task;を設定済みなのでTasl::all()だけでOK
        //タスク一覧ビューでそれを表示
        return view('tasks.index',['tasks'=>$tasks,]);//第二引数にはそのViewに渡したいデータの配列を指定
    }
//配列型の構造[キー値=>値]でキー名を指定すると値を取得出来るようになる
    /**
     * Show the form for creating a new resource.
     */
    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $task = new Task;
        
        //タスク作成ビューを表示
        return view('tasks.create', ['task' => $task,]);
    }

    /**
     * Store a newly created resource in storage.
     */
     // postでmessages/にアクセスされた場合の「新規登録処理」
    public function store(Request $request) //送られてきたフォームの内容は$requestに入っている。
    {
        //タスクを作成
        $task = new Task;
        $task->content = $request->content;
        $task->save();
        
        //トップページへリダイレクトさせる
        return redirect('/');
        //storeアクションはメッセージを新規作成した後、/へリダイレクトさせるので、Viewは不要。
    }

    /**
     * Display the specified resource.
     */
     // getでmessages/（任意のid）にアクセスされた場合の「取得表示処理」
    public function show(string $id)
    {
        //idの値でタスクを検索して取得
        $task=Task::findOrFail($id);
        
        //タスク詳細ビューでそれを表示
        return view('tasks.show',['task'=>$task,]);
    }

    /**
     * Show the form for editing the specified resource.
     */
      // getでmessages/（任意のid）/editにアクセスされた場合の「更新画面表示処理」
    public function edit(string $id)
    {
        //idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        
        //タスク編集ビューでそれを表示
        return view('tasks.edit', ['task'=>$task,]);//bladeファイルではtaskというキー名で$taskを呼び出す　　　　　　　　//
    }

    /**
     * Update the specified resource in storage.
     */
     // putまたはpatchでmessages/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, string $id)
    {
        //idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        //タスクを更新
        $task->content = $request->content;
        $task->save();
        
        //トップページへリダイレクトさせる。Storeの時も
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     */
      // deleteでmessages/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy(string $id)
    {
        //idの値でタスクを検索して取得
        $task = Task::findOrFail($id);
        //タスクを削除
        $task->delete();
        
        //トップページへリダイレクト
        return redirect('/');
    }
    //destroyアクションはredirectしているのでViewは不要
    //削除ボタンの設置はshow.blade.phpへ
}