<?php
/**
 * Created by PhpStorm.
 * User: David.NIEMBRO
 * Date: 01.10.2018
 * Time: 14:39
 */
require_once "sources/model/database.php";
require_once "sources/model/iPersistable.php";


class Gender implements iPersistable
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
        $results = $pdo->prepare('select id from Genders');
        $results->execute();
        foreach ($results->fetchAll() as $result)
        {
            $gender = new Gender();
            $gender->load($result['id']);
            $data[] = $gender;
        }
        return $data;
    }

    public function load($id)
    {
        $results = $this->pdo->prepare('
            select
            Genders.id,
            Genders.Name as name from Genders where Genders.id = :id
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