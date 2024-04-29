
<?php

require_once('Connexio.php');
require_once('Header.php');

class Nou {
    
    // Método para mostrar el formulario de nuevo producto
    public function mostrarFormulari() {
        echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Nou producte</title>
            <!-- Enlace a Bootstrap desde su repositorio remoto -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        </head>
        <body>
            <div class="container mt-5" style="margin-bottom: 200px">
                <h2>Nou producte</h2>
                <hr>
                <!-- Formulario para introducir los datos del nuevo producto -->
                <form action="Nou.php" method="POST">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nombre:</label>
                        <input type="text" name="nom" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcio" class="form-label">Descripción:</label>
                        <input type="text" name="descripcio" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="preu" class="form-label">Precio:</label>
                        <input type="number" name="preu" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoría:</label>
                        <select name="categoria" class="form-select" required>
                            <option value="1">Electrónicos</option>
                            <option value="2">Roba</option>
                            <!-- Agrega más opciones según sea necesario -->
                        </select>
                    </div>
                    <!-- Botón de enviar -->
                    <input type="submit" value="Guardar" class="btn btn-primary">
                    <!-- Enlace para cancelar -->
                    <a href="Principal.php" class="btn btn-secondary">Cancelar</a>
                    <a href="Principal.php" class="btn btn-secondary">Volver a Principal</a>
                </form>
            </div>';
        
        // Incluye el pie de página
        require_once('Footer.php');
    }

    // Método para insertar un nuevo producto en la base de datos
    public function nouProducte($nom, $descripcio, $preu, $categoria) {
        // Verifica si todos los campos requeridos están presentes
        if (!isset($nom) || !isset($descripcio) || !isset($preu) || !isset($categoria)) {
            echo '<p>Tots els camps son necessaris.</p>';
            return;
        }

        $conexionObj = new Connexio();
        $conexion = $conexionObj->obtenirConnexio();

        $nom = $conexion->real_escape_string($nom);
        $descripcio = $conexion->real_escape_string($descripcio);
        $preu = $conexion->real_escape_string($preu);
        $categoria = $conexion->real_escape_string($categoria);

        $consulta = "INSERT INTO productes (nom, descripció, preu, categoria_id)
                     VALUES ('$nom', '$descripcio', '$preu', '$categoria')";

        if ($conexion->query($consulta) === TRUE) {
            echo '<p class="alert alert-success">Producte afegit correctament.</p>';
        } else {
            // Muestra un mensaje de error si la consulta falla
            echo '<p class="alert alert-danger">Error al afegir el producte: ' . $conexion->error . '</p>';
        }

        // Cierra la conexión a la base de datos
        $conexion->close();
    }
}

// Crea una instancia de la clase Nou y llama al método mostrarFormulari si no se ha enviado el formulario
$nouProducte = new Nou();
if (!isset($_POST['nom']) || !isset($_POST['descripcio']) || !isset($_POST['preu']) || !isset($_POST['categoria'])) {
    $nouProducte->mostrarFormulari();
} else {
    // Si se ha enviado el formulario, llama al método nouProducte
    $nom = $_POST['nom'];
    $descripcio = $_POST['descripcio'];
    $preu = $_POST['preu'];
    $categoria = $_POST['categoria'];
    $nouProducte->nouProducte($nom, $descripcio, $preu, $categoria);
}

?>

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

