<?php

namespace App\Controller;

class Controller
{
    public function route(): void
    {
        try{
            if(isset($_GET['controller'])){
                switch ($_GET['controller']) {
                    case 'page':
                        // charger contoleur page
                        $pagecontroller = new PageController();
                        $pagecontroller->route();
                        break;
                        case 'book':
                            // charger contoleur book
                            $pagecontroller = new BookController();
                            $pagecontroller->route();
                          
                            break;
                    
                    default:
                        // Erreur
                        throw new \Exception("le controleur n'existe pas");
                        break;
                }
            }else{
                // chargement la page d'accueil si pas de controleur dans l'url
                $pagecontroller = new PageController();
                $pagecontroller->home();
            }
        } catch(\Exception $e){
            $this->render('errors/default',[
                'error'=>$e->getMessage()
            ]);
        }
       
    }
    protected function render(string $path, array $params = []): void
    {
        $filePath = _ROOTPATH_.'/templates/'.$path.'.php';

         try{
            if(!file_exists($filePath)){
                // générer erreur
                throw new \Exception("fichier non trouvé:".$filePath);
               }else {
                // extrait chaque ligne du tableau et crée des variables pour chacun
                extract($params);
                require_once $filePath;
               }
         }catch(\Exception $e){
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
         }
                    
      
    }
}