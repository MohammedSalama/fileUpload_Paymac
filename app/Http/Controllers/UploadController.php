<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $upload = Upload::all();
        return view('uploads.index',compact('upload'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        /*
        * Move Logo
        */
        $logo = $request -> file('logo');
        $ext = $logo->getClientOriginalExtension();
        $name = "uploads-".uniqid() . ".$ext";
        $logo -> move( public_path('storage/') , $name);

        Upload::create([

            'logo' => $name,

        ]);
        session()->flash('Add', __('File Upload Added Successfully') );
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Upload $upload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $upload = Upload::findorfail($id);
        return view ('uploads.edit',compact('upload'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $upload = Upload::findorFail($request->id);

        $name = $upload -> logo;

        if($request->hasFile('logo'))
        {

            $logo = $request -> file('logo');
            $ext = $logo->getClientOriginalExtension();
            $name = "uploads-".uniqid() . ".$ext";
            $logo -> move( public_path('storage') , $name);
        }
        $upload->update([

            'logo' => $name ,
        ]);
        session()->flash('Edit','Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
//        dd($request);
        try {
            Upload::destroy($request->upload_id);
            session()->flash('Deleted', 'Data has been deleted successfully');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
