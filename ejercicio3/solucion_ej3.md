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
