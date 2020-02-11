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

</body>
</html>

