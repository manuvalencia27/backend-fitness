<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalación

# clone the repo
$ git clone

# go into app's directory
$ cd sportf

# install laravel
$ composer install

# serve with hot reload for vite (vue)
$ npm run serve

## Sobre el proyecto y lo realizado

El proyecto está desarrollado en la versión 10.10 y vue 3.2, pinia, laravel/ui, axios, bootstrap, vite... la aplicación cuenta con migraciones, seeders y el usuario para entrar al modulo de administración es mvalencia@gmail.com y pass: 123456, 

La estructura de los controladores está de acuerdo a la necesidad:

- En la raiz se encuentran los controladores para la parte visual del ecommerce
- En la carpeta backend se encuentran todos lo relacionado al admin, los curds de usuarios, categorías, productos, facturas, comentarios y tags
- En la carpeta api se encuentran las consultas por axios desde vue
- Para el backend se creó un middleware y unos requests para evaluar algunos formularios de los cruds

La estructura de las vista es similar a la de los controladores y en la carpeta resources/js se encuentran los componentes los stores y el llamado de las funciones de vue
