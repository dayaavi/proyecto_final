# PLANTILLA MVC PHP

-Explicación de MVC (Modelo-Vista-Controlador)-:
Para evitar inserción de diferente código (PHP, HTML …) en un mismo documento, se diseñó el patrón MVC. El objetivo es dividir el proyecto en tres grandes partes:

-Modelo: Interactúa con la base de datos. Recibe, almacena y recupera datos para el usuario.
-Vista: Muestra información al usuario e integra los datos del controlador.
-Controlador: Envía y recibe datos del modelo y pasa a la vista.


-La estructura-:
Esta sería la estructura de nuestra plantilla con el patrón MVC:

La carpeta "webroot" es el único directorio al que puede acceder el usuario.
"Router.php", "dispatcher.php", "request.php", ".htaccess" son parte del sistema de enrutamiento.
"Config": toda la configuración que necesita nuestra web 

-Arquitectura global-:
Al acceder a nuestro sitio web, el usuario será redirigido automáticamente a "webroot/index.php" gracias a los archivos .htaccess.
El primero redireccionará al usuario al directorio "webroot".
Y el segundo lo redireccionará al archivo "index.php". Hay que tener en cuenta que almacenamos el parámetro (p = $1).

El archivo "index.php" requiere todos los archivos que necesitaremos para la creación de instancias del "dispatcher". Después de crear una instancia de la clase Dispatch, estamos listos para configurar nuestra lógica de enrutamiento.

-Sistema de enrutamiento-:
-"request.php": El objetivo de este archivo es obtener la url solicitada por el usuario.
-"router.php": El enrutador toma la url capturada por "request.php" y divide la url en 3 partes diferentes en el carácter "/":
Estas entradas serán manejadas por el "dispatcher". El "dispatcher" está haciendo el mismo trabajo que un controlador de tráfico aéreo. Cuando se carga una nueva solicitud, selecciona el controlador y la acción con parámetros. Entonces, con un solo método (dispatch ()), podemos lanzar toda esta lógica de enrutamiento:

"http://dominio/carpeta_proyecto/controlador/accion/parametro"

-Base de datos-:
Nuestro "Modelo" va a manejar la solicitud a nuestra base de datos. Como tendremos que llamar a nuestra base de datos varias veces, crearemos una instancia única para que sea más eficiente. Esto se realiza mediante el modo "singleton".

-Controlador-:
El método "set()"" combinará todos los datos que queremos pasar a la vista.
El método "render()"" importará los datos con el extracto del método y luego cargará el diseño solicitado en el directorio de "Vistas". Además, esto nos permite tener un diseño para evitar la repetición de HTML en nuestras vistas.