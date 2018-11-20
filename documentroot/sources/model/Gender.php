<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.10.18
 * Time: 15:21
 */

require_once "sources/model/Database.php";
require_once "sources/model/iPersistable.php";
require_once "sources/model/Coordinate.php";
require_once "sources/model/Scene.php";
require_once "sources/model/Performance.php";
require_once "sources/model/Contract.php";
require_once "sources/model/VIPContract.php";
require_once "sources/model/StandardContract.php";

class Gender implements iPersistable
{
    private $id;
    private $name;

    private $pdo; // Need database connection

    /**
     * Scene constructor.
     * @param $name
     * @param $localization
     */
    public function __construct()
    {
        $this->pdo = Database::dbConnection();
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
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
        $stmt = $this->pdo->prepare('select id, name  from Genders where Genders.id = :id');
        $stmt->execute(['id' => $id]);
        extract($stmt->fetch(PDO::FETCH_ASSOC)); // $id, $name
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Load the object's members with the data of the database record with the id given by the id member
     *
     * @return void
     * @throws exception if the record wasn't found
     */
    public function reload()
    {
        // TODO: Implement reload() method.
    }

    /**
     * Creates record(s) in the db for the object state. The id member is updated with the value picked by the db
     *
     * @return void
     * @throws exception if the record wasn't created because of some db constraint violation
     */
    public function create()
    {
        $stmt = $this->pdo->prepare('
                    insert into Genders (Name)
                    values (:Name)
        ');
        $stmt->execute(['Name' => $this->name]);
        $this->id = $this->pdo->lastInsertId();
    }

    /**
     * Stores the state of the object in the db record(s)
     *
     * @return void
     * @throws exception if the record wasn't created because of some db constraint violation
     */
    public function store()
    {
        error_log("Storing: ['name' => {$this->name}, 'id' => {$this->id}]");
        $stmt = $this->pdo->prepare('
                    update Genders set Name = :name
                    where id = :id
        ');
        $stmt->execute(['name' => $this->name, 'id' => $this->id]);
    }

    /**
     * Deletes the db record(s)
     *
     * @return void
     * @throws exception if the record couldn't be deleted because of some db constraint violation
     */
    public function destroy()
    {
        $stmt = $this->pdo->prepare('delete from Genders where id = :id');
        $stmt->execute(['id' => $this->id]);
    }

    /**
     * Returns the list of all objects read from the database
     * @return mixed
     */
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}