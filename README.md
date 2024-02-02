# Gestor de Pedidos - Killer Beer Company

¡Bienvenido al repositorio oficial de la aplicación de Gestión de Pedidos de Killer Beer Company!

## Descripción

Killer Beer Company es una empresa distribuidora de cervezas artesanales que busca modernizar su proceso de gestión de pedidos. Hasta ahora, el proceso era manual y dependía de visitas comerciales a clientes para recopilar pedidos en papel. Con el objetivo de optimizar esta operación, se ha desarrollado una aplicación web interna utilizando Laravel, así como una aplicación para clientes basada en Vue.js y una API Laravel.

## Características

### Aplicación Interna (Laravel)

- **Gestión del Catálogo de Productos**: Los administrativos pueden dar de alta, baja y modificar productos en el sistema. Cada producto está definido por su código de referencia, nombre, precio y categoría. Además, se pueden adjuntar fotos de los productos.

- **Gestión de Clientes**: Permite la administración de clientes, incluyendo la capacidad de dar de alta, baja y modificar información de contacto. Cada cliente tiene un código de cliente único compuesto por 8 dígitos.

- **Gestión de Pedidos**: Los usuarios pueden visualizar los pedidos realizados por los clientes, cambiar el estado de los pedidos (solicitado, en preparación, en entrega, entregado) y crear nuevos pedidos. Se proporcionan filtros para una búsqueda ágil de pedidos. Los responsables tienen acceso a estadísticas detalladas sobre los pedidos, como los más solicitados, por períodos de tiempo, etc.

- **Usuarios y Roles**: La aplicación diferencia entre tres tipos de usuarios: comerciales, administrativos y responsables, cada uno con diferentes niveles de acceso y funcionalidades.

### Aplicación para Clientes (Vue.js + API Laravel)

- **Visualización de Pedidos**: Los clientes pueden ver tanto sus pedidos anteriores como los que están en curso, simplemente ingresando su código de cliente único compuesto por 8 dígitos.

- **Creación de Pedidos**: Los clientes tienen la capacidad de crear nuevos pedidos directamente desde la aplicación, seleccionando productos del catálogo disponible y especificando la cantidad deseada.

## Instalación y Uso

### Aplicación Interna (Laravel)

1. Clona este repositorio en tu máquina local.
2. Instala las dependencias utilizando Composer: `composer install`.
3. Copia el archivo `.env.example` y renómbralo como `.env`. Luego, configura las variables de entorno necesarias, como la conexión a la base de datos.
4. Genera una nueva clave de aplicación: `php artisan key:generate`.
5. Ejecuta las migraciones de la base de datos: `php artisan migrate`.
6. Inicia el servidor local: `php artisan serve`.
7. Para cargar las estadisticas necesitaras: `composer require arielmejiadev/larapex-charts`.
### Aplicación para Clientes (Vue.js + API Laravel)

1. Clona este repositorio en tu máquina local.
2. Instala las dependencias utilizando npm: `npm install`.
3. Copia el archivo `.env.example` y renómbralo como `.env`. Luego, configura las variables de entorno necesarias, como la URL de la API Laravel.
4. Inicia la aplicación Vue.js: `npm run serve`.

## Contribución

¡Agradecemos cualquier contribución que puedas hacer para mejorar nuestras aplicaciones! Si tienes alguna idea o encuentras algún problema, no dudes en abrir un issue o enviar un pull request.

---

¡Esperamos que disfrutes utilizando nuestras aplicaciones de gestión de pedidos de Killer Beer Company! Si tienes alguna pregunta o necesitas ayuda, no dudes en ponerte en contacto con nuestro equipo de soporte técnico. ¡Gracias por elegirnos! 🍻
