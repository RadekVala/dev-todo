<?php

namespace App\Http\Controllers;


use App\Todo;
use App\State;
use Illuminate\Http\Request;
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
        $todos = Todo::where( 'user_id', Auth::user()->id);

        return view('todos.index', [
            // pass todos local variable to blade template
            'todos' => $todos,
        ]);
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
    public function store(Request $request)
    {
        // data validation
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

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
    public function update(Request $request, $id)
    {
        //echo $request->description;

        // at first validate incoming data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);

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
        //
    }
}
