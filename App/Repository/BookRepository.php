<?php

namespace App\Repository;

use App\Entity\Book;
use App\Db\Mysql;
use  App\Tools\StringTools;

class BookRepository
{
    public function findOneById(int $id)
    {
        // Appel bdd
        $mysql = Mysql::getInstance();
        $pdo = $mysql->getPDO();
        
        $query = $pdo->prepare('SELECT * FROM book WHERE id = :id');
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $book = $query->fetch($pdo::FETCH_ASSOC);

        // $book = ['id' => 1, 'title' => 'titre test', 'description' => 'description test'];
        $bookEntity = new Book();

        // $bookEntity->setId($book['id']);
        // $bookEntity->setTitle($book['title']);
        // $bookEntity->setDescription($book['description']);

        foreach($book as $key => $value){
            // var_dump(StringTools::toPascalCase($key));
            $bookEntity->{'set'.StringTools::toPascalCase($key)}($value);
        }

        return $bookEntity;
    }
}
