<?php

namespace App\Http\Controllers;
use App\src\ApiReader\ReadOfferApi;
use App\src\ApiReader\UIFactory;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function getApiData(Request $request)
    {
        if ($request->has('code') && $request->input('code') != '') {
            $code = $request->input('code');
        } else {
            return view('index'); // if not entered just let them try again, someone pressed empty
        }

        $data = (new ReadOfferApi())->getOffers($code);
        $formatedData = (new UIFactory($data))->getFormatedData();

        return view('read_offer', ['formatedData' => $formatedData]);
    }

}
