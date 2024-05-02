# Desplegament Web

Se trata de una pequeña aplicación web desarrollada en PHP, dicha aplicación está conectada a una base de datos mysql. En ella se muestran disntintos productos que se encuentran a la venta en una tienda ficticia. Los productos que se muestran se pueden editar y eliminar, además también se pueden añadir nuevos productos.


## Pre Requisitos

¿Que requisitos de software son necesarios para llevar a cabo este proyecto?

```
PHP instalado
IDE que trabaje con PHP(NetBeans, VS code...)
Servidor de aplicaciones como Tomcat
Gestor de base de datos mysql
Git
```

### Instalación

Para instalarte el proyecto deves seguir los siguientes pasos:

```
Hacer un fork del repositorio
Clonar el repositorio 
Guardar el proyecto en una carpeta
Abrirlo desde un IDE que siga los requisitos comentados
```

### Archivos del proyecto

Lo que encontrarás al abrir el proyecto serán los siguientes archivos:

* **Principal.php**: Se trata de la página principal del proyecto, que nos muestra todos los productos disponibles en la base de datos, y nos da la opción de modificar y eliminar cada uno de los productos, así como añadir un nuevo producto.

* **Modificar.php**: Se trata de la página a la que nos redirigiremos desde la principal cuando pulsemos el botón modificar, recibe el id del producto a modificar ay nos pide los datos a modificar.

* **Eliminar.php**: Se trata de la página a la que nos redirigiremos desde la principal cuando pulsemos el botón de Eliminar, recibe el Id del producto a eliminar y nos solicita confirmación

* **Nou.php**: Al pulsar el botón nou producte nos permite rellenar todos los datos del nuevo producto (Nombre, precio, descripción y categoría) y al pulsar aceptar genera el nuevo producto y le asigna un id automáticamente.

* **Connexió.php**: Permite la conexión con la base de datos, evitando tener que repetir el código en cada una de las otras págínas, basta con instanciarla.

* **Header.php**:Crea el encabezado general, evitando tener que repetir el código en cada una de las otras págínas, basta con instanciarlo.

* **Footer.php**: Crea el pie de página general, evitando tener que repetir el código en cada una de las otras págínas, basta con instanciarlo.


## Autores

* **Carles Canals** - *Base del proyecto* - [CarlesCanals](https://github.com/CarlesCanals/Desplegament-web)

* **Marta Gómez** - *Archivos Nou y Eliminar* - [mrtagm](https://github.com/mrtagm/Desplegament-web)

