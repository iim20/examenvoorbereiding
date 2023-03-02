# Realiseren fase

* [X] Frontend config (Tailwind CSS)
* [X] Templates
* [X] 404 page
* [X] Controllers

  * [X] Storingen
  * [X] Dashboard
* [X] Models

  * [X] Storingen
* [X] Migrations

  * [X] Locaties tabel
  * [X] Machines tabel
  * [X] Medewerkers tabel
  * [X] Storingen_historie tabel
  * [X] Storingen tabel
  * [X] Statusniveau tabel
  * [X] Statusupdate tabel
  * [X] Medewerker_storing tabel
* [X] Factory(niet gebruiken)
* [ ] StoreFormRequest (gebruikt)

- ddd(variable) to debug in controller
- @dd(loop) => dollar sign for the loop variable in view
- Conventions:
  - Controller en Model zijn enkelvoud
  - Tabellen zijn meervoud
  - Variables zijn in camelCase
- Controller crud + model: php artisan make:controller ProductController --resource --model=Product
- Migration: php artisan make:migration create_products_table
- php artisan tinker: controls database in cmd way
- Eloquent Relationships:
  - hasOne
  - hasMany
  - belongsTo
  - belongsToMany
- To check if relation is set use:
  - php artisan tinker
  - App\Models\YourModel::first();
  - App\Models\YourModel::first()->assosiatedTable;
- Search N+1 problem well on [Laravel 8 From Scratch: Clockwork, and the N+1 Problem (laracasts.com)](https://laracasts.com/series/laravel-8-from-scratch/episodes/26)
- \Illuminate\Support\Facades\DB::listen(function ($query$){ logger($query->sql$)});
