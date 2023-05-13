<?php

namespace App\Controller;

class Controller
{
    public function route(): void
    {
        if(isset($_GET['controller'])){
            switch ($_GET['controller']) {
                case 'page':
                    // charger contoleur page
                    $pagecontroller = new PageController();
                    $pagecontroller->route();
                    break;
                    case 'book':
                        // charger contoleur book
                        var_dump('on charger BookController');
                        break;
                
                default:
                    // Erreur
                    break;
            }
        }else{
            // charger la page d'accueil
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
            echo $e->getMessage();
         }
                    
      
    }
}