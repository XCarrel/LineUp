<?php
/**
 * Created by PhpStorm.
 * User: David.NIEMBRO
 * Date: 01.10.2018
 * Time: 14:39
 */
require_once "sources/model/Database.php";
require_once "sources/model/iPersistable.php";


class Country implements iPersistable
{
    private $id;
    private $name;
    /**
     * Artist constructor.
     * @param $id
     * @param $name
     */

    public function __construct()
    {
        $this->pdo = Database::dbConnection();
    }

     /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    
    public static function all()
    {
        $pdo = Database::dbConnection();
        $results = $pdo->prepare('select id from Countries');
        $results->execute();
        foreach ($results->fetchAll() as $result)
        {
            $country = new Country();
            $country->load($result['id']);
            $data[] = $country;
        }
        return $data;
    }

    public function load($id)
    {
        $results = $this->pdo->prepare('
            select
              Countries.id,
              Countries.Name as name from Countries where Countries.id = :id
        ');
        $results->execute(['id' => $id]);
        extract($results->fetch(PDO::FETCH_ASSOC)); 
        $this->id = $id;
        $this->name = $name;
      
    }

    public function reload()
    {
    }
    
    public function create()
    {
    }

    public function store()
    {    
    }

    public function destroy()
    {
    }

    private function readPerformances($aid)
    {
    }
}