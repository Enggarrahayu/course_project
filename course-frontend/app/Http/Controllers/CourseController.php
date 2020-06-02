<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\DB;


class CourseController extends Controller
{
	public function course(){
        $client = new Client();
        $request = $client->get('http://localhost/course_project/C10/index.php/api/course');
        $response = $request->getBody()->getContents();
        $invoice = collect(json_decode($response, true))->collapse()->all(); //return data into simple array with collect()
        return view('frontend/course', ['course'=>$invoice]);
    }
}
