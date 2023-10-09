# Laravel todo app cu laravel și livewire

În acest laborator am implementat o aplicație de tip todo cu ajutorul framework-ului laravel și a plugginului livewire

## Setup

1. Clonați repozitpriul pe PC personal
2. Creați un file nou `.env` și copiați în el conținutul fișierului `.env.example`
3. Rulați comanda `composer install`
4. Rulați comanda `php artisan key:generate` și introduceți cheia din browser în fișierul `.env`, în variabila `APP_KEY`

## Asigurați-vă că aveți pornit serverul local, apoi rulați comanda
```
php artisan serv
```

## Utilizare


1. Întâi de toate, creați baza de date `todo_app`
2. Pentru a crea tabelele, rulați comanda `php artisan migrate`
3. Pentru a popula tabelul Categories, rulați comanda `php artisan db:seed CategorySeeder`
4. Astaa este tot, deja conținutul tabeluluii `tasks` poate fi manipulat din interfața grafică

## Întrebări de control

### 1. Care sunt ***avantajele*** utilizării framework-ului **laravel**?
```text
Răspuns: Laravel este un framework PHP popular pentru dezvoltarea rapidă a aplicațiilor web, care oferă numeroase avantaje. Iată câteva dintre avantajele utilizării framework-ului Laravel:

1. Laravel folosește osintaxă elegantă și expresivă , ceea ce face codul mai ușor de citit și de întreținut.

2. Laravel oferă un sistem de autentificare integrat, care face foarte ușoară implementarea autentificării utilizatorilor în aplicațiile dvs.

3. Laravel utilizează Eloquent, un ORM puternic, pentru a simplifica lucrul cu baza de date. Aceasta vă permite să interacționați cu baza de date folosind obiecte și limbaj de programare, în loc de SQL brut.

4. Laravel oferă un sistem de rutare flexibil, care vă permite să definiți ușor rute pentru diferitele acțiuni ale aplicației dvs.

5. Middleware-urile în Laravel permit să efectuați operații intermediare asupra cererilor HTTP înainte ca acestea să ajungă la controlerul corespunzător. Acest lucru este util pentru autentificare, autorizare, gestionarea sesiunilor și multe altele.

6. Pachete și biblioteci extensibile: Există o gamă largă de pachete și biblioteci disponibile pentru Laravel prin intermediul Composer, ceea ce vă permite să extindeți funcționalitatea aplicației dvs. în mod facil.
```
### 2. Care sunt metodele de definire a ***rutelor*** în **laravel**?
```text
Răspuns: Toate rutele Laravel sunt definite în fișierele de rute, care se află în directorul routes. Aceste fișiere sunt încărcate automat de către App\Providers\RouteServiceProvider al aplicației dumneavoastră. Fișierul routes/web.php definește rutele care sunt pentru interfața dvs. web. 
Acestor rute li se atribuie grupul de middleware web, care oferă caracteristici precum starea sesiunii și protecția CSRF. Rutele din routes/api.php nu au statut și sunt alocate grupului middleware api.
Pentru majoritatea aplicațiilor, rutele se definesc în fișierul routes/web.php. 

    Metodele disponibile in rute: 
 1. Route::get($uri, $callback);
 2. Route::post($uri, $callback);
 3. Route::put($uri, $callback);
 4. Route::patch($uri, $callback);
 5. Route::delete($uri, $callback);
 6. Route::options($uri, $callback);

```
### 3. Ce relație între tabelele bazei de date ați folosit și cum ați implementat-o?
```text
Răspuns: Pentru a crea o relație între tabelele bazei de date am folosit relația de tip one-to-many.
Deoarece am doar tabele tasks și categories, am creat o relație de tip one-to-many între acestea, acest lucru însemna că o 
categorie poate avea mai multe task-uri, iar un task poate aparține unei singure categorii.
Pentru a implementa această relație am folosit metoda hasMany() în modelul Category și metoda belongsTo() în modelul Task.

```
#### Așa am implementat relația în modelul Category
```text
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
```
#### Așa am implementat relația în modelul Task
```text
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
```
### 4.Ce sunt migrațiile bazei de date și cum sunt folosite în Laravel?
```text
Răspuns: În Laravel, migrațiile bazei de date sunt un concept cheie.
 Acestea permit definirea și gestionarea schemei bazei de date folosind cod PHP în 
 loc de SQL direct. Migrațiile  permit să crearea, actualizarea sau ștergerea tabelelor și coloanelor în baza de date în mod programatic, ceea ce face procesul
 de dezvoltare și actualizare a bazei de date mai ușor și mai controlat.
Pentru a crea o migrație nouă, se folosește comanda: 
```
`php artisan make:migration`
```
apoi se pot defini modificările pe care doriți să le efectuați în schema bazei 
de date în fișierul migrației generat. După ce migrația a fost definita, o putem rula folosind comanda:
```
`php artisan migrate`
```
iar Laravel va aplica
modificările în baza de date.
```
### 5. Surse și resurse utilizate
- [Laravel routing](https://laravel.com/docs/10.x/routing)
- [Laravel migrations](https://laravel.com/docs/10.x/migrations)
- [Livewire events](https://laravel-livewire.com/docs/2.x/events)
- [Livewire docs](https://laravel-livewire.com/docs/2.x/quickstart)
- [Tailwind](https://tailwindcss.com/docs/installation)
- [Bootstrap modals](https://getbootstrap.com/docs/4.1/getting-started/introduction/)
- [Laravel after_or_equal Date Validation](https://www.mywebtuts.com/blog/laravel-after-or-equal-date-validation-example-tutorial/)
