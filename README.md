# api_backend

## Una vez clonado el repositorio, corremos los siguientes comandos desde la raiz del proyecto:

- composer install 
- npm install && npm run dev
- php artisan key:generate

## Editamos el archivo .env y creamos la base de datos
## Después de tener lista la conexión
- php artisan migrate
- php artisan serve

## Rutas de la api

Para probar el funcionamiento de la API utilicé Postman.

## Autenticación

- Crear un nuevo registro (post): http://127.0.0.1:8000/api/signup
- Iniciar sesión (post): http://127.0.0.1:8000/api/login

## Importante

Para usar las otras rutas es importante utilizar el token obtenido después de iniciar sesión (access_token), este token, de tipo Bearer, lo añadiremos  en la parte de Authorization. Si no se añade, no se podrán hacer las peticiones.

## Clients

- Añadir un nuevo cliente (post): http://127.0.0.1:8000/api/clients
- Consultar todos los clientes (get): http://127.0.0.1:8000/api/clients
- Consultar un cliente en específico (get): http://127.0.0.1:8000/api/clients/{id}
- Editar (put): http://127.0.0.1:8000/api/clients/1?first_name=Lola
- Eliminar (delete): http://127.0.0.1:8000/api/clients/1

## Products

- Añadir un nuevo producto (post): http://127.0.0.1:8000/api/products
- Consultar todos los productos (get): http://127.0.0.1:8000/api/products
- Consultar un producto (get): http://127.0.0.1:8000/api/products/{id}
- Editar (put): http://127.0.0.1:8000/api/products/1?name=Test
- Eliminar (delete): http://127.0.0.1:8000/api/products/1

## Bills

- Añadir una factura (post): http://127.0.0.1:8000/api/clients
- Consultar todas las facturas (get): http://127.0.0.1:8000/api/bills
- Consultar una factura  (get): http://127.0.0.1:8000/api/bills/{id}
- Editar (put): http://127.0.0.1:8000/api/bills/1?company_name=Company
- Eliminar (delete): http://127.0.0.1:8000/api/bills/1

## Bills - Products

- Añadir una nueva factura (post): http://127.0.0.1:8000/api/bills_products
- Consultar todas las facturas de los productos (get): http://127.0.0.1:8000/api/bills_products
- Consultar (get): http://127.0.0.1:8000/api/bills_products/{id}
- Editar (put): http://127.0.0.1:8000/api/bills_products/1?bill_id=1
- Eliminar (delete): hhttp://127.0.0.1:8000/api/bills_products/1

## Archivos CSV

- Crear nuevos clientes a partir de un archivo CSV (post): http://127.0.0.1:8000/api/clients_import

Para subir el archivo especificamos que el campo es tipo file.
![image](https://user-images.githubusercontent.com/95490448/200975965-08d51d17-ac13-4f05-bbe1-d26212ae3181.png)


- Descargar un listado de los clientes y el número de facturas (post): http://127.0.0.1:8000/api/clients_export
 A la hora de hacer la petición seleccionamos la opción Send and Download para descargarlo.
 
 ![image](https://user-images.githubusercontent.com/95490448/200976036-5887e6bd-53f9-491d-bbc3-6d9ae2cb1e42.png)
