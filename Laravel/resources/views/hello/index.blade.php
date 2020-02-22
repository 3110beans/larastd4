<!doctype html>
<html lang=ja>
<head>
<title>Index</title>
</head>
<style>
th {background-color:red; padding:10px;}
td {background-color:#eee; padding:10px;}
</style>

<script>
function doAction(){
	var id = document.querySelector("#id").value;
	console.log(id);
	var xhr = new XMLHttpRequest();
	xhr.open("GET", "/hello/json/" + id, true);
	xhr.responseType = "json";
	xhr.onload = function(e){
		if(this.status == 200){
			var result = this.response;
			console.log(this);

			document.querySelector('#name').textContent = result.name;
			document.querySelector('#mail').textContent = result.mail;
			document.querySelector('#age').textContent = result.age;
		}
	}
	xhr.send();
}
</script>
<body>

<h1>Hello/Index</h1>

<div>
	<input type="number" id="id" value="1">
	<button onclick="doAction();">Click</button>
</div>
<ul>
<li id="name"></li>
<li id="mail"></li>
<li id="age"></li>
</ul>




<p> {{$msg}} </p>
<table border="1">
@foreach($data as $item)
<tr>
<th> {{$item->id}} </th>
<td> {{$item->name_and_age}} </td>
<td> {{$item->all_data}} </td>
</tr>
@endforeach
</table>
</body>
</html>

