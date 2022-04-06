# Solución Ejercicio 2

[TOC]

## Bind mount para compartir datos

Para este ejercicio creo la carpeta, con su correspondiente archivo "index.html", que se solicitan desde el enunciado de la tarea. El contenido es el siguiente:

![image-20220406211701799](solucion_ej2.assets/image-20220406211701799.png)

### Arrancar contenedores

Para arrancar el primer contenedor utilizando la imagen "php:7.4-apache" utilizo el siguiente comando:

```shell
sudo docker run -d -p 8181:80 -it --name c1 -v "$(pwd)"/saludo:/var/www/html php:7.4-apache
```

![image-20220406210336307](solucion_ej2.assets/image-20220406210336307.png)

Para arrancar el segundo contenedor, desde la misma imagen, utilizo el siguiente comando:

```shell
sudo docker run -d -p 8282:80 -it --name c2 -v "$(pwd)"/saludo:/var/www/html php:7.4-apache
```

![image-20220406210602850](solucion_ej2.assets/image-20220406210602850.png)

### Acceso a index.html

Utilizo la URL "http://localhost:8181/" para averiguar si puedo acceder sin problemas al archivo "index.html" desde el contenedor con nombre "c1":

![image-20220406210819107](solucion_ej2.assets/image-20220406210819107.png)

Utilizo ahora el puerto "8282", "http://localhost:8282/" para averiguar si puedo acceder sin problemas al mismo archivo "index.html" desde el contenedor con nombre "c2":

![image-20220406210920297](solucion_ej2.assets/image-20220406210920297.png)

### Modificando index.html

Modifico el archivo "index.html" desde mi host. Su contenido ahora es el siguiente:

![image-20220406211110567](solucion_ej2.assets/image-20220406211110567.png)

### Accediendo nuevamente a index.html

Accedo al contenedor con nombre "c1" a través del puerto "8181":

![image-20220406211219430](solucion_ej2.assets/image-20220406211219430.png)

Accedo al contenedor con nombre "c2" a través del puerto "8282":

![image-20220406211248750](solucion_ej2.assets/image-20220406211248750.png)

Todo funciona correctamente.

### Borrando contenedores utilizados

Para borrar los contenedores, primero debo detenerlos. Para ello, ejecuto el siguiente comando:

```shell
sudo docker stop c1 c2
```

![image-20220406211456130](solucion_ej2.assets/image-20220406211456130.png)

Finalmente, ejecuto el siguiente comando para borrarlos:

```shell
sudo docker rm c1 c2
```

![image-20220406211531884](solucion_ej2.assets/image-20220406211531884.png)

Para verificar que efectivamente han sido eliminados, ejecuto como último comando:

```shell
sudo docker ps
```

![image-20220406211614429](solucion_ej2.assets/image-20220406211614429.png)

Como se puede observar, ya no existe ningún contenedor.