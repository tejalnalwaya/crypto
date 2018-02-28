<html>	
<head>
  <meta charset="utf-8">
    <title>Home page</title>
		<style>
		
		body {
			font-family: "HelveticaNeue-Light","Helvetica Neue Light","Helvetica Neue",Helvetica,Arial,"Lucida Grande",sans-serif;
			color:white;
			font-size:12px;
			background:#333 url(/images/classy_fabric.png);
}
		#encrypt{
				padding:5px 20px;
			border:1px solid rgba(0,0,0,0.4);
			text-shadow:0 -1px 0 rgba(0,0,0,0.4);
			box-shadow:
					inset 0 1px 0 rgba(255,255,255,0.3),
					inset 0 10px 10px rgba(255,255,255,0.1);
			border-radius:0.3em;
			background:#0184ff;
			color:white;
			font-weight:bold;
			cursor:pointer;
			font-size:24px;
}
		#decrypt{
				padding:5px 20px;
			border:1px solid rgba(0,0,0,0.4);
			text-shadow:0 -1px 0 rgba(0,0,0,0.4);
			box-shadow:
					inset 0 1px 0 rgba(255,255,255,0.3),
					inset 0 10px 10px rgba(255,255,255,0.1);
			border-radius:0.3em;
			background:#48ea48;
			color:white;
			font-weight:bold;
			cursor:pointer;
			font-size:24px;
}

		#logout{
				padding:5px 20px;
			border:1px solid rgba(0,0,0,0.4);
			text-shadow:0 -1px 0 rgba(0,0,0,0.4);
			box-shadow:
					inset 0 1px 0 rgba(255,255,255,0.3),
					inset 0 10px 10px rgba(255,255,255,0.1);
			border-radius:0.3em;
			background:#abc932;
			color:white;
			font-weight:bold;
			cursor:pointer;
			font-size:24px;
}
.d{
	border:0px solid red;
	width:600px;
	height:400px;
	margin-top:100px;
}
	
		</style>
</head>
<body>
	<center><h1>Share Your Files....</h1>
	<div class="d">
		<form action="encrypt.html" method="post">
				<input type="submit" name="encrypt" id="encrypt" value="Encrypt">
		</form>
		<form action="decrypt.html" method="post">
				<input type="submit" name="decrypt" id="decrypt" value="Decrypt">
		</form>
		<form action="login.html" method="post">
				<input type="submit" name="logout" id="logout" value="Log Out">
		</form>
	</div></center>
	
</body>
</html>