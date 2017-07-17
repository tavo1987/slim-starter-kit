[![Packagist](https://img.shields.io/badge/Packagist-v4.0.0-orange.svg?style=flat-square)](https://packagist.org/packages/tavo1987/mini-framework)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square)](https://packagist.org/packages/tavo1987/mini-framework)

# Mini framework para creación de landing pages
Mini framework para la creación rápida de landing pages en las que se necesite implementar formularios.

## Características
 - Validar formularios, tanto en frontend como el backend (Valitron)
 - Guardar en base de datos a través de eloquent
 - Enviar emails a través del api de sendgrid v3
 - Laravel mix
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
* [Laravel mix](https://laravel.com/docs/5.4/mix)
* [Vuejs](https://vuejs.org/)
* [VeeValidate](VeeValidate)
* [Foundation 6.4.1](http://foundation.zurb.com/sites/docs/)
* [Eloquent ORM](https://laravel.com/docs/5.3/eloquent)
* [Twig](http://twig.sensiolabs.org/)
* [Dotenv](https://github.com/vlucas/phpdotenv)
* [Api SendGrid v3](https://github.com/sendgrid/sendgrid-php)
* [Valitron](https://github.com/vlucas/valitron)
* [Whoops](https://github.com/filp/whoops)
* [Laravel Collections](https://laravel.com/docs/5.3/eloquent-collections)
* [Web font loader](https://github.com/typekit/webfontloader)

## Requerimientos
- ` "php": ">=5.6.4"`

## Instalación y Configuración
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
6. Listo! eso es todo

## Compilando assets
Para la compilación de los assets hemos seleccionado laravel mix, el cual nos ayuda a través de su api, configurar y ejecutar rápidamente tareas comúnes que hacemos con nuestros archivos js y css. Cabe mencionar que laravel mix trabaja con webpack por debajo.

Para correr laravel mix seguiremos los siguientes pasos:

1. Editar el archivo `webpack.mix.js`y actualizar la opción `proxy : 'mini-framework.dev'` dentro de la configuración se browsersync para poder los cambios en tiempo real sin recargar la página
2. Instalar las depencias ejecuntado en la consola el comando `yarn`
3. compilar mediante las siguientes opciones:
    * `yarn dev` desarrollo
    * `yarn watch` desarrollo y live preview
    * `yarn prod` producción

## Personalización JS
Por defecto el mini framework viene con las depencias de vuejs, foundation, jquery, vee-validate. Pero estas no son abligatorias ya que fácilmente se puede ignorar las mismas y cargar únicamente lo que se necesite y se adapte a tu flujo de trabajo.

Para realizar los camnbios tenemos que modificar el siguiente archivo `resoureces/assets/js/app.js` y comentar lo que no necesitemos.

En cuanto a foundation, unicamente se esta cargando los esencial, si necesitas plugins adicionales como acordiones, slider, etc. se los tiene que requerir manualmente en la siguientes sección
```js
    /**
     * We'll load jQuery and the Foundation framework which provides support
     * for JavaScript based foundation features such as modals and tabs. This
     * code may be modified to fit the specific needs of your application.
     */
    try {
        window.$ = window.jQuery = require('jquery');
        require('foundation-sites/dist/js/plugins/foundation.core.js');
        require('foundation-sites/dist/js/plugins/foundation.util.mediaQuery.js');
        //Example to include aditional plugin
        require('foundation-sites/dist/js/plugins/foundation.accordion.js');
        require('foundation-sites/dist/js/plugins/foundation.util.keyboard.js');
    } catch (e) {}
```

Si estas usando `Vuejs` puedes oraganizar tus componentes dentro de `resources/assets/js/components`, por defecto hay un componente para cargar el formulario con vuejs `Form.vue`

## Personalización SASS
Todos los archivos sass los podemos encontrar en `resources/assets/sass/`, de igual manera se puede personalizar foundation a nuestras necesidades, es decir cambiar sus configuraciones por defecto en `resources/assets/sass/foundation/_seetings.scss` e incluir plugins adicionales, ya que de igual forma que con los js se carga únicamente ciertos componentes de foundation, descomentado los `ìnlcudes` dentro de `resources/assets/sass/foundation/_modules.scss`, podemos cargar componentes adicionales. Si no se va a usar foundation podemos eliminarlo comentando o borrando la siguiente sección dentro de nuestro archivo `resources/assets/sass/app.scss`:

```css
    //Foundation
    //@import "foundation/settings";
    //@import "node_modules/foundation-sites/scss/foundation";
    //@import "foundation/modules";
```

## Home
Al abrir el proyecto se podrá observar dos formularios, uno usando vuejs y otro sin vuejs, seleccionar el que se desee y borrar el otro para evitar errores.

## Fuentes
Para cargar fuentes personalizadas por favor usar el archivo `app.js` y edita la siguiente sección

```js
/**
 * We'll load custom fonts with web font loader to improve page speed
 */

import WebFont from 'webfontloader';

WebFont.load({
    google: {
        families: ['Open Sans:300,400,700']
    }
});

```
De esta menera mejoramos el tiempo de carga, mas información en [web font loader](https://github.com/typekit/webfontloader)

    nota: Recordar actualizar la fuente en el archivo de configuración sass `resources/assets/sass/lib/_settings.scss`

## Vulnerabilidades de Seguridad o Errores

Si descubres una vulnerabilidad de seguridad dentro de este mini framework, envía un correo electrónico a
tavo198718@gmail.com. Todas las vulnerabilidades de seguridad serán tratadas los más rápido posible.
o abre un issue para especificar el error.

## Licencia

Mini-framework es un software de código abierto bajo licencia [MIT license](http://opensource.org/licenses/MIT).
