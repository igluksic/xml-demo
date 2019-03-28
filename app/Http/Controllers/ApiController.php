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

    //Mock endpoint - for demo purpouses
    public function getOffer($code)
    {
        if ($code == '1234') {
            return response(file_get_contents(storage_path('mock_response.json')));
        }

        return response()->json(['error' => 'Invalid code']);
    }

    public function storeProducts(Request $request)
    {
        $XmlUploader = new XmlUploader($request);
        return $XmlUploader->uploadXml();
    }
}
