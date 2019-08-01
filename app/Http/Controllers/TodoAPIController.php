<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use PHPUnit\Runner\Exception;
use App\Http\Requests\StoreTodo;
use Illuminate\Support\Facades\Auth;

class TodoAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Auth::user()->todos;
        $sorted = $todos->sortByDesc('created_at');
        $sorted = $sorted->sortBy('status_id');

        return response()->json($sorted->values()->all());
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
    public function store(StoreTodo $request)
    {
        try {
            $validated = $request->validated();

            // save valid data
            Todo::create(
                [
                'name' => $request->name,
                'description' => $request->description,
                'status_id' => 1,
                'user_id' => Auth::user()->id
                ]
            );
            return response()->json([
                'message' => 'Todo was succesfully saved.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'errors' => 'exception',
                'message' => $e->getMessage(),
            ]);
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
        try {
            Todo::destroy($id);
            return response()->json([
                'message' => 'Todo was succesfully deleted.',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'errors' => 'exception',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
