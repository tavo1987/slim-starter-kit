[![Packagist](https://img.shields.io/badge/Packagist-v4.0.0-orange.svg?style=flat-square)](https://packagist.org/packages/tavo1987/mini-framework)
[![license](https://img.shields.io/github/license/mashape/apistatus.svg?style=flat-square)](https://packagist.org/packages/tavo1987/mini-framework)

# Slim Starter Kit (No usar Obsoleto)

Este un kit de inicio rápido para desarrolar landings o pequeñas aplicaciones usando el framework Slim 3.0,
con una estructura muy parecida a Laravel.

    nota: Documentación en progreso

## Características

- Validaciones
- Emails
- Laravel mix
- Migraciones
- Controladores
- Entidadades o Modelos mediante el uso de Eloquent
- Vistas usando el motor de plantillas de twig
- Templates bases para enviar emails
- url amigables
- Fácil instalación mediante composer
- Módulo Básico de Autenticación
- Middlewares
- Soporte para CSRF
- Sesiones
- Mensajes tipo flash

## Herramientas y Tecnologías utilizadas

- [Slim 3](https://www.slimframework.com/docs/)
- [Sass](http://sass-lang.com/)
- [Laravel mix](https://laravel.com/docs/5.4/mix)
- [Vuejs](https://vuejs.org/)
- [VeeValidate](VeeValidate)
- [Foundation 6.4.1](http://foundation.zurb.com/sites/docs/)
- [Tailwincs](https://tailwindcss.com/docs/what-is-tailwind/)
- [Eloquent ORM](https://laravel.com/docs/5.3/eloquent)
- [Twig](http://twig.sensiolabs.org/)
- [Dotenv](https://github.com/vlucas/phpdotenv)
- [Swift Maile](https://swiftmailer.symfony.com/)
- [Valitron](https://github.com/vlucas/valitron)
- [Whoops](https://github.com/filp/whoops)
- [Laravel Collections](https://laravel.com/docs/5.3/eloquent-collections)
- [Web font loader](https://github.com/typekit/webfontloader)
- [Phinx](https://phinx.org/)
- [Laravel migrations](https://laravel.com/docs/5.6/migrations)

## Helpers

    * dd()
    * dump()
    * collect()
    * SendEmail()
    * parseUrl()

## Requerimientos

- ` "php": ">=5.6.4"`

## Instalación y Configuración

1. Ejecutar el siguiente comando para crear el proyecto:
   - `composer create-project tavo1987/mini-framework project-name`
2. Crear base de datos para guardar datos del formulario
3. Configurar los datos correctos en el archivo `.env`
4. Ejecutar el siguiente comando para crear las tablas por defecto `users`, `leads` y `migrations`:
   - `vendor/bin/phinx migrate`
5. Seleccionar el idioma de los mensajes de valitron mediante la variable `VALITRON_LANG`
   este puede tener los siguiente valores `en` or `es` por defecto esta en inglés
6. Listo! eso es todo

## Compilando assets

Para la compilación de los assets hemos seleccionado laravel mix, el cual nos ayuda a través de su api, configurar y ejecutar rápidamente tareas comúnes que hacemos con nuestros archivos js y css. Cabe mencionar que laravel mix trabaja con webpack por debajo.

Para correr laravel mix seguiremos los siguientes pasos:

1. Editar el archivo `webpack.mix.js`y actualizar la opción `proxy : 'mini-framework.dev'` dentro de la configuración se browsersync para poder los cambios en tiempo real sin recargar la página
2. Instalar las depencias ejecuntado en la consola el comando `yarn`
3. compilar mediante las siguientes opciones:
   - `yarn dev` desarrollo
   - `yarn watch` desarrollo y live preview
   - `yarn prod` producción

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
  window.$ = window.jQuery = require("jquery");
  require("foundation-sites/dist/js/plugins/foundation.core.js");
  require("foundation-sites/dist/js/plugins/foundation.util.mediaQuery.js");
  //Example to include aditional plugin
  require("foundation-sites/dist/js/plugins/foundation.accordion.js");
  require("foundation-sites/dist/js/plugins/foundation.util.keyboard.js");
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

import WebFont from "webfontloader";

WebFont.load({
  google: {
    families: ["Open Sans:300,400,700"],
  },
});
```

De esta menera mejoramos el tiempo de carga, mas información en [web font loader](https://github.com/typekit/webfontloader)

    nota: Recordar actualizar la fuente en el archivo de configuración sass `resources/assets/sass/lib/_settings.scss`

## Licencia

Mini-framework es un software de código abierto bajo licencia [MIT license](http://opensource.org/licenses/MIT).
