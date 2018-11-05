<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 01.10.18
 * Time: 14:07
 */

require_once "sources/model/Database.php";
require_once "sources/model/iPersistable.php";
require_once "sources/model/Coordinate.php";
require_once "sources/model/Scene.php";
require_once "sources/model/Performance.php";
require_once "sources/model/Contract.php";
require_once "sources/model/VIPContract.php";
require_once "sources/model/StandardContract.php";

class Country implements iPersistable
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
        $stmt = $pdo->prepare('select id from Countries');
        $stmt->execute();
        foreach ($stmt->fetchAll() as $item)
        {
            $artist = new Country();
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
        $stmt = $this->pdo->prepare('SELECT name from Countries where Countries.id = :id');
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

    }

    public function store()
    {

    }

    public function destroy()
    {

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

}