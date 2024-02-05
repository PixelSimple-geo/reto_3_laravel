<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerveza Killer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
        }

        article {
            margin-bottom: 20px;
        }

        h1 {
            font-size: 1.5em;
        }

        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<article>
    <h1>Información de contacto</h1>
    <p><strong>Correo electrónico:</strong> {{$data["email"]}}</p>
    <p><strong>Dirección:</strong> {{$data["address"]}}</p>
    <p><strong>Teléfono:</strong> {{$data["telefono"]}}</p>
    <p><strong>Comentario:</strong> {{$data["commentary"]}}</p>
</article>
</body>
</html>
