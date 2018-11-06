<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 01.10.18
 * Time: 14:07
 */
require_once "sources/model/Database.php";
require_once "sources/model/iPersistable.php";

class Countries implements iPersistable
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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the list of all objects read from the database
     *
     * This implementation is not optimal in termes of performance since it causes numerous database
     * queries. But it has DRY advantages
     *
     * @return mixed
     */
    public static function All()
    {
        $pdo = Database::dbConnection();
        $stmt = $pdo->prepare('select id, Name from Countries');
        $stmt->execute();
        foreach ($stmt->fetchAll() as $item)
        {
            $country = new Countries();
            $country->id = $item['id'];
            $country->name = $item['Name'];
            $res[] = $country;
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

    }

    /**
     * Load the object's members with the data of the database record with the id given by the id member
     *
     * @return void
     * @throws exception if the record wasn't found
     */
    public function reload()
    {

    }

    /**
     * Creates record(s) in the db for the object state. The id member is updated with the value picked by the db
     *
     * @return void
     * @throws exception if the record wasn't created because of some db constraint violation
     */
    public function create()
    {

    }

    /**
     * Stores the state of the object in the db record(s)
     *
     * @return void
     * @throws exception if the record wasn't created because of some db constraint violation
     */
    public function store()
    {

    }

    /**
     * Deletes the db record(s)
     *
     * @return void
     * @throws exception if the record couldn't be deleted because of some db constraint violation
     */
    public function destroy()
    {

    }
}