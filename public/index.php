<?php
session_start();
require dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . "/config.php";
require_once dirname(__DIR__) . "/bootstrap.php";
require_once dirname(__DIR__) . "/app/Helpers/Functions/functions.php";

use App\Components\Admin\Auth;
use App\Components\Router\Router;
use DebugBar\StandardDebugBar;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

$auth = new Auth();
$auth->checkAuth();

if (!mode_production) {
    $whoops = new Run;
    $whoops->pushHandler(new PrettyPageHandler);
    $whoops->register();

    $debugbar = new StandardDebugBar();
    $debugbarRenderer = $debugbar->getJavascriptRenderer();

    $GLOBALS['debugbar'] = $debugbarRenderer;
}
$GLOBALS['auth'] = $auth;


$Route = new Router();
try {

    $Route->get('/', [\App\Http\Controllers\HomeController::class, 'index'], 'home');
    $Route->get('/login', [\App\Http\Controllers\AuthController::class, 'index'], 'login');
    $Route->post('/login', [\App\Http\Controllers\AuthController::class, 'login'], 'login.auth');
    $Route->post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'], 'logout');

    /*
     * Ventes
     */
    $Route->get('/vente', [\App\Http\Controllers\FacturesController::class, 'index'], 'vente');
    $Route->get('/vente/new', [\App\Http\Controllers\FacturesController::class, 'addForm'], 'vente.addForm');
    $Route->post('/vente/new', [\App\Http\Controllers\FacturesController::class, 'add'], 'vente.add');
    $Route->post('/vente/delete/[i:id]', [\App\Http\Controllers\FacturesController::class, 'delete'], 'vente.delete');
    $Route->post('/vente/add-article', [\App\Http\Controllers\FacturesController::class, 'addArticle'], 'vente.addArticle');
    $Route->post('/vente/delete-article/[i:id]', [\App\Http\Controllers\FacturesController::class, 'deleteArticle'], 'vente.deleteArticle');
    $Route->post('/vente-remove', [\App\Http\Controllers\FacturesController::class, 'remove'], 'vente.remove');
    $Route->get('/vente/print/[i:id]', [\App\Http\Controllers\FacturesController::class, 'print'], 'vente.print');

    /*
     * Stock
     */
    $Route->get('/stock', [\App\Http\Controllers\StocksController::class, 'index'], 'stock');
    $Route->get('/stock/print', [\App\Http\Controllers\StocksController::class, 'print'], 'stock.print');
    $Route->get('/stock/new', [\App\Http\Controllers\StocksController::class, 'addForm'], 'stock.addForm');
    $Route->post('/stock/new', [\App\Http\Controllers\StocksController::class, 'add'], 'stock.add');
    $Route->get('/stock/edit/[i:id]', [\App\Http\Controllers\StocksController::class, 'editForm'], 'stock.editForm');
    $Route->post('/stock/edit/[i:id]', [\App\Http\Controllers\StocksController::class, 'edit'], 'stock.edit');
    $Route->post('/stock/delete/[i:id]', [\App\Http\Controllers\StocksController::class, 'delete'], 'stock.delete');
    $Route->post('/stock-get/[i:id]', [\App\Http\Controllers\StocksController::class, 'getStock'], 'stock.getStock');


    /*
     * Catégorie produits
     */
    $Route->get('/categorie-article', [\App\Http\Controllers\CategoriesArticleController::class, 'index'], 'settings.categorie');
    $Route->get('/categorie-article/new', [\App\Http\Controllers\CategoriesArticleController::class, 'addForm'], 'settings.categorie.addForm');
    $Route->post('/categorie-article/new', [\App\Http\Controllers\CategoriesArticleController::class, 'add'], 'settings.categorie.add');
    $Route->get('/categorie-article/edit/[i:id]', [\App\Http\Controllers\CategoriesArticleController::class, 'editForm'], 'settings.categorie.editForm');
    $Route->post('/categorie-article/edit/[i:id]', [\App\Http\Controllers\CategoriesArticleController::class, 'edit'], 'settings.categorie.edit');
    $Route->post('/categorie-article/delete/[i:id]', [\App\Http\Controllers\CategoriesArticleController::class, 'delete'], 'settings.categorie.delete');

    /*
     * Articles
     */
    $Route->get('/articles', [\App\Http\Controllers\ArticlesController::class, 'index'], 'settings.article');
    $Route->get('/article/new', [\App\Http\Controllers\ArticlesController::class, 'addForm'], 'settings.article.addForm');
    $Route->post('/article/new', [\App\Http\Controllers\ArticlesController::class, 'add'], 'settings.article.add');
    $Route->get('/article/edit/[i:id]', [\App\Http\Controllers\ArticlesController::class, 'editForm'], 'settings.article.editForm');
    $Route->post('/article/edit/[i:id]', [\App\Http\Controllers\ArticlesController::class, 'edit'], 'settings.article.edit');
    $Route->post('/article/delete/[i:id]', [\App\Http\Controllers\ArticlesController::class, 'delete'], 'settings.article.delete');

    /*
     * Depenses
     */
    $Route->get('/depenses', [\App\Http\Controllers\DepensesController::class, 'index'], 'depense');
    $Route->get('/depense/new', [\App\Http\Controllers\DepensesController::class, 'addForm'], 'depense.addForm');
    $Route->post('/depense/new', [\App\Http\Controllers\DepensesController::class, 'add'], 'depense.add');
    $Route->get('/depense/edit/[i:id]', [\App\Http\Controllers\DepensesController::class, 'editForm'], 'depense.editForm');
    $Route->post('/depense/edit/[i:id]', [\App\Http\Controllers\DepensesController::class, 'edit'], 'depense.edit');
    $Route->post('/depense/delete/[i:id]', [\App\Http\Controllers\DepensesController::class, 'delete'], 'depense.delete');

    /*
     * Utilisateurs
     */
    $Route->get('/utilisateur', [\App\Http\Controllers\UtilisateurController::class, 'index'], 'settings.utilisateur');
    $Route->get('/utilisateur/new', [\App\Http\Controllers\UtilisateurController::class, 'addForm'], 'settings.utilisateur.addForm');
    $Route->post('/utilisateur/new', [\App\Http\Controllers\UtilisateurController::class, 'add'], 'settings.utilisateur.add');
    $Route->get('/utilisateur/edit/[i:id]', [\App\Http\Controllers\UtilisateurController::class, 'editForm'], 'settings.utilisateur.editForm');
    $Route->post('/utilisateur/edit/[i:id]', [\App\Http\Controllers\UtilisateurController::class, 'edit'], 'settings.utilisateur.edit');
    $Route->post('/utilisateur/delete/[i:id]', [\App\Http\Controllers\UtilisateurController::class, 'delete'], 'settings.utilisateur.delete');

    $Route->get('/configuration', [\App\Http\Controllers\ConfigurationController::class, 'index'], 'settings.configuration');
    $Route->post('/configuration/edit', [\App\Http\Controllers\ConfigurationController::class, 'edit'], 'configuration.edit');

    /*
    * Caisses
    */
    $Route->get('/caisses', [\App\Http\Controllers\CaissesController::class, 'index'], 'caisse');

    /*
    * Inventaires
    */
    $Route->get('/inventaire', [\App\Http\Controllers\InventairesController::class, 'index'], 'inventaire');
    $Route->get('/inventaire/new', [\App\Http\Controllers\InventairesController::class, 'addForm'], 'inventaire.addForm');
    $Route->post('/inventaire/new', [\App\Http\Controllers\InventairesController::class, 'add'], 'inventaire.add');
    $Route->post('/inventaire-remove', [\App\Http\Controllers\InventairesController::class, 'remove'], 'inventaire.remove');
    $Route->get('/inventaire/print/[i:id]', [\App\Http\Controllers\InventairesController::class, 'print'], 'inventaire.print');


    /*
     * Approvisonnement
     */
    $Route->get('/approvisionnement', [\App\Http\Controllers\ApprovisionnementsController::class, 'index'], 'appro');
    $Route->get('/approvisionnement/new', [\App\Http\Controllers\ApprovisionnementsController::class, 'addForm'], 'appro.addForm');
    $Route->post('/approvisionnement/new', [\App\Http\Controllers\ApprovisionnementsController::class, 'add'], 'appro.add');
    $Route->post('/approvisionnement/delete/[i:id]', [\App\Http\Controllers\ApprovisionnementsController::class, 'delete'], 'appro.delete');
    $Route->post('/approvisionnement/add-article', [\App\Http\Controllers\ApprovisionnementsController::class, 'addArticle'], 'appro.addArticle');
    $Route->post('/approvisionnement/delete-article/[i:id]', [\App\Http\Controllers\ApprovisionnementsController::class, 'deleteArticle'], 'appro.deleteArticle');
    $Route->post('/approvisionnement-remove', [\App\Http\Controllers\ApprovisionnementsController::class, 'remove'], 'appro.remove');
    $Route->get('/approvisionnement/print/[i:id]', [\App\Http\Controllers\ApprovisionnementsController::class, 'print'], 'appro.print');

    $Route->run();


} catch (Exception $exception) {
    $error = $exception->getMessage() . " in file {$exception->getFile()} at line: {$exception->getLine()}";
    if (!mode_production) {
        dd($whoops);
        $html = $whoops->handleException($exception);
    } else {
        $logPath = dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . "Debug" . DIRECTORY_SEPARATOR . "logs" . DIRECTORY_SEPARATOR . date("d_m_Y") . "_logs.txt";
        file_put_contents($logPath, date("H:i:s", time()) . "  --->  " . $error . PHP_EOL . PHP_EOL, FILE_APPEND);
        header("Location: /");
    }
}