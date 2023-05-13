<?php

namespace App\Controller;

class PageController extends Controller
{
    public function route(): void
    {

        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'about':
                    // on appelle la méthode about()
                    $this->about();
                    break;
                case 'home':
                    // charger contoleur home
                    var_dump('on appelle la méthode home');
                    break;

                default:
                    // Erreur
                    break;
            }
        } else {
            // charger la page d'accueil
        }
    }
    protected function about()
    {

        // on pourrait récupérer les données en faisant appel ou modéle
        // on passe en premier paramète la page à charger et en deuxième un tableau associatif de paramètres
        $this->render('page/about', [
            'test' => 'abc',
            'test3' => 'abc3'
        ]);
    }
}
