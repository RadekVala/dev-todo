<?php

namespace App\Http\Controllers;


use App\Todo;
use App\State;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTodo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user() != null) {
            //$todos = Todo::where( 'user_id', Auth::user()->id)->get();
            $todos = Auth::user()->todos;

            return view('todos.index', [
                // pass todos local variable to blade template
                'todos' => $todos,
            ]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return view('todos.create', [
            'states' => $states
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodo $request)
    {
        $validated = $request->validated();


        // save valid data
        Todo::create(
            [
                'name' => $request->name,
                'description' => $request->description,
                'status_id' => $request->status_id,
                'user_id' => Auth::user()->id
            ]
        );

        // redirect back to index
        return redirect(route('todos.index'));
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
        // echo $id;

        // find specific todo for edit by ID
        $todo = Todo::find($id);
        // show edit form and pass todo object to template
        return view('todos.edit', [
            'todo' => $todo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTodo $request, $id)
    {
        //echo $request->description;

        $validated = $request->validated();


        // save valid data
        $todo = Todo::find($id);
        $todo->fill($request->all());
        $todo->save();

        // redirect to index
        return redirect(route('todos.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // load todo to delete
        // $toDelete = Todo::find($id);
        // $toDelete->delete();

        Todo::destroy($id);

        // redirect to index
        return redirect(route('todos.index'));
    }
}
