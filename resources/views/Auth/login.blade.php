@php
    header("Turbolinks-Location: /login");
    $form = (new \App\Helpers\FormHelper\Form());

    if (!empty($_SESSION['connected']) && $_SESSION['connected'] === true){
        header("Location: /");
    }
@endphp
        <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>StockXpert - Connexion</title>
    <!--    Favicon -->
    <link rel="shortcut icon" href="/vendors/images/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="{{ \App\Helpers\FileUrlHelper\FileUrl::getUrl('app.css') }}">

    <!--    Icons -->
    <link rel="stylesheet" href="/vendors/css/icons/uicons/css/uicons-regular-rounded.min.css">
    <link rel="stylesheet" href="/vendors/css/icons/font-awesome/css/all.min.css">

    <!--    JS Files -->
    <script defer src="{{ \App\Helpers\FileUrlHelper\FileUrl::getUrl('app.js') }}"
            data-turbolinks-track="reload"></script>
</head>
<body>
<div class="login_container">
    <div class="login">
        <form action="{{ \App\Components\Router\Router::route('login.auth') }}" class="custom__form" id="login__form" method="post">
            <h1 class="mb-10"><img src="/vendors/images/logo.svg" alt="logo" class="icon"></h1>

            <p class="mb-20"></p>
            {!! $form->getInput("text", null, "username", "Username", null, null , "noEmpty", 200) !!}
            {!! $form->getInput("password", null, "password", "Password", null, null , "noEmpty", 200) !!}

            <div class="checkbox tiny rounded-22">
                <div class="checkbox-container">
                    <input id="checkbox-default" name="remember" type="checkbox" />
                    <div class="checkbox-checkmark"></div>
                </div>
                <label for="checkbox-default">Rester connecter</label>
            </div>
            <button>Se connecter</button>

            <p class="or">
                ----- ou continuer avec -----
            </p>
            <div class="icons">
                <i class="fab fa-google"></i>
                <i class="fab fa-github"></i>
                <i class="fab fa-facebook"></i>
            </div>

        </form>
    </div>
    <div class="pic">
        <img src="/vendors/images/login.png">
    </div>
</div>

<div class="spinner__loader">
    <div class="spinner"></div>
    <p>Chargement en cours...</p>
</div>
</body>
</html>