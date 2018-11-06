<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.10.18
 * Time: 15:21
 */

class ContractType implements iPersistable
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
        $stmt = $this->pdo->prepare('select id, name  from ContractTypes where id = :id');
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
        // TODO: Implement create() method.
    }

    /**
     * Stores the state of the object in the db record(s)
     *
     * @return void
     * @throws exception if the record wasn't created because of some db constraint violation
     */
    public function store()
    {
        // TODO: Implement store() method.
    }

    /**
     * Deletes the db record(s)
     *
     * @return void
     * @throws exception if the record couldn't be deleted because of some db constraint violation
     */
    public function destroy()
    {
        // TODO: Implement destroy() method.
    }

    /**
     * Returns the list of all objects read from the database
     * @return mixed
     */
    public static function All()
    {
        $pdo = Database::dbConnection();
        $stmt = $pdo->prepare('select id from ContractTypes');
        $stmt->execute();
        foreach ($stmt->fetchAll() as $item)
        {
            $type = new ContractType();
            $type->load($item['id']);
            $res[] = $type;
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