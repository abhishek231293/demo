<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {   
        $task = DB::table('tasks')->orderBy('created_at', 'DESC')->get();
        $role = DB::table('tasks')->groupBy('role')->get();
        return view('tasks', ['tasks' => $task, 'roles' => $role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new \App\Task();

        $task->name = $request->name;
        $task->role = $request->role;
        $task->contact = $request->contact;
        $task->save();
        
        return redirect('task');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $task = \App\Task::find($id);
         
         $task->is_active = 1;
         $task->save();
         return back();
         
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            
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
        if(isset($request->active)){
            $value = 0;
        }else{
            $value = 1;
        }
        $date = date('Y-m-d H:i:s');
        DB::table('tasks')
            ->where('id',$id)
            ->update(['is_active' => $value,'updated_at' => $date]);
        return back();  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = \App\Task::find($id);
        $task->delete();
        return back();
    }
}
