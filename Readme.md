# Prueba Tecnica
## Especificaciones
- El frontend fue realizado con Next.js en su version 14
- El backend fue realizado con Laravel en su version 11
- La base de datos es Mysql en su version 8
## Arquitectura
La prueba solicitaba realizar en forma de microservicios y se dividio la aplicacion en 4 microservicios,
los cuales fueron:
1. Principal: mas que un microservicio actua como Api Gateway funcionando de vinculo entre el frontend y backend.
2. Ingredientes: microservicio responsable de la validacion de los ingredientes y compras al mercado.
3. Recetas: encargado de la gestion de recetas y las cantidades de ingredientes de cada una de ellas.
4. Ordenes: creacion de nuevas ordenes asi como la actualizacion de los estados de las mismas.

Se opto por levantar la infraestructura en AWS, inicialmente se habia planificado hacer uso de una unica instancia EC2 
con Linux debido a los problemas de rendimiento que windows tiene con docker, sin embargo los recursos del nivel gratuito de Amazon
para este tipo de servicios se quedaron cortos para montar los microservicios, generando asi
que se tuviera que desplegar cada microservicio en una instancia diferente para asi evitar problemas de rendimiento (Se incluyo
un manual con todos los comandos necesarios para levantar los contenedores de cada microservicios asi como tambien el docker compose
que se utilizo en el desarrollo local que permite levantar los 4 microservicios en simultaneo). Con respecto al frontend
se desplego en dos lugares, con despliegue automatico usando vercel y con un despliegue manual y principalmente funcionando como backup tambien
se encuentra ejecutandose en AWS. Quedando la infraestructura de la siguiente manera:

[Diagrama de Infraestructura](./Infra.jpg)

## Base de Datos
[Diagrama de Base de Datos](./DB.jpg)

## Despliegue

Como se menciono previamente el frontend es accesible desde 2 lugares siendo estos:
1. [https://tech-interview-topaz.vercel.app/](https://tech-interview-topaz.vercel.app/) este es el sitio que cuenta con despliegue automatico, sin embargo, y para no incurrir en gastos no esta configurado
SSL en el backend, siendo necesario el habilitar el mixed content en el navegador que se prueba
2. [http://44.222.204.163:3000/](http://44.222.204.163:3000/) este el sitio de backup que no presenta los problemas de SSL con los que cuenta el primero y de igual manera funciona
en cualquier navegador

Debido al uso de capas gratuitas puede existir algun reinicio o cambio en las ip de lo desplegado,agrego un enlace a un video donde
se muestra la aplicacion ya desplegado con todo el funcionamiento solicitado

[Video del funcionamiento](https://youtu.be/b6mX10VxX1Y)
## Siguientes pasos

Muchas cosas de las aqui descritas son importantes, sin embargo, no se lograron finalizar por falta de tiempo.

1. Implementar la autenticacion con Laravel Sanctum
2. Separar la base de datos de AWS EC2 hacia AWS RDS
3. Implementar AWS Code Deploy para que tanto el frontend como el backend cuenten con despliegue automatico

