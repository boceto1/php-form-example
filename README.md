## Explicación Programa

El programa consiste de un formulario básico de registro de usuario que recoje los siguientes datos: Nombre Completo, Correo de la universidad, contraseña, fecha de nacimiento y género. 
Sobre cada uno de estos datos se hacen las siguientes validaciones:

* Nombre Completo: Caracteres entre 3 y 30, no números, no caracteres especiales.
* Email: Que sea un email y que tenga unir dentro del correo
* Password: Mínimo 8 caracteres, al menos 1 número, 1 letra y 1 caracter especial.
* Fecha de Nacimiento: Que sea antes de la fecha actual, que el usuario tenga mas de 18 años.

## Estrucutra del programa

El programa cuenta de 3 archivos: 

* `index.php`: contiene el formulario con los 5 campos HTML5 a validar
* `report.php`: contiene el reporte de la validación y llama a la función que valida los datos que vienen de index.php
* `utils.php`: contienen todas las funciones de validación.
