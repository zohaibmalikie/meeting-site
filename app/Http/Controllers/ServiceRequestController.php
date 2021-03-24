<?php

namespace App\Http\Controllers;

use App\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceRequestController extends Controller
{
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

        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'sub_categories' => 'required',
            'budget' => 'required',
            'description' => 'required',
        ]);
        $service_request = new ServiceRequest();
        $service_request->title = $request->title;
        $service_request->category_id = $request->category;
        $service_request->user_id = Auth::user()->id;
        $service_request->description = $request->description;
        $service_request->budget = $request->budget;
        $service_request->subcategories = json_encode($request->sub_categories);
        if($file= $request->file('tags')){
            $file_original_name = $file->getClientOriginalName();
            $image_changed_name = time() . '_' . str_replace('', '-', $file_original_name);
            $file->move('public/uploads/files/', $image_changed_name);
            $service_request->tags = 'uploads/files/' . $image_changed_name;
        }
        // $tags = explode(',', $request->tags);
        // $service_request->tags = json_encode($tags);
        $service_request->save();
        return back()->with('success','Request has been generated!');
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
        //
    }
}
