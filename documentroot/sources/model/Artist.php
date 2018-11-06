<?php
/**
 * Created by PhpStorm.
 * User: David.NIEMBRO
 * Date: 01.10.2018
 * Time: 14:39
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
    private $kind;
    private $gender_id;
    private $country;
    private $country_id;
    private $picture;
    private $contract;
    private $performance;
    private $contract_id;
    private $pdo;

    /**
     * Artist constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $kind
     * @param $country
     * @param $picture
     * @param $contract
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

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @param mixed $kind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;
    }

    public function getGender()
    {
        return $this->gender_id;
    }
    public function setGender($gender_id)
    {
        $this->gender_id = $gender_id;
    }


    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    public function getCountryID()
    {
        return $this->country_id;
    }
    public function setCountryID($country_id)
    {
        $this->country_id = $country_id;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
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

    /**
     * @return mixed
     */
    public function getPerformances()
    {
        return $this->performance;
    }

    /**
     * @param mixed $performance
     */
    public function setPerformances($performance)
    {
        $this->performance = $performance;
    }

    public function hasContract()
    {
        return $this->contract != null;
    }

    public static function all()
    {
        $pdo = Database::dbConnection();
        $results = $pdo->prepare('select id from Artists');
        $results->execute();
        foreach ($results->fetchAll() as $result)
        {
            $artist = new Artist();
            $artist->load($result['id']);
            $data[] = $artist;
        }
        return $data;
    }

    public function load($id)
    {
        $results = $this->pdo->prepare('
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
        $results->execute(['id' => $id]);
        extract($results->fetch(PDO::FETCH_ASSOC)); 
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
        $contract = null;
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

    public function reload()
    {
        $this->load($this->id);
    }
    
    public function create()
    {
        $results = $this->pdo->prepare('
                    insert into Artists (Name, Description, Gender_id, Country_id, Mainpicture)
                    values (:name,:descr,:gender,:country,:pic)
        ');
        $results->execute(['name' => $this->name,'descr' => $this->description,'gender' => $this->gender_id,'country' => $this->country_id,'pic' => $this->picture]);
        $this->id = $this->pdo->lastInsertId();
    }

    public function store()
    {
        $results = $this->pdo->prepare('
                    update Artists set Name = :name, Description = :descr, Gender_id = :gender, Country_id = :country, Contract_id = :contract, Mainpicture = :pic
                    where id = :id
        ');
        $results->execute(['name' => $this->name,'descr' => $this->description,'gender' => $this->gender_id,'country' => $this->country_id,'contract' => $this->contract_id,'pic' => $this->picture, 'id' => $this->id]);
    }

    public function destroy()
    {
        $results = $this->pdo->prepare('delete from Artists where id = :id');
        $results->execute(['id' => $this->id]);
    }

    private function readPerformances($aid)
    {
        $results = $this->pdo->prepare('select Date_time as datetime, Duration as duration, S.Name as scene, S.Localisation
        from PerformanceDates inner join Scenes S on PerformanceDates.Scene_id = S.id
        where Artist_id = :aid;');
        $results->execute(['aid' => $aid]);
        foreach ($results->fetchAll() as $result)
        {
            $coos = explode(";", $result['Localisation']);
            $coobj = new Coordinate(floatval($coos[0]), floatval($coos[1]));
            $sceneobj = new Scene($result['scene'], $coobj);
            $perfObj = new Performance(new DateTime($result['datetime']), $result['duration'], $sceneobj);
            $perfs[] = $perfObj;
        }
        return $perfs;
    }
}