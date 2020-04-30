# siesue-indicadores
Repositorio Cambios Realizados Sistema Registro Indicadores SIESUE. DPI - CONARE

# Implementación Nuevas Funcionalidades (28/04/2020)

## Nueva función userinformationuniversity:

Esta función fue creada para invocar al objeto tipo vista de la Base de Datos **"siesue"**  llamada **"users_per_universities"**. Se hace una invocación directa a dicho elemento y se construye la consulta SQL. Esta se ubica en la ruta: **"src/Controller/UniversityusersController.php"**.

## Nuevos objetos Base de Datos:

Se crean las tablas **"user_roles"** y la vista **"users_per_universities"** dentro de la Base de Datos siesue para efectos de poder hacer la unión de las tablas "users" y "universities". Se crea también la función **"FORMATEAR_FECHAS"** para así poder formatear los campos de fechas incluidos en la tabla "users".

## Nuevas Entidades y Tablas:

A nivel del CakePHP se crean las Entidades y Tablas de la tabla "user_roles" y la vista "users_per_universities". Éstas se ubican dentro de las siguientes rutas:

- src/Model/Entity/Userroles.php
- src/Model/Entity/Userperuniversities.php
- src/Model/Table/UserrolesTable.php
- src/Model/Table/UserperuniversitiesTable.php

## Cambios en Vistas:

Se crea una nueva vista llamada **"userinformationuniversity"** la cual se liga con la nueva función incluida en el controlador de "UniversityusersController.php". La nueva vista se ubica en la ruta **"src/Template/Universityusers/userinformationuniversity.ctp"**.

A nivel de la vista index.ctp ubicada en la ruta **"src/Template/Universityusers/Universityusers.index.ctp"** se agrega una función en javascript que permite obtener mediante expresiones regulares la información de la URL de la página. Esta función es necesaria para poder usarla como base dentro de la función **"eliminarUsuario"** y así poder concatenarle al final la invocación a la función **"delete"** desde el controlador **Universityusers**.

```javascript
  /**
   * Función que extrae la primera parte de la url
   * del sitio Web activo antes de la referencia a la vista.
   */
  function extractUrlSite(){

    //Definimos la expresión regular
    const regex = /http\:{1}\/{2}.+\/{1}/gm;

    //Obtenemos la URL completa de la página activa
    const urlString = window.location.href;

    //Definimos variables auxiliares
    let m, mainUrl;

    //---------------------------------------------------------

    //Recorremos el resultado de la aplicación
    //de la expresión regular sobre el texto de la URL
    while ((m = regex.exec(urlString)) !== null) {
      
      // Mientras vamos avanzando sobre los caracteres
      // que cumplen con el detalle de la expresión regular
      if (m.index === regex.lastIndex) {

        //Vamos incrementando el avance sobre los caracteres
        regex.lastIndex++;

      }

      // Seguidamente recorremos los grupos de textos que
      // concuerdan con la expresión regular
      m.forEach((match, groupIndex) => {
        // Guardamos el primer grupo dentro de la
        // variable "mainUrl" ya que ahí se ubica
        // la información que nos interesa
        mainUrl = match;
      });

    }

    //Retornamos el texto de la URL del sitio antes
    //de la referencia al nombre de la vista
    return mainUrl;

  }

```

Para esta función se usó como base la página [regex101](https://regex101.com) para generar el código javascript para la expresión regular.
