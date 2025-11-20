<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Plateforme Praticien</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="text-center">
                <h1 class="card__title">Connexion</h1>
                <p>Accédez à votre espace praticien</p>
            </div>

            @if ($errors->any())
                <div class="form-error">
                    <strong>Erreur:</strong> {{ $errors->first('login') }}
                </div>
            @endif

            <form method="POST" action="/login" class="form">
                @csrf

                <div>
                    <label class="label" for="pseudo">Identifiant</label>
                    <input type="text" id="pseudo" name="Pseudo" class="input" placeholder="Votre identifiant" required>
                </div>

                <div>
                    <label class="label" for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" class="input" placeholder="Votre mot de passe" required>
                </div>

                <button type="submit" class="btn">
                    Se connecter
                </button>
            </form>

            <div class="text-center">
                Besoin d'aide ? <a href="/support">Contactez le support</a>
            </div>
        </div>
    </div>
</body>
</html>