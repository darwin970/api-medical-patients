<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Configuración local del proyecto

1. Crear una base de datos localmente en MySql.
2. Crear un nuevo archivo .env clonándolo desde el archivo .env.example que se incluye en la raiz del repositorio.
3. Cambiar los valores de las variables BD_HOST, DB_DATABASE. DB_USERNAME y DB_PASSWORD en el .env creado con los datos correspondiente de la BD.
4. Ejecutar el comando los siguientes comando en el orden que se indican:
    * composer install
    * php artisan key:generate
    * php artisan migrate
    * php artisan db:seed
    * php artisan serve

5. Por defecto el proyecto se ejecutara localmente en el puerto 8000 "http://127.0.0.1:8000".
6. En el archivo postman que existe en la raiz del proyecto, llamado "MedicalPatients.postman_collection.json" es la colección de todas las api's creadas, con su respectivo payload cada una.



## Probar api en servidor Heroku

1. La api se encuentra desplegada en Heroku, el dominio es el siguiente "https://api-medical-patients-34f32d007812.herokuapp.com/"



## Probar api

1. Importar el archivo "MedicalPatients.postman_collection.json" en postman, se debe crear una variable de entorno llamada "host", en donde especificaremos la url local "https://api-medical-patients-34f32d007812.herokuapp.com" ques la api en heroku.
2. Cada request ya tiene lo neesario para funciona, solo debemos ejecutar la que necesitemos.



## Diagrama BD

El diagrama de la BD se encuentra en la raiz del proyecto con el nombre "Medical patients.png".

<img src="./Medical patients.png">
