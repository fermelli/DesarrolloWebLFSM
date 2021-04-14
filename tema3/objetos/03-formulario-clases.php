<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Persona</title>
</head>

<body>
  <h1>Datos Profesor</h1>
  <form action="./02-usar-clases.php" method="post">
    <label for="names">Nombres</label>
    <input type="text" name="names" id="names"><br>
    <label for="surnames">Apellidos</label>
    <input type="text" name="surnames" id="surnames"><br>
    <label for="profession">Profesión</label>
    <input type="text" name="profession" id="profession"><br>
    <label for="identity-card">Cédula de Identidad</label>
    <input type="text" name="identity-card" id="identity-card"><br>
    <input type="submit" value="Imprimir Datos">
  </form>
</body>

</html>