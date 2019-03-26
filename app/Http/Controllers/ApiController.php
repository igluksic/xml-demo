<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\src\XmlUploader;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function getOffer($code)
    {
        //TODO: explanation needed
        return response()->json(['code' => $code], 200);
    }

    public function storeProducts(Request $request)
    {
        $XmlUploader = new XmlUploader($request);
        return $XmlUploader->uploadXml();
    }
}
