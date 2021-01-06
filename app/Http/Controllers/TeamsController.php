<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Teams;

class TeamsController extends Controller
{
    private $status     =   200;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $data=$request->all();
        $team=new Teams();
        $team->name=$data['name'];
        
        $team->save();
        return response()->
        json([
            'status'=>200,
            'team'=>$team

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

    public function teamsListing() {
        $teams       =       Teams::all();
        if(count($teams) > 0) {
            return response()->json(["status" => $this->status, "success" => true, "count" => count($teams), "data" => $teams]);
        }
        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "no record found"]);
        }
    }

    public function teamsDetail($id) {
        $teams        =       Teams::find($id);
        if(!is_null($teams)) {
            return response()->json(["status" => $this->status, "success" => true, "data" => $teams]);
        }
        else {
            return response()->json(["status" => "failed", "success" => false, "message" => " no team found"]);
        }
    }
    
    public function teamDelete($id) {
        $team        =       Teams::find($id);
        if(!is_null($team)) {
            $delete_status      =       Teams::where("id", $id)->delete();
            if($delete_status == 1) {
                return response()->json(["status" => $this->status, "success" => true, "message" => "team deleted successfully"]);
            }
            else{
                return response()->json(["status" => "failed", "message" => "failed to delete"]);
            }
        }
        else {
            return response()->json(["status" => "failed", "message" => "no team found with this id"]);
        }
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

public function update(Request $request, $id)
    {
        //
        $data=$request->all();
        $team=Teams::where('id',$id)->first();
        $team->name=$data['name'];
        $team->save();
        return response()->
        json([
            'status'=>200,
            'project'=>$project

        ]);
    }
}