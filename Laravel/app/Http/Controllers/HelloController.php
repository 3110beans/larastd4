<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Person;
//use App\People;
use Illuminate\Support\Facades\Storage;
//use App\MyClasses\MyServiceInterface;
//use App\Facades\MyService;
use Illuminate\Support\Facades\DB;
use App\Http\Pagination\MyPaginator;

class HelloController extends Controller
{

	function __construct()
	{
	}

	public function index(Request $request){

		$msg = 'show people record.';
		$re = Person::get();
		$fields = Person::get()->fields();

		$data = [
			"msg" => implode(", ", $fields),
			"data" => $re,
		];

		return view('hello/index', $data);

	}

	public function save($id, $name){
		$record = Person::find($id);
		$record->name = $name;
		$record->save();
		return redirect()->route('hello');
	}

/*

	public function index(Request $request){

		$msg = 'show people record.';
		//$result = Person::get();
		$result1 = Person::get()->filter(function($person){
			return $person->age >= 40;
		});

		$result2 = Person::get()->filter(function($person){
			return $person->age < 40;
		});
		$result3 = $result1->diff($result2);

		$data = [
			"msg" => $msg,
			"data" => $result2,
		];

		return view('hello/index', $data);

	}


	public function index(Request $request){

		$id = $request->query('page');
		$msg = 'show page: ' . $id;
		//$result = DB::table("people")->paginate(1, ['*'], 'page', $id);
		//$result = DB::table("people")->simplePaginate(2);
		$result = Person::paginate(1);
		$paginator = new MyPaginator($result);

		$data = [
			"msg" => $msg,
			"data" => $result,
			"paginator" => $paginator,
		];

		return view('hello/index', $data);

	}


	public function index(){

		$result = DB::table("people")->get();
		$data = [
			"msg" => "Database access.",
			"data" => $result,
		];

		return view('hello/index', $data);

	}

		$data = [
			"msg" => $request->hello,
			"data" => $request->alldata,
		];

		return view('hello/index', $data);


	public function index(int $id = -1){
		MyService::setId($id);
		$data = [
			"msg" => MyService::say(),
			"data" => MyService::alldata(),
		];

		return view('hello/index', $data);

	}

	public function index(MyServiceInterface $myservice, int $id = -1){
		$myservice->setId($id);
		$data = [
			"msg" => $myservice->say(),
			"data" => $myservice->alldata(),
		];

		return view('hello/index', $data);

	}

	function __construct(MyService $myservice)
	{
		$myservice = app('App\MyClasses\MyService');
	}


	public function index(int $id = -1){
		$myservice = app()->makeWith("App\MyClasses\MyService", ["id" => $id]);

		$data = [
			"msg" => $myservice->say(),
			"data" => $myservice->alldata(),
		];

		return view('hello/index', $data);

	}

	public function other(){

		$data = [
			"name" => "talo",
			"mail" => "talo@yamada.com",
			"tel" => "999-999-999",
		];
		$query_str = http_build_query($data);
		$data["msg"] = $query_str;
		return redirect()->route("hello", $data);

	}

	public function index(Request $request, Response $response){
		$name = $request->query("name");
		$mail = $request->query("mail");
		$tel = $request->query("tel");
		$msg = $request->query("msg");
		$keys = ["名前", "メール", "電話"];
		$values = [$name, $mail, $tel];

		$data = [
			"msg" => $msg,
			"keys" => $keys,
			"values" => $values,
		];

		$result = $request->flash();
		return view('hello/index', $data);

	}


	public function other(Request $request){
		$ext = "." . $request->file("file")->extension();
		Storage::disk("public")->putFileAs("files", $request->file("file"), "uploaded" . $ext);
		return redirect()->route("hello");
	}



	public function index(Request $request, Response $response){
		$name = $request->query("name");
		$mail = $request->query("mail");
		$tel = $request->query("tel");
		$msg = $name . "," . $mail . "," . $tel;
		$keys = ["名前", "メール", "電話"];
		$values = [$name, $mail, $tel];

		$data = [
			"msg" => $msg,
			"keys" => $keys,
			"values" => $values,
		];

		$result = $request->flash();
		return view('hello/index', $data);

	}


	public function index(Request $request, Response $response){
		$msg = "Please input text:";
		$keys = [];
		$values = [];
		if($request->isMethod("post")){
			//$form = $request->all();
			$form = $request->only(["name","mail", "tel"]);
			$keys = array_keys($form);
			$values = array_values($form);
			$msg = old("name") . "," . old("mail") . "," . old("tel");
			$data = [
				"msg" => $msg,
				"keys" => $keys,
				"values" => $values,
			];

			$result = $request->flash();
			return view('hello/index', $data);
		}
		$data =[
			"msg" => $msg,
			"keys" => $keys,
			"values" => $values,
		];
		$result = $request->flash();
		return view('hello/index', $data);
	}


	public function index(){
		$dir = "/";
		//$all = Storage::disk("local")->allfiles($dir);
		$all = Storage::disk("logs")->allfiles($dir);
		//$all = Storage::disk("ftp")->allfiles($dir);
		$data = [
			"msg" => "DIR: " . $dir,
			"data" => $all,
		];
		return view('hello/index', $data);
	}




	public function index(){
		$url = Storage::disk("public")->url($this->fname);
		$size = Storage::disk("public")->size($this->fname);
		$modified = Storage::disk("public")->LastModified($this->fname);
		$modified_time = date("y-m-d", $modified);
		$sample_keys = ["url", "size", "modified"];
		$sample_meta = [$url, $size, $modified_time];
		$result = '<table><tr><th>'. implode('</th><th>', $sample_keys) . '</th></tr>';
		$result .= '<tr><td>'. implode('</td><td>', $sample_meta) . '</td></tr></table>';
		$sample_data = Storage::disk('public')->get($this->fname);
		$data = [
			'msg' => $result,
			'data' => explode(PHP_EOL, $sample_data),
		];
		return view('hello/index', $data);
	}




	public function other(Request $request){
		Storage::disk("local")->putfile("files", $request->file("file"));
		return redirect()->route("hello");
	}


	public function other($msg){
		return Storage::disk("public")->download($this->fname);
	}



	public function other($msg){
		if(Storage::disk("public")->exists("bk_" . $this->fname)){
			Storage::disk("public")->delete("bk_" . $this->fname);
		}
			
		Storage::disk("public")->copy($this->fname, "bk_" . $this->fname);
		if(Storage::disk("public")->exists("bk_" . $this->fname)){
			Storage::disk("local")->delete("bk_" . $this->fname);
		}
		Storage::disk("local")->move("public/bk_" . $this->fname, "bk_" . $this->fname);
		return redirect()->route("hello");
	}


	public function other($msg){
		//$data = Storage::get($this->fname) . PHP_EOL . $msg;
		//Storage::put($this->fname, $data);
		Storage::disk("public")->prepend($this->fname,$msg);
		return redirect()->route("hello");
	}

	public function other(Request $request){
		$data = [
			'msg' => $request->bye,
		];
		return view('hello/index', $data);
	}

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



}
