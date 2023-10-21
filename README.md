# Laravel todo app cu laravel și livewire

În acest laborator am implementat o aplicație de tip todo cu ajutorul framework-ului laravel și a plugginului livewire
Am separat logica de afaceri de logica de prezentare și de control, am implementat autentificarea utilizatorilor și restricționarea accesului la anumite rute sau acțiuni, am implementat testarea.


## Setup

1. Clonați repozitpriul pe PC personal
2. Creați un file nou `.env` și copiați în el conținutul fișierului `.env.example`
3. Rulați comanda `composer install`
4. Rulați comanda `php artisan key:generate` și introduceți cheia din browser în fișierul `.env`, în variabila `APP_KEY`
5. Rulați comanda `npm install`
6. Rulați comanda `php artisan serv`
7. Rulați comanda `npm run dev`

## Utilizare


1. Întâi de toate, creați baza de date `todo_app`
2. Pentru a crea tabelele, rulați comanda `php artisan migrate`
3. Pentru a popula tabelul Categories, rulați comanda `php artisan db:seed CategorySeeder`
4. Pentru a accesa pagina todo, trebuie să aveți un cont de utilizator. Pentru a crea un cont de utilizator, accesați pagina `'your_local_host'/register`, de exemplu la mine este `http://http://127.0.0.1:8000/register`
5. După ce ați creat contul, accesați pagina `http://http://127.0.0.1:8000/login`
6. !!!Atentie!!! Pentru a utiliza functionalitatea `Forgot your password?`, este nevoie sa setati in fisierul `.env` urmatoarele variabile:
```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your_email
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="laravelTodoApp@usm.md"
MAIL_FROM_NAME="${APP_NAME}"
```
4. Continutul  tabelului `tasks` poate fi manipulat din interfața grafică
5. Pentru a rula toate testele existente, rulați comanda `php artisan test`
6. Pentru a rula anumite teste, rulați comanda `php artisan test --filter name_of_test`, de exemplu `php artisan test --filter=UserTest`
## Întrebări de control pentru lab1

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
## Întrebări de control pentru lab2

### 1.Ce reprezintă Service Layer în arhitectura Model-View-Controller (MVC) a aplicațiilor web și ce rol au ele în separarea logicii?

În arhitectura MVC, Service Layer este un strat de logică de afaceri care se află între Model și Controller. Acesta este responsabil pentru implementarea logicii de afaceri a aplicației, cum ar fi validarea datelor, aplicarea regulilor de afaceri și gestionarea tranzacțiilor.
Rolul Service Layer în separarea logicii este de a decupla logica de afaceri de logica de prezentare și de control. Acest lucru face ca aplicația să fie mai ușor de întreținut și de testat.

### 2. Explicați conceptele de autentificare și autorizare în dezvoltarea web.

Autentificarea este procesul de verificare a identității unui utilizator. Autorizarea este procesul de determinare a permisiunilor unui utilizator.
Autentificare
În dezvoltarea web, autentificarea se realizează, în general, prin intermediul unui nume de utilizator și a unei parole. Utilizatorul introduce aceste informații într-un formular de autentificare, iar aplicația le verifică în baza de date. Dacă informațiile sunt corecte, utilizatorul este autentificat și i se permite să acceseze resursele aplicației.
Autorizare
Autorizarea este procesul de determinare a permisiunilor unui utilizator de a accesa anumite resurse. În dezvoltarea web, autorizarea se realizează, în general, prin intermediul rolurilor. Fiecare utilizator este asociat cu unul sau mai multe roluri. Fiecare rol are un set de permisiuni asociate.

### 3.Cum se poate implementa autentificarea utilizatorilor și restricționarea accesului la anumite rute sau acțiuni în framework-ul selectat de dvs.?

În Laravel, autentificarea utilizatorilor se implementează folosind pachetul Auth. Acest pachet oferă o serie de funcții și clase pentru a implementa autentificarea cu nume de utilizator și parolă, autentificarea cu tokenuri și alte metode.
Pentru a restricționa accesul la anumite rute sau acțiuni, se poate folosi middleware-ul auth. Acest middleware verifică dacă utilizatorul este autentificat și, dacă nu este, îl redirecționează la pagina de autentificare.

### 4. Care este diferența dintre testarea unitară (Unit Tests) și testarea de integrare (Integration Tests)

Testarea unitară este procesul de testare a unui modul sau a unei clase de cod în mod izolat. Testarea de integrare este procesul de testare a modului în care modulele sau clasele de cod interacționează între ele.
În Laravel, testarea unitară se realizează folosind pachetul PHPUnit. Acest pachet oferă o serie de funcții și clase pentru a scrie teste unitare.
Testarea de integrare se realizează folosind pachetul Laravel Dusk. Acest pachet oferă o serie de funcții și clase pentru a scrie teste de integrare care implică interacțiunea cu interfața web a aplicației.

### 5. Concluzie

Service Layer este un strat important în arhitectura MVC. Acesta ajută la separarea logicii de afaceri de logica de prezentare și de control, ceea ce face ca aplicația să fie mai ușor de întreținut și de testat.
Autentificarea și autorizarea sunt concepte importante în dezvoltarea web. Acestea ajută la protejarea aplicației împotriva accesului neautorizat.
Testarea unitară și testarea de integrare sunt două tipuri de teste importante pentru a asigura calitatea aplicației.

### 5. Surse și resurse utilizate
- [Laravel routing](https://laravel.com/docs/10.x/routing)
- [Laravel migrations](https://laravel.com/docs/10.x/migrations)
- [Livewire events](https://laravel-livewire.com/docs/2.x/events)
- [Livewire docs](https://laravel-livewire.com/docs/2.x/quickstart)
- [Tailwind](https://tailwindcss.com/docs/installation)
- [Bootstrap modals](https://getbootstrap.com/docs/4.1/getting-started/introduction/)
- [Laravel after_or_equal Date Validation](https://www.mywebtuts.com/blog/laravel-after-or-equal-date-validation-example-tutorial/)
- [Laravel service container](https://laravel.com/docs/10.x/container#binding-basics)
- [Laravel breeze](https://laravel.com/docs/10.x/starter-kits)
- [Testing in Laravel | How to Write Tests With Laravel |](https://www.youtube.com/watch?v=UjA-16diixc&t=974s&ab_channel=CodeWithDary)
