<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.10.18
 * Time: 15:21
 */

//Necessary to get all the genders
require_once "sources/model/Database.php";
require_once "sources/model/iPersistable.php";

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
     * Set the value of Name
     *
     * @param mixed name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set the value of id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
      $stmt = $this->pdo->prepare('insert into Genders (Name) values (:name)');
      $stmt->execute(['name' => $this->name]);
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
      $stmt = $this->pdo->prepare('update Genders set Name = :name where id = :id');
      $stmt->execute(['name' => $this->name, 'id' => $this->id]);
    }

    /**
     * Deletes the db record(s)
     *
     * @return void
     * @throws exception if the record couldn't be deleted because of some db constraint violation
     */
    public function destroy() //Delete a gender who isn't empty
    {
         $stmt = $this->pdo->prepare('delete from Genders where id = :id');
         //try to execute the query, if it doesn't works, there's no crash and nothing happens
         try {
            $stmt->execute(['id' => $this->id]);
         } catch (\Exception $e) {

         }
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
            $gender = new Gender();
            $gender->load($item['id']);
            $res[] = $gender;
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
