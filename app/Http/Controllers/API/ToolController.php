<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tool;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Tool::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'size' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'integer'],
        ]);


        return Tool::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'size' => $request['size'],
            'status' => $request['status'],
            'quantity' => $request['quantity'],
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tool = Tool::findOrFail($id);
        
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'size' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'integer'],
        ]);

        $tool->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tool = Tool::findOrFail($id);

        $tool->delete();
    }
}
