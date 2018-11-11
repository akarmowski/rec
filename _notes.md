# Recepta CMS @ Laravel

## Wykorzystano

* [AdminLTE](https://github.com/jeroennoten/Laravel-AdminLTE) - Easy AdminLTE integration with Laravel 5

## Przydatne moduły

* [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar)
* [Eloquent Model Generator](https://github.com/krlove/eloquent-model-generator)

## Przydatne komendy

```
php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=assets

php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=translations

php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=views

php artisan vendor:publish --provider="JeroenNoten\LaravelAdminLte\ServiceProvider" --tag=config

```

```
php artisan cache:clear

php artisan make:model Models/<nazwa modelu>

php artisan make:provider <NazwaServiceProvider>

php artisan make:controller <NazwaKontrolera np. BranchController>

php artisan make:controller PhotoController --resource --model=Models/Photo

php artisan make:middleware PHOld/Auth

php artisan make:request AccountSettings/ChangePasswordRequest

php artisan make:mail AccountSettings/ResetPasswordLink
```

```
php artisan cache:forget spatie.permission.cache
```

### Debug SQL

Manualnie włączamy
```
DB::enableQueryLog()
```
Wyrzucamy na ekran
```
DB::getQueryLog()
```

## Eloquent Model Generator

### Generowanie modeli na podstawie tabel z bazy danych

Use
```
php artisan krlove:generate:model User
```
to generate a model class. Generator will look for table with name `users` and generate a model for it.

### table-name
Use `table-name` option to specify another table name:
```
php artisan krlove:generate:model User --table-name=user
```
In this case generated model will contain `protected $table = 'user'` property.



## Blade

Wyświetlanie zmiennych

```
{{ dd(get_defined_vars()) }} 

{{ dd(get_defined_vars()['__data']) }}
```

## Composer

```
composer install

composer dump-autoload
```

## Seeder

Tworzenie seeder-a

```
php artisan make:seeder UsersTableSeeder
```

Użycie

```
php artisan db:seed
php artisan db:seed --class=UserTableSeeder
```

## Migrations

Tworzenie pliku migracji

```
php artisan make:migration create_users_table
```

Użycie

```
php artisan migrate
php artisan migrate --database=mysql_phold_pharmbook //--database=<nazwa połączenia>
```

## Git

### Procedura

#### Developer:
```
git checkout -b fix-10392 // Tworzymy branch z nazwą

git add . // Zatwierdzamy wszyskie zmiany
git commit -m "Poprawka niesamowicie usprawniająca" // Dodajemy komentarz

git push origin fix-10392 // Push zmian na serwer GitLab
```

Wynik:
```
Counting objects: 4, done.
Delta compression using up to 8 threads.
Compressing objects: 100% (4/4), done.
Writing objects: 100% (4/4), 413 bytes | 413.00 KiB/s, done.
Total 4 (delta 3), reused 0 (delta 0)
remote:
remote: To create a merge request for fix-10392, visit:
remote:   http://gitlab.pgf.com.pl/akarmowski/recepta_cms/merge_requests/new?merge_request%5Bsource_branch%5D=fix-10392
remote:
To http://192.168.34.109/akarmowski/recepta_cms.git
 * [new branch]      fix-10392 -> fix-10392
```

#### Tester
```
git pull
git branch -r
```

Wynik:
```

old-origin/ak_recepta
old-origin/master
old-origin/template_easy
origin/1-nie-dziala-cos-tam
origin/ak_recepta
origin/dawid
origin/fix-10392
origin/master
```
```  
git checkout -b fix-10392 origin/fix-10392
```

Wynik:
```
Switched to a new branch 'fix-10392'
Branch 'fix-10392' set up to track remote branch 'fix-10392' from 'origin'.
```

Po sprawdzeniu czy wszystko jest ok przechodzimy do panelu GitLab-a dodajemy notatkę dla osoby potwierdzającej zmiany.

# Pozostałe

## Instrukcja *.md

* [README.md](https://gist.github.com/PurpleBooth/109311bb0361f32d87a2) - Template

# Rozwiązywanie problemów

## MySQL

Problem 1:
```
Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes (SQL: alter table users add unique users_email_unique(email))
```

Rozwiązanie

W pliku app\Providers\AppServiceProvider.php należy:
```
use Illuminate\Support\Facades\Schema;

public function boot()
{
    Schema::defaultStringLength(191);
}
```