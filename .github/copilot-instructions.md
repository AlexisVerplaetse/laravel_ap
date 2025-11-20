# AI Copilot Instructions for Laravel Mission 2

## Project Overview
This is a Laravel 12 authentication application focused on practitioner login (`compte_praticien` table). The project uses a custom authentication model (`Connexion.php`) instead of Laravel's default `User` model, which is a key architectural difference to understand.

## Architecture & Key Components

### Authentication Flow
- **Entry Point**: `routes/web.php` - POST `/login` route
- **Controller**: `app/Http/Controllers/ConnexionController.php` - handles `Con()` method
- **Model**: `app/Models/Connexion.php` - queries `compte_praticien` table with `login` and `mdp` fields
- **Critical Difference**: Uses custom fields (`login`, `mdp`) instead of standard Laravel fields (`email`, `password`)

**Example Pattern**:
```php
// ConnexionController.php
$user = Connexion::where('login', $pseudo)->where('mdp', $password)->first();
```

### Database
- **Users Table**: Standard Laravel migration in `database/migrations/0001_01_01_000000_create_users_table.php`
- **Custom Table**: `compte_praticien` (queries in Connexion model but migration not visible - likely created manually or in seeders)
- **Note**: There's a mismatch between User model and Connexion model - always check which model is being used

### Frontend
- **Blade Templates**: Located in `resources/views/`
  - `Connexion.blade.php` - login page (uses Bootstrap 5.3.0)
  - `accueil.blade.php` - home/welcome page (post-login redirect)
- **Styling**: Uses custom CSS + Bootstrap, with Tailwind available via Vite

### Build & Dev Workflow
- **Frontend Build**: `npm run dev` (Vite) - runs asset compilation
- **Backend Server**: `php artisan serve` (typically on port 8000)
- **Combined Dev Mode**: `composer run dev` - runs PHP server + queue + logs + Vite concurrently
- **Testing**: `composer test` - runs PHPUnit tests

## Project-Specific Patterns & Conventions

### 1. Model Naming & Queries
- Models use singular, PascalCase: `Connexion`, `User`
- Custom table names defined via `$table` property: `protected $table = 'compte_praticien'`
- Always check `$fillable` and `$table` properties when working with models

### 2. Route Naming
- Web routes in `routes/web.php` (no API routes visible)
- Controller method names use short verbs: `Con()` for connection/login
- POST routes typically handle form submissions from Blade views

### 3. Blade View Conventions
- CSRF protection via `@csrf` directive on all forms
- Bootstrap classes for styling
- Form inputs use `name` attributes matching controller request parameters

### 4. Form Input Mapping
- Blade form `name="Pseudo"` → Controller `$request->Pseudo`
- Blade form `name="password"` → Controller `$request->password`
- **Note**: Input validation not visible - consider adding it when processing forms

## Critical Developer Workflows

### Local Setup
```bash
composer install
npm install
npm run build  # Or npm run dev for development
php artisan serve
```

### Running Tests
```bash
composer test
```

### Database Migrations
```bash
php artisan migrate
php artisan migrate:rollback
```

### Code Quality
- Uses Laravel Pint for PHP linting: `./vendor/bin/pint`
- Uses PHPUnit 11.5.3 for testing (config in `phpunit.xml`)

## Common Pitfalls & Edge Cases

1. **Connexion vs User Model**: This app uses a custom `Connexion` model instead of Laravel's default `User`. Always reference `Connexion::where()` for auth queries, not `User::where()`.

2. **Field Name Mapping**: Database uses `mdp` (French for password) not `password`. SQL queries must use `mdp`.

3. **Password Hashing**: Connexion model doesn't show password hashing via `Illuminate\Support\Facades\Hash`. Raw password comparisons may be happening - verify before modifying auth logic.

4. **Error Handling**: Login errors returned via `back()->withErrors()` - ensure error display in Blade templates.

5. **No Middleware Visible**: Authentication middleware not visible in routes - consider if middleware needs to be added for protected routes.

## When Making Changes

- **Modifying Auth**: Update both `ConnexionController` and `Connexion` model in sync
- **Adding Fields**: Update migration, model `$fillable`, and Blade form together
- **Styling**: Modify `Connexion.blade.php` directly; consider extracting CSS to `resources/css/app.css` for larger changes
- **New Routes**: Add to `routes/web.php` and create corresponding controller methods
- **Testing**: Add tests to `tests/Feature/` or `tests/Unit/` directories following PHPUnit structure

## File References
- Main entry: `resources/views/Connexion.blade.php`
- Auth logic: `app/Http/Controllers/ConnexionController.php`
- Data layer: `app/Models/Connexion.php`
- Routes: `routes/web.php`
