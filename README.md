# NUEVA PAGINA Y CONTENIDO ADMISIONES-UNIVALLE

Este archivo es un manual para saber que modificaciones y nuevas funciones tiene la paginas de univalle


## index.php

[Aquí](https://github.com/andresmv94/pagina-admisiones/pull/1/files) puedes ver los cambios que se hicieron apra que un index.php (en este caso la pagina de interior pregrado cali) funcione con los nuevos estilos se borran y modifican algunas cosas dentro de este. ver y aplicarlo en otros index.php de las paginas secundarias de admisiones


## controler.php

Los archivos controler.php se modifican especialmente para el uso del nuevo editor de manuales y su forma de rederizar contenido:

## > como mostrar el modal editor:

El modal editor aparecerá si en la funcion "ckeditorScript" ya conocida, en su apartado de "javascript" enviamos un segundo parametro **slug** que es el slug enviado a ajaxHeader es decirel parametro que envias desde el mostrarcontenido(slug,boolean) que ya conocemos dentro de cada boton del menú.

*Uso:*

```
$javascript = ckEditorScript('javascript','manual'); // add second parameter

```
Con este segundo parametro enviado, la función ckEditorScript ya sabe que debe de abrir el ckEditor dentro de un modal y que cuando el modal se cierre hacemos refresh al contenido de la página.

**Ahora debemos decirle al contenido de esa sección que no mustre el contenido como esta en el ckEditor si no verificando etiquetas:**

* Despues de consultar la base de datos y capturar lo que vamos a mostrar en pantalla debemos crear una variable (puede ser llamada $contentPro) que contenga la nueva forma de renderizar contenido usando la funcion **renderLongContent** que recibe como parametro esa data ckeditor de la base de datos ($data->datos) y despues pasa *$contentPro* por el **html_entity_decode**:

*Uso:*

```
 ...
  $variable = $data->datos;
  $variable = html_entity_decode($variable);
  // now we have to send this variable to new function render firts
+++ADD_THIS_LINE: $contentPro = renderLongContent($variable);
+++ADD_THIS_LINE: $contentPro = html_entity_decode($contentPro);
 ...
```
* Ahora debemos agregar este *$contentPro* en la etiqueta <div id="midiv"> que tenemos ya dentro de *$paginahtml* y asi vamos a renderizar contenido con estilos y etiquetas independientes del ckeditor.

*Uso:*

```
    ...
    $paginahtml = <<<CONTENIDO

    $btnEdicion

           <div id="midiv">
+++ADD_THIS_LINE:	$contentPro
           </div>

           $login

    ...
```

* Por ultimo elimina la linea que renderiza el contenido del ckeditr dentro de <div id="midiv">, con esto evitamos que se muestre el contenido plano.

*Borrar:*

```
    ...
    <script>

              var datos =  `$variable`;
--- DELETE_THIS_LINE: $("#midiv").html(datos);
              var editor_usuario;
    ...
```

# COMO CREAR ETIQUETAS

 Existen 4 etiquetas para contenido, 3 de estilos y 1 de pasos y dentro de pasos tenemos 1 para ir generando paso por paso:

 * Sección blanca o principal: ***@CONTENT@[#1#]***
 * Sección blanca con punto o secundaria: ***@CONTENT@[#2#]***
 * sección gris o terciaria ***@CONTENT@[#3#]***
 * Sección de pasos: ***[_ STEPS_]*** Se puede convinar con cualquier sección en la que la queramos renderizar y se concatena con la etiqueta del primer paso ***@STEP@titulo_del_paso@STEP_CONTENT@***:

-----> Si queremos  que se renderice en la sección 1 hacemos lo siquiente:

    @CONTENT@[#1#][_STEPS_]@STEP@titulo_del_paso@STEP_CONTENT@

-----> Si queremos  que se renderice en la sección 2 hacemos lo siquiente:

    @CONTENT@[#2#][_STEPS_]@STEP@titulo_del_paso@STEP_CONTENT@

-----> Si queremos  que se renderice en la sección 3 hacemos lo siquiente:

    @CONTENT@[#3#][_STEPS_]@STEP@titulo_del_paso@STEP_CONTENT@

#### Nota: no es necesario poner el número del paso ni repetir el titulo del paso dentro del contenido ya que la funcion lo hace por si solo

*Uso:*
```
TITULO PRINCIPAL

@CONTENT@[#3#]

Esto es contenido que quise poner en una sección 3

@CONTENT@[#1#]

Ademas tambien quise luego de eso poner contenido en sección 1

@CONTENT@[#2#][_STEPS_]@STEP@Este es el titulo del paso 1@STEP_CONTENT@

Este es el contenido del paso numero 1, y a continuación se ve como se agrega el paso 2

@STEP@Este el es paso numero dos@STEP_CONTENT@

Y este es el paso final, que viene siendo el paso 2

@CONTENT@[#1#]

Por ultimo quise tambien agregar contenido en una sección 1

```

## Resultado:

![https://admisiones.univalle.edu.co/new/imagenes/SCREEN_TUTO.png](https://admisiones.univalle.edu.co/new/imagenes/SCREEN_TUTO.png)