## Paso 1. Crear proyecto Laravel 

Desde un terminal ejecutar

	composer create-project --prefer-dist laravel/laravel blog
 
## Paso 2. Crear modelos
Crear modelo para Categorías (con -m creamos la migración)

Desde un terminal ejecutar
	
	php artisan make:model Category -m
	
Crear modelo para Posts (con -m creamos la migración)

Desde un terminal ejecutar
	
	php artisan make:model Post -m
	
Crear modelo para Etiquetas (con -m creamos la migración)

Desde un terminal ejecutar
	
	php artisan make:model Tag -m
	
## Paso 3. Crear relación muchos a muchos entre los Post y las etiquetas. 

El estándar es *create_entidad1_entidad2_table*. La entidad 1 es la que venga antes en el abecedario (post en primer lugar, ya que la p va antes que la t).

Desde un terminal ejecutar

	php artisan make:migration create_post_tag_table
	
## Paso 4. Crear base de datos *blog* en mysql

Ejecutar migraciones. Desde un terminal ejecutar

	php artisan migrate

## Paso 5. Creación de Factory y Seeders

Desde un terminal ejecutar

	-- Factories
	php artisan make:factory CategoryFactory
	php artisan make:factory PostFactory
	php artisan make:factory TagFactory
	
	--Seeders
	php artisan make:seeder CategoriesTableSeeder
	php artisan make:seeder PostsTableSeeder
	php artisan make:seeder TagsTableSeeder
	php artisan make:seeder UsersTableSeeder

## Paso 6. Creación del sistema de autenticación

Desde un terminal ejecutar
	
	php artisan make:auth
	
Crear controladores. Desde un terminal ejecutar

	php artisan make:controller Web/PageController
	
## Paso 7. Crear controladores para autenticación

Desde un terminal ejecutar
	
	php artisan make:controller Admin/TagController --resource
	php artisan make:controller Admin/CategoryController --resource
	php artisan make:controller Admin/PostController --resource

## Paso 8. Creación de validaciones de campos antes de ejecutuar acciones sobre base de datos

Desde un terminal ejecutar
	
	php artisan make:request TagStoreRequest
	php artisan make:request TagUpdateRequest
	
## Paso 9. Utilización de Laravel Collective para manejo de formulario

- [Laravel Collective](http://laravelcollective.com)

Instalación

	composer require laravelcollective/html
	
## Paso 10. Utilización de Plugin jQuery Plugin stringToSlug

- [jQuery Plugin stringToSlug](https://github.com/leocaseiro/jQuery-Plugin-stringToSlug)

## Paso 11. Instalación de Ckeditor para rellenar el cuerpo de los posts

- [CKEditor](http://ckeditor.com)

## Paso 12. Creación de políticas para controlar acceso a recursos

Desde un terminal ejecutar

	php artisan make:policy PostPolicy

## Tips

Para que la base de datos se cree y ejecute todoas las migraciones ejecutar (si ponemos --seed se ejecutan los seeds definidos en el archivo DatabaseSeeder.php)

	php artisan migrate:refresh
	
Cuando se tienen relaciones entre tablas, los tipos de datos deben ser iguales para poder realizar relaciones de 1 a muchos y de muchos a muchos.

Por defecto la tabla users tiene un campo id de tipo  bigint, por lo que la relación de clave ajena debe definirse como 
	
	$table->unsignedBigInteger('user_id');

Base de datos

	Factory: Se utiliza el nombre de la entidad en  singular (representa un registro)
	Seeder: Se utiliza el nombre de la entidad en plural (representa una tabla)
	hasMany: Relación de 1 a n
	belongsToMany: Relación de m a n

Para conocer la versión de Laravel de un proyecto

	php artisan --version
	
La autenticación en Laravel 5.x y 6.x era con el comando

	php artisan make:auth
	
En Laravel 7.x se hace con la ejecución de los siguientes comandos

	composer require laravel/ui
		npm install
		npm run dev
	php artisan ui vue --auth
	
Para crear los métodos de visualización, creación, edición y borrado en un controlador añadir --resource

	Ejemplo
	php artisan make:controller Admin/TagController --resource
	
Pra comprobar las rutas creadas

	php artisan route:list
	
Con la directiva asset se buscan recursos dentro de la carpeta public

	Por ejemplo, para inlcuir el archivo jquery.stringtoslug.min.js
	<script src="asset {{ 'vendor/stringToSlug/jquery.stringtoslug.min.js'}}"></script>
	