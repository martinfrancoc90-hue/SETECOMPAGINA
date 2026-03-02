<!DOCTYPE html>

<html lang="es">
<head>
    <title>Mensaje de la Pagina Web</title>
</head>
<body>
    <p style="margin-bottom: 20px"><strong>Recibiste un Mensaje de: </strong> {{ $msg['name'] }}</p>
    <p style="margin-bottom: 20px"><strong>Correo electrónico: </strong>{{ $msg['email'] }}</p>
    <p style="margin-bottom: 20px"><strong>Celular: </strong>{{ $msg['cellphone'] }}</p>
    <p><strong>Contenido:</strong></p>
    <p>{{ $msg['message'] }}</p>
</body>
</html>
