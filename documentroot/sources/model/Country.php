<?php
/**
 *
 */
class Country
{
   private $id;
   private $name;
   private $pdo;

   function __construct()
   {
      $this->pdo = Database::dbConnection();
   }

   /**
    * Get the value of Name
    *
    * @return mixed
    */
     public function getId()
     {
          return $this->id;
     }

    /**
     * Get the value of Name
     *
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
        $stmt = $pdo->prepare('select id from Countries');
        $stmt->execute();
        foreach ($stmt->fetchAll() as $item)
        {
            $country = new Country();
            $country->load($item['id']);
            $res[] = $country;
        }
        return $res;
    }

    public function load($id){
      $stmt = $this->pdo->prepare('select Countries.Name from Countries WHERE id = :id');
      $stmt->execute(['id' => $id]);
      extract($stmt->fetch(PDO::FETCH_ASSOC)); //$Name
      $this->id = $id;
      $this->name = $Name;
   }

    public function reload(){}
    public function create(){}
    public function store(){}
    public function destroy(){}
}
?>
