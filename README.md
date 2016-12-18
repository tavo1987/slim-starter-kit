[![Packagist](https://img.shields.io/badge/Packagist-v3.0.2-orange.svg?style=flat-square)](https://packagist.org/packages/tavo1987/mini-framework)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square)](https://packagist.org/packages/tavo1987/mini-framework)

# Mini framework para creación de landing pages
Mini framework para la creación rápida de landing pages en las que se necesite implementar formularios.

##Características 
 - Validar formularios, tanto en frontend (Abide foundation) como el backend (Valitron) 
 - Guardar en base de datos a través de eloquent
 - Enviar emails a través del api de sendgrid v3
 - Concatenar y minificar archivos js mediante prepros
 - Estructura base para compilar y minificar archivos sass mediante prepros o cualquier task manager
 - Sistema de rutas
 - Controladores
 - Entidadades o Modelos mediante usando eloquent
 - Vistas usando el motor de plantillas de twig
 - Templates bases para enviar emails
 - url amigables mediante `.htaccess`
 - Helper de redirecciones
 - Helper para convertir un array  a una colección mediante laravel collections
 - Helper para limpiar inputs
 - Helper para mostrar vistas
 - Fácil instalación mediante composer

## Herramientas y Tecnologías utilizadas 

* [Php](http://php.net/manual/en/intro-whatis.php)
* [Sass](http://sass-lang.com/)
* [Prepros](https://prepros.io/)
* [Foundation 6.3.0](http://foundation.zurb.com/sites/docs/)
* [Eloquent ORM](https://laravel.com/docs/5.3/eloquent)
* [Twig](http://twig.sensiolabs.org/)
* [Dotenv](https://github.com/vlucas/phpdotenv)
* [Api SendGrid v3](https://github.com/sendgrid/sendgrid-php)
* [Valitron](https://github.com/vlucas/valitron)
* [Whoops](https://github.com/filp/whoops)
* [Laravel Collections](https://laravel.com/docs/5.3/eloquent-collections)

##Requerimientos
- ` "php": ">=5.6.4"`

##Instalación
1. Ejecutar el siguiente comando para crear el proyecto:
    - `composer create-project tavo1987/mini-framework project-name`
2. Crear base de datos para guardar datos del formulario
3. Crear la tabla `leads` en base de datos con los siguientes campos:
    * id - `primary key` auto increment
    * name - `varchar`
    * email - `varchar`
    * date - `datetime`
4. Configurar los datos correctos en el archivo `.env`
5. Seleccionar el idioma de los mensajes de valitron mediante la variable `VALITRON_LANG` 
    este puede tener los siguiente valores `en` or `es` por defecto esta en inglés
5. Listo! eso es todo

## Vulnerabilidades de Seguridad o Errores

Si descubres una vulnerabilidad de seguridad dentro de este mini framework, envía un correo electrónico a 
tavo198718@gmail.com. Todas las vulnerabilidades de seguridad serán tratadas los más rápido posible.
o abre un issue para especificar el error. 

## Licencia

Mini-framework es un software de código abierto bajo licencia [MIT license](http://opensource.org/licenses/MIT).