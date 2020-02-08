<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\People;
use Illuminate\Support\Facades\Storage;

class HelloController extends Controller
{
	function __construct()
	{
		config(["sample.message" => "新しいメッセージだよ"]);
		$this->fname = "sample.txt";
	}
/*
	public function index($id){
		$data = [
			//'msg' => 'This is Sample Message.',
			'msg' => '$id = ' . $id,
		];
		return view('hello/index', $data);
	}

	public function other(){
		return redirect()->route('hello');
	}


*/


/*
	public function index(Request $request){
		$data = [
			'msg' => $request->hello,
		];
		return view('hello/index', $data);
	}


	public function index(People $people){
		$data = [
			'msg' => $people,
		];
		return view('hello/index', $data);
	}

	public function index($people){
		$data = [
			'msg' => $people,
		];
		return view('hello/index', $data);
	}



	public function index(){
		//$sample_msg = config("sample.message");
		$sample_msg = env("SAMPLE_MESSAGE");
		$sample_data = config("sample.data");
		$data = [
			'msg' => $sample_msg,
			'data' => $sample_data,
		];
		return view('hello/index', $data);
	}

*/

	public function index(){
		$sample_msg = $this->fname;
		$sample_data = Storage::get($this->fname);
		$data = [
			'msg' => $sample_msg,
			'data' => explode(PHP_EOL, $sample_data),
		];
		return view('hello/index', $data);
	}
/*
	public function other(Request $request){
		$data = [
			'msg' => $request->bye,
		];
		return view('hello/index', $data);
	}
*/

	public function other($msg){
		$data = Storage::get($this->fname) . PHP_EOL . $msg;
		Storage::put($this->fname, $data);
		return redirect()->route("hello");
	}

}
