<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holi</title>
</head>
<body>
   <h1>BLOG</h1>
   @foreach ($categoria as $categoria)
       <h3> {{ $categoria->nombre_categoria }} </h3>
   @endforeach
</body>
</html>