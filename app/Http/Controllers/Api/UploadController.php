<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $upload = Upload::all();
        return response()->json($upload);
    }

    public function show($id)
    {
        return Upload::find($id) ?? response()->json(['status' => 'Not Found'] , Response::HTTP_NOT_FOUND);
    }

    public function create(Request $request)
    {
        /*
        * Move Logo
        */
        $logo = $request -> file('logo');
        $ext = $logo->getClientOriginalExtension();
        $name = "uploads-".uniqid() . ".$ext";
        $logo -> move( public_path('storage/') , $name);

        $upload = Upload::create([

            'logo' => $name,

        ]);

        return $upload;
    }

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

        return $upload;

    }

    public function delete(Request $request, $id)
    {
        $upload = Upload::find($id);

        if (!$upload)
        {
            return response()->json(['status' => 'Not Found'] , Response::HTTP_NOT_FOUND);
        }

        $upload->delete();
        return response()->json(['status' => 'Deleted'] , Response::HTTP_OK);
    }
}
