<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StockXpert | @yield('title', date('Y'))</title>

    <!--    Favicon -->
    <link rel="shortcut icon" href="/vendors/images/favicon.svg" type="image/x-icon">

    <link rel="stylesheet" href="{{ \App\Helpers\FileUrlHelper\FileUrl::getUrl('app.css') }}">

    <!--    Icons -->
    <link rel="stylesheet" href="/vendors/css/icons/uicons/css/uicons-regular-rounded.min.css">
    <link rel="stylesheet" href="/vendors/css/icons/font-awesome/css/all.min.css">

    <!--    JS Files -->
    <script defer src="{{ \App\Helpers\FileUrlHelper\FileUrl::getUrl('app.js') }}"
            data-turbolinks-track="reload"></script>

    @if(!mode_production && !empty($GLOBALS['debugbar']))
        {!! $GLOBALS['debugbar']->renderHead() !!}
    @endif

</head>
<body>

<div class="sidebar">
    <div class="logo-details">
        <img src="/vendors/images/logo_black.svg" alt="logo" class="icon">
        <i class='fi-rr-align-right' id="close-nav"></i>
    </div>
    <ul class="nav-links">
        <li @class(['active' => str_starts_with(\App\Components\Router\Router::currentRoute(), 'home')])>
            <a href="{{ \App\Components\Router\Router::route('home') }}">
                <i class='fi-rr-dashboard'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Dashboard</a></li>
            </ul>
        </li>

        <li @class(['active' => str_starts_with(\App\Components\Router\Router::currentRoute(), 'vente')])>
            <a href="{{ \App\Components\Router\Router::route('vente') }}">
                <i class='fi-rr-ticket'></i>
                <span class="link_name">Vente Direct</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Vente Direct</a></li>
            </ul>
        </li>

        <li @class(['active' => str_starts_with(\App\Components\Router\Router::currentRoute(), 'caisse')])>
            <a href="{{ \App\Components\Router\Router::route('caisse') }}">
                <i class='fi-rr-money'></i>
                <span class="link_name">Caisse</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Caisse</a></li>
            </ul>
        </li>

        @if(in_array(\App\Components\Admin\Auth::User()->type, ['Comptable', 'Administrateur']))
        <li @class(['active' => str_starts_with(\App\Components\Router\Router::currentRoute(), 'stock')])>
            <a href="{{ \App\Components\Router\Router::route('stock') }}">
                <i class='fi-rr-package'></i>
                <span class="link_name">Stock</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Stock</a></li>
            </ul>
        </li>


        <li @class(['active' => str_starts_with(\App\Components\Router\Router::currentRoute(), 'inventaire')])>
            <a href="{{ \App\Components\Router\Router::route('inventaire') }}">
                <i class='fi-rr-bank'></i>
                <span class="link_name">Inventaire</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Inventaire</a></li>
            </ul>
        </li>

        <li @class(['active' => str_starts_with(\App\Components\Router\Router::currentRoute(), 'depense')])>
            <a href="{{ \App\Components\Router\Router::route('depense') }}">
                <i class='fi-rr-settings-sliders'></i>
                <span class="link_name">Dépenses</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Dépenses</a></li>
            </ul>
        </li>


        <li @class(['active' => str_starts_with(\App\Components\Router\Router::currentRoute(), 'appro')])>
            <a href="{{ \App\Components\Router\Router::route('appro') }}">
                <i class='fi-rr-paper-plane'></i>
                <span class="link_name">Approvisionnement</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Approvisionnement</a></li>
            </ul>
        </li>

        <li>
            <a href="">
                <i class='fi-rr-document-signed'></i>
                <span class="link_name">Commande</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="#">Commande</a></li>
            </ul>
        </li>

        <li @class(['active showMenu' => str_starts_with(\App\Components\Router\Router::currentRoute(), 'settings')])>
            <div class="iocn-link">
                <a class="dropdown-link">
                    <i class='fi-rr-settings'></i>
                    <span class="link_name">Paramètres</span>
                    <i class='fi-rr-angle-small-down arrow'></i>
                </a>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name" href="#">Paramètres</a></li>
                <li><a href="{{ \App\Components\Router\Router::route('settings.article') }}">Articles</a></li>
                <li><a href="{{ \App\Components\Router\Router::route('settings.categorie') }}">Catégories</a></li>
                <li><a href="{{ \App\Components\Router\Router::route('settings.utilisateur') }}">Utilisateurs</a></li>
                <li><a href="{{ \App\Components\Router\Router::route('settings.configuration') }}">Configuration</a></li>
            </ul>
        </li>
        @endif

        <li>
            <div class="profile-details">
                <div class="profile-content">
                    <img src="/vendors/images/favicon.svg" alt="profileImg">
                </div>
                <div class="name-job">
                    <div class="profile_name"><?= \App\Helpers\TextHelpers\Text::Excerpt($_SESSION["username"] ?? '', 10) ?></div>
                    <div class="job"><?= \App\Helpers\TextHelpers\Text::Excerpt($_SESSION["type"] ?? '') ?></div>
                </div>
                <i class='fi-rr-sign-out-alt log_out' id="JSlogout__user" data-url="{{ \App\Components\Router\Router::route('logout') }}"
                   style="min-width: 50px;"></i>
            </div>
        </li>
    </ul>
</div>

<section class="home-section">
    @yield('content')
</section>

<div class="spinner__loader">
    <div class="spinner"></div>
    <p>Chargement en cours...</p>
</div>
<div id="JS_GenerateForm"></div>
@if(!mode_production && !empty($GLOBALS['debugbar']))
    {!! $GLOBALS['debugbar']->render() !!}
@endif

<script>
    var notification = {!! \App\Helpers\Notification\Notification::getNotification() !!} {{ \App\Helpers\Notification\Notification::clearNotification() }};
    var searchList = {!! $searchListDataJSON ?? 'null' !!};

    @yield('script')
</script>
</body>
</html>