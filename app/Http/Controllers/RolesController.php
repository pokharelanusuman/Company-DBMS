<?php

namespace App\Http\Controllers;

use App\roles;
use Illuminate\Http\Request;
use App\Http\Resources\RolesResource;
use App\Http\Requests\RolesRequest;
use Illuminate\Routing\Route;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RolesResource::collection(roles::orderBy('authLevel', 'asc')->paginate(5));
    }

    public function show($id)
    {
        return new RolesResource(roles::findOrFail($id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesRequest $request, $id = null, $act = 'add')
    {
        // dd($request);
        if($id){
            // dd('update ko lagi ho');
            //update
            $oldData = roles::findOrFail($id);
            $act = 'updat';
        }
        if(!$request->status)
        {
            $request->status = 1;
        }
        $check = roles::updateOrCreate(
            ['id' =>$id],
            [
                'role' => $request->role,
                'authLevel' => $request->authLevel,
                'status' => $request->status,
            ]
        );
        if($check)
        {
            // dd($check);
            SESSION()->flash('success', 'Role has been '.$act.'ed!');
        }

        return new RolesResource($check);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oldData = roles::findOrFail($id);
        if($oldData)
        {
            roles::destroy($id);
            SESSION()->flash('success', 'Data has been deleted.');
        }

        return new RolesResource($oldData);
    }
}
