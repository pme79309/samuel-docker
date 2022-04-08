# Solución Ejercicio 3

[TOC]

## Despliegue de contenedores en red: Adminer y MariaDB

### Creando una red "bridge"

Para crear una red de tipo "bridge" utilizo el siguiente comando:

```shell
sudo docker network create redbd
```

![image-20220407200400588](solucion_ej3.assets/image-20220407200400588.png)

Compruebo que se crea correctamente listando las redes existentes con este comando:

![image-20220407200435950](solucion_ej3.assets/image-20220407200435950.png)

Ahí aparece la red "redbd" creada recientemente.

### Creando contenedores en red

Primero creo el contenedor para el servidor de bases de datos. Dicho contenedor levantará el servidor en el puerto 3306 (que mapearé al mismo puerto de mi host), utilizará volumen de datos persistente y se ejecutará en segundo plano. Lo asigno también a la red "redbd". Para ello, utilizo el siguiente comando:

```shell
sudo docker run --detach --name mariadb -v "$(pwd)"/db:/var/lib/mysql --env MARIADB_DATABASE=prueba --env MARIADB_USER=invitado --env MARIADB_PASSWORD=invitado --env MARIADB_ROOT_PASSWORD=root -p 3306:3306 --network redbd  mariadb:latest
```

![image-20220407201548750](solucion_ej3.assets/image-20220407201548750.png)

Finalmente, creo el contenedor para Adminer (asignado a red "redbd"), utilizando para ello el siguiente comando:

```shell
sudo docker run -p 8080:8080 --name adminer -e ADMINER_DEFAULT_SERVER=mariadb --network redbd adminer
```

![image-20220407202241858](solucion_ej3.assets/image-20220407202241858.png)

### Accediendo a la base de datos desde el navegador

Para acceder a la base de datos "prueba" acudo al navegador, y accedo a la URL "http://localhost:8080", que se corresponde con el servidor del contenedor independiente a la base de datos (servidor web):

![image-20220407205823388](solucion_ej3.assets/image-20220407205823388.png)

Al pulsar sobre "Login" veo lo siguiente:

![image-20220407205850224](solucion_ej3.assets/image-20220407205850224.png)

### Creando nueva base de datos

Para crear una nueva base de datos debo antes iniciar sesión como "root" sin especificar ninguna base de datos en el login:

![image-20220407210821071](solucion_ej3.assets/image-20220407210821071.png)

Pulso en "Login" y la interfaz me muestra un listado de las bases de datos existentes. Creo una nueva desde el enlace "Crear Base de datos":

![image-20220407210908048](solucion_ej3.assets/image-20220407210908048.png)

Al pulsar sobre dicho enlace veo la siguiente pantalla, en la que introduzco un nombre para la nueva base de datos y una codificación de caracteres:

![image-20220407211009136](solucion_ej3.assets/image-20220407211009136.png)

Pulso en "Guardar" y me muestra un mensaje en el que se indica que se ha creado la base de datos correctamente:

![image-20220407211045928](solucion_ej3.assets/image-20220407211045928.png)

Para asegurarme vuelvo al listado de bases de datos, y efectivamente la veo creada junto al resto:

![image-20220407211128014](solucion_ej3.assets/image-20220407211128014.png)

### Listando bases de datos con SQL

Para listar las bases de datos y comprobar que la nueva base de datos, "prueba2", se ha creado correctamente, debo entrar primero al contenedor "mariadb" en modo "bash". Para ello utilizo el siguiente comando:

```shell
sudo docker exec -it mariadb bash
```

![image-20220408160408543](solucion_ej3.assets/image-20220408160408543.png)

Una vez dentro del contenedor, introduzco el siguiente comando en la consola para acceder como usuario "root" a MariaDB:

```shell
mariadb -u root -p
```

![image-20220408160635480](solucion_ej3.assets/image-20220408160635480.png)

Me ha solicitado contraseña del usuario "root" y, tras introducirla, entro sin problema. Ahora ejecuto la siguiente sentencia SQL para listar todas las bases de datos existentes:

```sql
SHOW DATABASES;
```

![image-20220408160905213](solucion_ej3.assets/image-20220408160905213.png)

Se puede apreciar como la nueva base de datos creada, "prueba2", se encuentra en el listado.

### Listando contenedores en ejecución

Para listar los contenedores que se encuentran en ejecución en este momento, utilizo el siguiente comando:

```shell
sudo docker ps
```

![image-20220408161706771](solucion_ej3.assets/image-20220408161706771.png)

### Borrando contenedores, red y volúmenes utilizados

Para borrar los contenedores, primero debo pararlos. Para ello utilizo el siguiente comando:

```shell
sudo docker stop mariadb adminer
```

Después, para eliminarlos, utilizo este otro comando:

```shell
sudo docker rm mariadb adminer
```

![image-20220408162106013](solucion_ej3.assets/image-20220408162106013.png)

Listo los contenedores, para ver si se han borrado correctamente:

```shell
sudo docker ps
```

![image-20220408162133800](solucion_ej3.assets/image-20220408162133800.png)

Efectivamente, contenedores borrados.

Para borrar la red "redbd" utilizo el siguiente comando:

```shell
sudo docker network rm redbd
```

![image-20220408162312663](solucion_ej3.assets/image-20220408162312663.png)

Listo las redes con este comando, para confirmar que la red "redbd" ya no existe:

```shell
sudo docker network ls
```

![image-20220408162355185](solucion_ej3.assets/image-20220408162355185.png)

Para borrar el volumen creado para el contenedor "mariadb" utilizo el siguiente comando, con el que solicito borrar todos aquellos volúmenes que no se estén utilizando actualmente. Agrego `--force` para que no me pida confirmación: 

```shell
sudo docker volume prune --force
```

![image-20220408162648570](solucion_ej3.assets/image-20220408162648570.png)

Tenía, como se puede apreciar, más volúmenes creados que no se estaban utilizando. Ahora listo, con el siguiente comando, los volúmenes existentes:

```shell
sudo docker volume ls
```

![image-20220408162738574](solucion_ej3.assets/image-20220408162738574.png)

Ya no estaba utilizando ninguno, por lo que Docker los ha eliminado todos y actualmente no tengo volúmenes. Todo correcto.
