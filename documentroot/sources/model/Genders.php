<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 30.10.2018
 * Time: 14:19
 */


require_once "sources/model/Database.php";
require_once "sources/model/iPersistable.php";

class Genders implements iPersistable
{
    private $id;
    private $name;
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::connexionPDO();
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



    public static function All()
    {
        $pdo = Database::connexionPDO();
        $stmt = $pdo->prepare('select id from Genders');
        $stmt->execute();
        foreach ($stmt->fetchAll() as $item)
        {
            $gender = new Genders();
            $gender->load($item['id']);
            $res[] = $gender;
        }
        return $res;
    }

    public function load($id)
    {
        $stmt = $this->pdo->prepare('select
              Genders.id,
              Genders.Name as name
            from
              Genders 
            where Genders.id = :id
        ');
        $stmt->execute(['id' => $id]);
        extract($stmt->fetch(PDO::FETCH_ASSOC)); // $id, $name
        $this->id = $id;
        $this->name = $name;
    }

    public function reload()
    {
        // TODO: Implement reload() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }


}