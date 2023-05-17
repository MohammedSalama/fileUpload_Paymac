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
        $upload = new Upload();
        $upload->logo	= $request->get('logo');
        $upload->save();
        return $upload;
    }

    public function update(Request $request, $id)
    {
        $upload = Upload::find($id);

        if (!$upload)
        {
            return response()->json(['status' => 'Not Found'] , Response::HTTP_NOT_FOUND);
        }

        $upload->logo	= $request->get('logo');
        $upload->save();
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
