<!doctype html>
<html lang=ja>
<head>
<title>Index</title>
<link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
<meta name="csrf-token" content={{ csrf_token() }}>
</head>

<script>

/*
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
*/
</script>
<body style="padding:10px;">

<h1>Hello/Index</h1>
<p> {{$msg}} </p>

<div id="mycomponent"></div>
<script	 src="{{asset('/js/app.js')}}"></script>


</body>
</html>

