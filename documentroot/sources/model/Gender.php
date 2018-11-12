<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 01.10.18
 * Time: 14:07
 */

require_once "sources/model/Database.php";
require_once "sources/model/iPersistable.php";


class Gender implements iPersistable
{
    private $id;
    private $name;
    private $pdo; // Need database connection

    /**
     * Artist constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $kind
     * @param $country
     * @param $picture
     * @param $performances
     */
    public function __construct()
    {
        $this->pdo = Database::dbConnection();
    }


    public static function All()
    {
        $pdo = Database::dbConnection();
        $stmt = $pdo->prepare('select id from Genders');
        $stmt->execute();
        foreach ($stmt->fetchAll() as $item)
        {
            $artist = new Gender();
            $artist->load($item['id']);
            $res[] = $artist;
        }
        return $res;
    }

    /**
     * Load the object's members with the data of the database record with the given id
     * if the id member was set before the call, it is overwritten
     *
     * @param $id
     * @return void
     * @throws exception if the record wasn't found
     */
    public function load($id)
    {
        $stmt = $this->pdo->prepare('SELECT name from Genders where Genders.id = :id');
        $stmt->execute(['id' => $id]);
        extract($stmt->fetch(PDO::FETCH_ASSOC)); // name

        $this->name = $name;
        $this->id = $id;
    }



    public function reload()
    {

    }

    public function create()
    {
        $stmt = $this->pdo->prepare('
                    insert into Genders (Name)
                    values (:Name)
        ');
        $stmt->execute(['Name' => $this->name]);
        $this->id = $this->pdo->lastInsertId();
    }

    public function store()
    {

    }

    public function destroy()
    {
        $stmt = $this->pdo->prepare('delete from Genders where id = :id');
        $stmt->execute(['id' => $this->id]);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function getId(){
        return $this->id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}