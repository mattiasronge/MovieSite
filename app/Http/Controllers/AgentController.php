<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::orderBy('name')->paginate(20);
        return view('agent.index', [
            'agents' => $agents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //go to the create.blade.php
        return view('agent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name'=>'required',
        'birthday'=> 'required|date',
        'country' => 'required|string'
      ]);

      $agent = new Agent;

      $agent->name = $request->get('name');
      $agent->birthday = $request->get('birthday');
      $agent->country = $request->get('country');
      $agent->save();

      return redirect()->route('agents.index')->with('success', 'it has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        return view('agent.show', [
            'agent' => $agent
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agent = Agent::find($id);

        return view('agent.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agent  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'birthday'=> 'required|date',
            'country' => 'required|string'
          ]);
    
          $agent = Agent::find($id);
    
          $agent->name = $request->get('name');
          $agent->birthday = $request->get('birthday');
          $agent->country = $request->get('country');
          $agent->save();

  
          return redirect()->route('agents.index')->with('success', 'it has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agent::where('id', $id)->delete();
        return redirect()->route('agents.index')->with('success', 'Stock has been deleted Successfully');
    }
}
