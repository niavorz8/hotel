<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
        }
        .login-container {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="card login-card">
            <div class="card-body">
                <h3 class="card-title text-center">Connexion</h3>

                <form action="Controller/LoginController.php" method="post">
                    <div class="form-group">
                        <label for="email">Adresse e-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre e-mail">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe">
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                </form>

            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
