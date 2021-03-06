# Solución Ejercicio 4

[TOC]

## Crear una imagen con un servidor web que sirva un sitio web

Para crear una imagen personalizada basada en otra, primero debo crear un Dockerfile (archivo de texto del mismo nombre). Al mismo nivel, creo una carpeta llamada "blogueroastur" que almacenará los archivos necesarios del sitio web que copiaré en el directorio correspondiente del servidor web para que sea accesible a través del navegador. Voy a ello.

### Archivo Dockerfile

Creo un archivo Dockerfile con las siguientes instrucciones:

```dockerfile
FROM nginx
COPY /blogueroastur /usr/share/nginx/html
```

![image-20220408165957583](solucion_ej4.assets/image-20220408165957583.png)

### Asignando permisos

Debo asignar permisos "755" para que, a la hora de crear la imagen y desplegar el contenedor, no me de problemas posteriormente para acceder a ciertos recursos a través del navegador. Para asignar permisos a esta carpeta utilizo el siguiente comando:

```shell
sudo chmod 755 -R blogueroastur/
```

![image-20220408173453100](solucion_ej4.assets/image-20220408173453100.png)

### Construyendo la imagen

Me posiciono en el directorio raíz que incluye el Dockerfile y la carpeta "blogueroastur" con los archivos del website. Abro una terminal e introduzco el siguiente comando para crear una imagen de Docker con ese Dockerfile:

```shell
sudo docker build -t blogueroastur:1 .
```

![image-20220408170554934](solucion_ej4.assets/image-20220408170554934.png)

### Creando una instancia (contenedor) desde imagen "blogueroastur:1"

Ahora, para poner en marcha una instancia (contenedor) de esta imagen, utilizo el siguiente comando:

```shell
sudo docker run -d -p 8080:80 -it --name blogueroastur blogueroastur:1
```

![image-20220408170810621](solucion_ej4.assets/image-20220408170810621.png)

### Accediendo a la página web a través del navegador

Voy al navegador y entro en "http://localhost:8080" para comprobar si la página web se visualiza correctamente:

![image-20220408174313061](solucion_ej4.assets/image-20220408174313061.png)

### Subir imagen creada a un repositorio en Docker Hub

Tras crear mi cuenta en Docker Hub, debo iniciar sesión desde la terminal, para posteriormente poder subir la imagen. Para iniciar sesión utilizo el siguiente comando:

```shell
sudo docker login
```

![image-20220408180015119](solucion_ej4.assets/image-20220408180015119.png)









Utilizo el siguiente comando para relacionar la imagen de mi repositorio local con el repositorio remoto "blogueroastur" creado previamente desde la web Docker Hub:

```shell
sudo docker tag blogueroastur:1 pme79309/blogueroastur:1
```

![image-20220408175545102](solucion_ej4.assets/image-20220408175545102.png)

A continuación, subo esta imagen a Docker Hub con el siguiente comando:

```shell
sudo docker push pme79309/blogueroastur:1
```

![image-20220408180132247](solucion_ej4.assets/image-20220408180132247.png)

A continuación accedo al sitio web de Docker Hub para verificar que mi imagen ya se ha subido al repositorio "blogueroastur":

![image-20220408180257800](solucion_ej4.assets/image-20220408180257800.png)

Efectivamente, la imagen se encuentra ya en el repositorio remoto de Docker Hub llamado "blogueroastur".
