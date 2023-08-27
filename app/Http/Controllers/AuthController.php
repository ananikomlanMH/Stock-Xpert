<?php

namespace App\Http\Controllers;

use App\Components\Router\Router;
use App\Components\Viewer\View;
use App\Helpers\ResponseResolver\ResponseResolverHelper;
use App\Models\Utilisateurs;

class AuthController
{

    public function index(): string
    {
        return View::render('Auth.login');
    }

    public function logout(){
        if(session_status() == PHP_SESSION_DISABLED){
            session_start();
        }
        session_destroy();
        return ResponseResolverHelper::sendResponse([
            'type' => 'success',
            'message' => "Deconnexion reussie de StockXpert ".date("Y"),
            'redirection' => '/login'
        ]);
    }
    public function login()
    {
        $data = $_POST;
        if (!empty($_SESSION['connected']) && $_SESSION['connected'] === true){
            header("Location: /");
        }else{
            $count_user = Utilisateurs::all()->count();

            if ($count_user == 0){
                $user = Utilisateurs::create([
                    'nom' => 'admin',
                    'prenom' => '',
                    'telephone' => '',
                    'adresse' => '',
                    'login' => 'admin',
                    'password' => 'admin',
                    'type' => 'Administrateur',
                ]);
                $_SESSION['connected'] = true;
                $_SESSION['username'] = $user->login;
                $_SESSION['type'] = $user->type;
                $_SESSION['id'] = $user->id;

                $url = Router::route('home');
                if(!empty($_COOKIE['redirect_login'])){
                    $url = $_COOKIE['redirect_login'];
                }
                return ResponseResolverHelper::sendResponse([
                    'type' => 'success',
                    'message' => "Bienvenue en mode <b>Invité</b> sur StockXpert ".date("Y"),
                    'redirection' => $url
                ]);
            }else{
                $user = Utilisateurs::where('login', $data['username'])->first();
                if (!empty($user)){

                    if (password_verify($data['password'], $user->password)){
                        $_SESSION['connected'] = true;
                        $_SESSION['username'] = $user->nom . " ".$user->prenom;
                        $_SESSION['type'] = $user->type;
                        $_SESSION['id'] = $user->id;

                        $url = Router::route('home');
                        if(isset($_COOKIE['redirect_login'])){
                            $url = $_COOKIE['redirect_login'];
                        }

                        return ResponseResolverHelper::sendResponse([
                            'type' => 'success',
                            'message' => "Bienvenue <b>".$user->nomPrenom(). "</b> sur StockXpert ".date("Y"),
                            'redirection' => $url
                        ]);

                    }else{
                        return ResponseResolverHelper::sendResponse([
                            'redirection' => Router::route('login'),
                            'type' => 'error',
                            'message' => 'Username ou password incorrect. Veillez-ressayer!'
                        ]);
                    }
                }else{
                    return ResponseResolverHelper::sendResponse([
                        'redirection' => Router::route('login'),
                        'type' => 'error',
                        'message' => 'Username ou password incorrect. Veillez-ressayer!'
                    ]);
                }
            }

        }
    }
}