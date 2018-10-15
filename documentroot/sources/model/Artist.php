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

class Artist implements iPersistable
{
    private $id;
    private $name;
    private $description;
    private $kind; // for display
    private $gender_id; // for joins
    private $country; // for display
    private $country_id; // for join
    private $picture;
    private $performances;
    private $contract; // for display
    private $contract_id; // for join

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
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @return mixed
     */
    public function getPerformances()
    {
        return $this->performances;
    }

    /**
     * @param mixed $performances
     */
    public function setPerformances($performances)
    {
        $this->performances = $performances;
    }

    /**
     * @return mixed
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * @param mixed $contract
     */
    public function setContract($contract)
    {
        $this->contract = $contract;
    }

    public function hasContract()
    {
        return $this->contract != null;
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
        $stmt = $pdo->prepare('select id from Artists');
        $stmt->execute();
        foreach ($stmt->fetchAll() as $item)
        {
            $artist = new Artist();
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
        $stmt = $this->pdo->prepare('
            select
              Artists.id,
              Artists.Name as name,
              Artists.Mainpicture as mainpicture,
              Artists.Description as description,
              Artists.Gender_id,
              Artists.Country_id,
              Artists.Contract_id,
              Genders.Name as kind,
              Countries.Name as country,
              Contracts.signedOn,
              Contracts.description as contracttext,
              Contracts.fee,
              Contracts.restaurant,
              Contracts.car,
              Contracts.nbMeals,
              Contracts.contractType_id
            from
              Artists inner join
              Countries on Artists.Country_id = Countries.id inner join
              Genders on Artists.Gender_id = Genders.id left join
                (Contracts inner join
                ContractTypes on Contracts.contractType_id = ContractTypes.id) 
                on Artists.Contract_id = Contracts.id 
            where Artists.id = :id
        ');
        $stmt->execute(['id' => $id]);
        extract($stmt->fetch(PDO::FETCH_ASSOC)); // $id, $name, $mainpicture, $description, $kind, $Gender_id, $country, $Country_id, $Contract_id, $signeOn, $contracttext, $fee, $restaurant, $car, $nbMeals, $contractType_id

        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->kind = $kind;
        $this->gender_id = $Gender_id;
        $this->country = $country;
        $this->country_id = $Country_id;
        $this->contract_id = $Contract_id;
        $this->picture = $mainpicture;
        $this->performances = self::readPerformances($id);

        // Instanciate the appropriate contract type
        switch($contractType_id)
        {
            case 1:
                $contract = new VIPContract($contracttext, $fee, $restaurant, $car);
                break;
            case 2:
                $contract = new StandardContract($contracttext, $fee, $nbMeals);
                break;
        }
        $this->contract = $contract;
    }

    /**
     * Load the object's members with the data of the database record with the id given by the id member
     *
     * @return void
     * @throws exception if the record wasn't found
     */
    public function reload()
    {
        $this->load($this->id);
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
                    insert into Artists (Name, Description, Gender_id, Country_id, Mainpicture)
                    values (:name,:descr,:gender,:country,:pic)
        ');
        $stmt->execute(['name' => $this->name,'descr' => $this->description,'gender' => $this->gender_id,'country' => $this->country_id,'pic' => $this->picture]);
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
                    update Artists set Name = :name, Description = :descr, Gender_id = :gender, Country_id = :country, Contract_id = :contract, Mainpicture = :pic
                    where id = :id
        ');
        $stmt->execute(['name' => $this->name,'descr' => $this->description,'gender' => $this->gender_id,'country' => $this->country_id,'contract' => $this->contract_id,'pic' => $this->picture, 'id' => $this->id]);
    }

    /**
     * Deletes the db record(s)
     *
     * @return void
     * @throws exception if the record couldn't be deleted because of some db constraint violation
     */
    public function destroy()
    {
        $stmt = $this->pdo->prepare('delete from Artists where id = :id');
        $stmt->execute(['id' => $this->id]);
    }

    private function readPerformances($aid)
    {
        $stmt = $this->pdo->prepare('select Date_time as datetime, Duration as duration, S.Name as scene, S.Localisation
        from PerformanceDates inner join Scenes S on PerformanceDates.Scene_id = S.id
        where Artist_id = :aid;');
        $stmt->execute(['aid' => $aid]);
        foreach ($stmt->fetchAll() as $perf)
        {
            $coos = preg_split(";", $perf['Localisation']);
            $coobj = new Coordinate(floatval($coos[0]), floatval($coos[1]));
            $sceneobj = new Scene($perf['scene'], $coobj);
            $perfObj = new Performance(new DateTime($perf['datetime']), $perf['duration'], $sceneobj);
            $perfs[] = $perfObj;
        }
        return $perfs;
    }

}