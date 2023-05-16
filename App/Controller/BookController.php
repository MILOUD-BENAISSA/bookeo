<?php

namespace App\Controller;

use App\Repository\BookRepository;

class BookController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        // on appelle la méthode show()
                        $this->show();
                        break;
                    case 'list':
                        //Appeler méthode list()
                        break;
                    case 'edit':
                        //Appeler méthode edit()
                        break;
                    case 'add':
                        //Appeler méthode add()
                        break;
                    case 'delete':
                        //Appeler méthode delete()
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
    // exemple d'appel depuis l'url?controller=book=show&id=1
    protected function show()
    {
        try {
            if (isset($_GET['id'])) {
                $id = (int)$_GET['id'];
                // charger le livre par un appel au repository
                $bookRepository = new BookRepository();
                $book = $bookRepository->findOneById($id);
                $this->render('book/show', [
                    'book' => $book

                ]);
            } else {
                throw new \Exception("L'id est manquant en paramètre");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
}
