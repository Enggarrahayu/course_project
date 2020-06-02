<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Gate;

class StudentController extends Controller
{
	 public function index()
    {
    	$data = student::all();

    	//cek data tidak kosong
    	if(count($data) > 0) {
    		$res['message'] = "Success!";
    		$res['values'] = $data;
    		return response($res);
    	}
    	//jika data kosong
    	else{
    		$res['message'] = "Kosong!";
    		return response($res);
    	}
    }
    public function register(Request $request){
    	$student = new student();
    	$student->name = $request->name;
    	$student->email = $request->email;
    	$student->subject_course = $request->subject_course;
    	$student->address = $request->address;
    	$student->phone_number = $request->phone_number;
    	//jika data berhasil tersimpan
    	if ($student->save()) {
    		$res['message'] = "Data berhasil ditambah!";
    		$res['value'] = "$student";
    		return response($res);
    	}
    }

    public function getId($id)
    {
    	$data = student::where('id',$id)->get();

    	//cek jika data ditemukan
    	if (count($data) > 0) {
    		$res['message'] = "Success!";
    		$res['values'] = $data;
    		return response($res);
    	}
    	//jika data tidak ditemukan
    	else{
    		$res['message'] = "Gagal!";
    		return response($res);
    	}
    }

    public function edit(Request $request, $id)
    {
    	$name = $request->name;
    	$email = $request->email;
    	$subject_course = $request->subject_course;
    	$address = $request->address;
    	$phone_number = $request->phone_number;
    	$course_id = $request->course_id;

    	$student = student::find($id);
    	$student->name = $name;
    	$student->email = $email;
    	$student->subject_course = $subject_course;
    	$student->address = $address;
    	$student->phone_number = $phone_number;
    	$student->course_id = $course_id;

    	if ($student->save()) {
    		$res['message'] = "Data berhasil diubah!";
    		$res['value'] = "$student";
    		return response($res);
    	}
    	else{
    		$res['message'] = "Gagal!";
    		return response($res);
    	}
    }

    public function delete($id)
    {
    	$student = student::where('id',$id);

    	if ($student->delete()) {
    		$res['message'] = "Data berhasil dihapus!";
    		return response($res);
    	}
    	else{
    		$res['message'] = "Gagal!";
    		return response($res);
    	}
    }

    public function saveStudent(Request $request)
	{
			$client = new Client();
	   		$client->request('POST', 'http://localhost/course_project/C10/index.php/api/student',[
	    	'form_params' => [
	    		'name' => $request->name,
	    		'email' => $request->email,
	    		'subject_course' => $request->subject_course,
	    		'address' => $request->address,
	    		'phone_number' => $request->phone_number,
	    	]
	    ]);
		return redirect('/');
	}

    public function add(){
        return view('frontend/register');
    }

}
