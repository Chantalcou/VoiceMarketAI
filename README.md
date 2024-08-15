# VoiceMarketAI

## Descripción

VoiceMarketAI es un marketplace innovador que permite a los usuarios interactuar con el sitio web mediante comandos de voz. Utilizando un botón de reconocimiento de voz, los usuarios pueden ejecutar funcionalidades como agregar productos al carrito, buscar productos y realizar otras acciones mediante la integración de inteligencia artificial.

## Instalación

Este proyecto utiliza HTML, CSS, jQuery y PHP. Para configurar y ejecutar el proyecto localmente, sigue estos pasos:

1. **Clona el repositorio:**

   ```bash
   git clone https://github.com/Chantalcou/VoiceMarketAI


2. **Navega al directorio del proyecto:**
    
    cd VoiceMarketAI

3. **Configurar un servidor local:**

    Utiliza herramientas como XAMPP, WAMP o MAMP para configurar un servidor local que pueda ejecutar PHP y gestionar la base de datos.


4. **Instalar dependencias de JavaScript:**

    Incluir jQuery en tu proyecto
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

5. **Configurar base de datos:**

    Para que el proyecto funcione correctamente, necesitas configurar la base de datos y asegurar que tu aplicación pueda conectarse a ella. Sigue estos pasos para configurar la base de datos:

    1. **Crear la base de datos:**

        - Abri phpMyAdmin en `http://localhost/phpmyadmin`.
        - Crea una nueva base de datos con el nombre `products` .

    2. **Configurar los detalles de conexión:**

        - **Archivo `config.php`:**

        El archivo `config.php` contiene las constantes necesarias para la conexión a la base de datos. Asegurate de que estas constantes coincidan con los detalles de tu entorno local. Dejo un ejemplo de cómo debería verse:

     ```php
     <?php
     if (!defined('SERVIDOR')) {
         define('SERVIDOR', 'localhost');
     }

     if (!defined('USUARIO')) {
         define('USUARIO', 'root');
     }

     if (!defined('PASSWORD')) {
         define('PASSWORD', '');
     }

     if (!defined('DB')) {
         define('DB', 'my_database');
     }
     ?>
     ```

     - `SERVIDOR`: Especifica el servidor de la base de datos (por defecto, `localhost`).
     - `USUARIO`: El nombre de usuario para acceder a la base de datos (por defecto, `root`).
     - `PASSWORD`: La contraseña del usuario de la base de datos (vacío por defecto).
     - `DB`: El nombre de la base de datos (debería coincidir con el nombre que creaste en phpMyAdmin).

   - **Archivo `conexion.php`:**

     El archivo `conexion.php` utiliza las constantes definidas en `config.php` para establecer una conexión con la base de datos. Verifica que el archivo se vea como el siguiente ejemplo:

     ```php
     <?php
     require_once 'config.php';

     $servidor = "mysql:dbname=" . DB . ";host=" . SERVIDOR;

     try {
         $pdo = new PDO($servidor, USUARIO, PASSWORD, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);
     } catch (PDOException $e) {
         error_log("Error de conexión: " . $e->getMessage());
         exit(json_encode(['error' => 'Error de conexión a la base de datos']));
     }
     ?>
     ```

     - Asegúrate de que `DB` y `SERVIDOR` coincidan con los valores definidos en `config.php`.
     - Si encontras errores de conexión, revisa los detalles en `config.php` y asegurate de que la base de datos `my_database` existe en phpMyAdmin.

    Con estos pasos, deberías tener tu base de datos configurada y lista para usar con el proyecto. Si encontras algún problema, verifica los archivos de configuración y asegúrate de que los detalles de conexión sean correctos.


Esta versión incluye toda la información necesaria y asegura que los pasos sean claros para quienes configuren el proyecto.
