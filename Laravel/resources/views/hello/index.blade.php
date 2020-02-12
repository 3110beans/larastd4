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
<h1>Hello/Index(modified 9)</h1>

<p>
{!! $msg !!}
</p>
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

</body>
</html>

