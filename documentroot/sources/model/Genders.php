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
                    values (:name)
        ');
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


}