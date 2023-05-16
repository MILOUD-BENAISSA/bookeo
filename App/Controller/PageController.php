<?php

namespace App\Controller;

class PageController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'about':
                        // on appelle la méthode about()
                        $this->about();
                        break;
                    case 'home':
                        // charger contoleur home
                        $this->home();
                        break;

                    default:
                        // Erreur
                        throw new \Exception("cette action n'existe pas:" . $_GET['action']);
                        break;
                }
            } else {
                throw new \Exception("Aucune action détectée");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
    // exemple d'appel depuis l'url?controller=page&action=about
    protected function about()
    {
        // on pourrait récupérer les données en faisant appel ou modéle
        // on passe en premier paramète la page à charger et en deuxième un tableau associatif de paramètres
        $this->render('page/about', [
            'test' => 'abc',
            'test3' => 'abc3'
        ]);
    }
     // exemple d'appel depuis l'url?controller=page&action=home
    protected function home()
    {


        $this->render('page/home', []);
    }
}
