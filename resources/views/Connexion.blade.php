<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
   <h1>Page de Connexion</h1>
    <form method="POST" action="/login">
    @csrf
    <div>
        <label>Email :</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label>Mot de passe :</label>
        <input type="password" name="password" required>
    </div>
    <button type="submit">Se connecter</button>
    </form>
</body>
</html>
