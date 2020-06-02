<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\teacherModel;
use Illuminate\Support\Facades\DB;

class teacherController extends Controller
{
		public function index()
		{
			$teacher = teacherModel::all();
			return view('frontend/teacher', ['teacher' => $teacher]);

		}
    	
}
