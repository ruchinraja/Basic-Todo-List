<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todos;
use DB;
class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos_data=Todos::all();
     //   var_dump($todos_data);
        return view('todos.index')->with('todos',$todos_data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.add_todo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')){
        $data=$request->all();
        $todo=new Todos();
        $todo->subject=$data['subject'];
        $todo->description= $data['description'];
        $todo->deadline=$data['deadline'];
        $todo->status=0;
        $todo->save();
        if($todo->save()){
            return redirect('/todos')->with('flash_message_success','Todo Added Succesfully');
        }
        else{
            return redirect('/todos')->with('flash_message_error','Todo Not Added');
        }
        }
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
    public function edit(Request $request,$id=null)
    {
        if($request->isMethod('post')){
            $todoData= $request->all();
            $subject=$todoData['subject'];
            $description=$todoData['description'];
            $deadline=$todoData['deadline'];
            $sql="UPDATE todos SET subject='".$subject."',description='".$description."',deadline='".$deadline."' where id='".$id."' ";
            DB::statement($sql);
            return redirect('/todos')->with('flash_message_success','Todo Updated Successfully');

        }
        $todoDetails=Todos::where(['id' => $id])->first();
        return view('todos.edit_todo')->with('todoDetails',$todoDetails);

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
    public function done(Request $request,$id){
        $sql="UPDATE todos SET status='1' where id='".$id."' ";
        $db=DB::statement($sql);
        if($db){
        return redirect('/todos')->with('flash_message_success','Done Succesfully');
        }
        return redirect('/todos')->with('flash_message_error','Done not updated ');
    }
    public function delete($id=null){
        if(!empty($id)){
            $sql="DELETE from  todos  where id='".$id."' ";
            DB::statement($sql);
            return redirect('/todos')->with('flash_message_success','Todo Deleted Successfully');
        }
    }
}
