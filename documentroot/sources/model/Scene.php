<?php
/**
 * Created by PhpStorm.
 * User: David.NIEMBRO
 * Date: 01.10.2018
 * Time: 14:40
 */

class Scene implements iPersistable
{
    private $name;
    private $localization;
    /**
     * Scene constructor.
     * @param $name
     * @param $localization
     */
    public function __construct($name, $localization)
    {
        $this->name = $name;
        $this->localization = $localization;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @return mixed
     */
    public function getLocalization()
    {
        return $this->localization;
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
        // TODO: Implement load() method.
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
        // TODO: Implement All() method.
    }
}