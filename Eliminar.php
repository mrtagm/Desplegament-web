<?php

require_once('Connexio.php');
require_once('Header.php');

class Elimina {
    
    // Método para mostrar el formulario de eliminación del producto
    public function mostrarFormulario($id) {
        // Verifica si el ID del producto es válido
        if (!isset($id) || !is_numeric($id)) {
            echo '<p class="alert alert-danger">ID de producte no vàlid.</p>';
            return;
        }

        // Obtiene la conexión a la base de datos
        $conexionObj = new Connexio();
        $conexion = $conexionObj->obtenirConnexio();

        // Consulta para obtener la información del producto
        $consulta = "SELECT id, nom, descripció, preu, categoria_id
                     FROM productes
                     WHERE id = $id";
        $resultado = $conexion->query($consulta);

        // Verifica si se encontró el producto
        if ($resultado && $resultado->num_rows > 0) {
            $producto = $resultado->fetch_assoc();

            // Imprime la estructura HTML del formulario de eliminación
            echo '<!DOCTYPE html>
                  <html lang="es">
                  <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <title>Eliminar producte</title>
                    <!-- Enlace a Bootstrap desde su repositorio remoto -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
                  </head>
                  <body>
                    <div class="container mt-5" style="margin-bottom: 200px">
                        <h2>Eliminar producte</h2>
                        <hr>
                        <form action="Eliminar.php" method="POST">
                            <!-- Campo oculto con el ID del producto -->
                            <input type="hidden" name="id" value="' . $producto['id'] . '">
                            <p>Estàs segur que vols eliminar el producte ' . $producto['nom'] . '?</p>
                            <div class="mb-3">
                                <!-- Botón para confirmar la eliminación -->
                                <input type="submit" value="Eliminar" class="btn btn-danger">
                                <!-- Enlace para cancelar la acción y volver a la página principal -->
                                <a href="Principal.php" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>';

            // Incluye el pie de página
            require_once('Footer.php');
        } else {
            echo '<p class="alert alert-danger">No si ha trobat el producte.</p>';
        }

        // Cierra la conexión a la base de datos
        $conexion->close();
    }

    // Método para eliminar el producto
    public function eliminarProducto($id) {
        // Verifica si el ID del producto es válido
        if (!isset($id) || !is_numeric($id)) {
            echo '<p class="alert alert-danger">ID de producte no vàlid.</p>';
            return;
        }

        // Obtiene la conexión a la base de datos
        $conexionObj = new Connexio();
        $conexion = $conexionObj->obtenirConnexio();

        // Consulta para eliminar el producto
        $consulta = "DELETE FROM productes WHERE id = $id";

        if ($conexion->query($consulta) === TRUE) {
            // Mostrar mensaje de éxito
            echo '<p class="alert alert-success">Producte eliminat correctament.</p>';
        } else {
            // Muestra un mensaje de error si la consulta falla
            echo '<p class="alert alert-danger">Error al eliminar el producte: ' . $conexion->error . '</p>';
        }

        // Cierra la conexión a la base de datos
        $conexion->close();
    }
}

// Obtener el ID del producto a eliminar
$idProducto = isset($_GET['id']) ? $_GET['id'] : null;

// Crear una instancia de la clase Elimina
$elimina = new Elimina();

// Verificar si se ha enviado el formulario de confirmación de eliminación
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idProducto = isset($_POST['id']) ? $_POST['id'] : null;
    // Llamar al método para eliminar el producto
    $elimina->eliminarProducto($idProducto);
} else {
    // Mostrar el formulario de eliminación
    $elimina->mostrarFormulario($idProducto);
}

?>
