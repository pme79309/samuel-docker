# Solución Ejercicio 1

[TOC]

## Servidor web

### Descargar imagen

Lo primero que debo hacer es descargar la imagen de Docker que me servirá para generar el contenedor. En este caso, descargo la versión indicada en el enunciado de la tarea: `php:7.4-apache`.

Para ello ejecuto el siguiente comando:

```shell
sudo docker pull php:7.4-apache
```

![image-20220403164035591](C:\Users\Samuel\AppData\Roaming\Typora\typora-user-images\image-20220403164035591.png)

### Crear contenedor

A continuación debo crear el contenedor. En el enunciado de la tarea se especifica que debo darle el nombre "web" y habilitar el puerto "8000" de mi host para que pueda comunicarse a través del puerto "80" del contenedor. Además, debo sincronizar un directorio de mi host con el directorio "/www/html" del contenedor. Para hacerlo todo en uno, ejecuto el siguiente comando:

```shell
sudo docker run -d -p 8000:80 -it --name web -v "$(pwd)"/src:/var/www/html php:7.4-apache
```

![image-20220403173318059](C:\Users\Samuel\AppData\Roaming\Typora\typora-user-images\image-20220403173318059.png)

### Insertar index.html

Actualmente, al acceder a la URL "http://localhost:8000" me da un "Forbidden" ya que, al no existir archivo alguno en el directorio raíz del servidor, no puedo acceder al mismo. Por ello creo un archivo "index.html" en mi directorio local "/src". De esta forma, se sincronizará con el directorio raíz del servidor Apache del contenedor y ya me permitirá ver la página.

El código que inserto en ese archivo es el siguiente:

```html
<h1>HOLA, SOY SAMUEL SOTO LOPEZ</h1>
```

Si ahora acceso al navegador a través de "http://localhost:8000" ya puedo ver mi index.html funcionando sin problema:

![image-20220403173518181](C:\Users\Samuel\AppData\Roaming\Typora\typora-user-images\image-20220403173518181.png)

### Insertar mes.php

A continuación procedo a insertar un archivo "mes.php" que me muestre el mes de la fecha actual. Para ello utilizo el siguiente script PHP:

```php
<?php echo "Mes actual: " . date("F"); ?>
```

Se muestra así:

![image-20220403174152212](C:\Users\Samuel\AppData\Roaming\Typora\typora-user-images\image-20220403174152212.png)

### Borrar contenedor

Antes de borrar el contenedor debo detenerlo, ya que Docker no permite eliminar contenedores que se encuentran en ejecución. Para detener el contenedor "web" utilizo el siguiente comando:

```shell
sudo docker stop web
```

![image-20220403174319399](C:\Users\Samuel\AppData\Roaming\Typora\typora-user-images\image-20220403174319399.png)

Finalmente, utilizo este otro comando para eliminar el contenedor:

```shell
sudo docker rm web
```

![image-20220403174401816](C:\Users\Samuel\AppData\Roaming\Typora\typora-user-images\image-20220403174401816.png)

Para confirmar que he borrado el contenedor correctamente, ejecuto el siguiente comando, que me lista todos los contenedores que tengo en el sistema:

```shell
sudo docker ps
```

![image-20220403174529246](C:\Users\Samuel\AppData\Roaming\Typora\typora-user-images\image-20220403174529246.png)

Como se puede apreciar, ya no existe dicho contenedor.