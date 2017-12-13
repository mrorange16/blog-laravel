<!DOCTYPE html>
<html>
<head>
	<title>Mensaje recibido</title>
</head>
<body>
<h1>Te responderemis a la brevedad posible</h1>
<p>
	Nombre: {{ $msg->nombre}} <br>
	Email: {{ $msg->email}} <br>
	Mensaje: {{ $msg->mensaje}} 
</p>
</body>
</html>