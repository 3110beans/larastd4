<!doctype html>
<html lang=ja>
<head>
<title>Index</title>
</head>
<body>
<style>
th {background-color:red; padding:10px;}
td {background-color:#eee; padding:10px;}
</style>
<h1>Hello/Index</h1>
<a href="/storage/files/uploaded.jpeg">this</a>

<p>
{{$msg}}
</p>
{{$data}}

{{--
@foreach($data as $item)
<li>{{$item}}</li>
@endforeach

<p>
<a href="/hello/other">download </a>
</p>


<form action="/hello/other" method="post" enctype="multipart/form-data">
	@csrf
	<input type="file" name="file">
	<input type="submit">
</form>

<hr>


<form action="/hello" method="post">
	@csrf
	<div>NAME:<input type="text" name="name" value="{{old('name')}}"></div>
	<div>MAIL:<input type="text" name="mail" value="{{old('mail')}}"></div>
	<div>TEL:<input type="text" name="tel" value="{{old('tel')}}"></div>
	<input type="submit">
</form>
<hr>
<ol>
@for($i=0;$i<count($keys);$i++)
<li>
{{$keys[$i]}}:{{$values[$i]}}
</li>
@endfor
</ol>
--}}

</body>
</html>

