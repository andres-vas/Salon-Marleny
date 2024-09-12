<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Salón</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>

    <div class="contenedor-app">
        <!-- ---COLOCAREMOS LA IMAGEN QUE SE UTILIZARA EN CSS--- -->
        <div class="imagen"></div>

        <!-- ---SE MANDA A LLAMAR EL CONTENIDO DE LA APLICACION--- -->
        <div class="app">
            <?php echo $contenido; ?>
        </div>
    </div>




    
            
</body>
</html>