<?php
/**
 *
 */
class Gender
{
   private $name;
   private $pdo;

   function __construct()
   {
      $this->pdo = Database::dbConnection();
   }

    /**
     * Get the value of Gender
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Gender
     *
     * @param mixed gender
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
    public function load($id){
      $stmt = $this->pdo->prepare('select Genders.Name from Genders WHERE id = :id');
      $stmt->execute(['id' => $id]);
      extract($stmt->fetch(PDO::FETCH_ASSOC)); //$Name
      $this->name = $Name;
   }
    public function reload(){}
    public function create(){}
    public function store(){}
    public function destroy(){}
}
?>
