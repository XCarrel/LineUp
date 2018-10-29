<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 15.10.18
 * Time: 14:23
 */

require_once "sources/model/Artist.php";

class UnitTests
{
    public static function testPersistableOnArtist()
    {
        error_log("------------- Unit test Persistable on Artist -------------");
        $a = new Artist();
        $a->load(1);

        // Test creation usin a duplicate
        $a->create();
        if ($a->getId() == 1)
            error_log(" ##### ERROR on create #####");
        else
            error_log("Create: OK (id={$a->getId()})");

        // Test change
        $a->setName("TEST");
        $a->store();

        $b = new Artist();
        $b->load($a->getId());
        if ($b->getName() == "TEST")
            error_log("Store: OK");
        else
            error_log(" ##### ERROR on store #####");

        // Test reload
        $a->setName("Temporary value");
        $a->reload();
        if ($a->getName() == "TEST")
            error_log("Reload: OK");
        else
            error_log(" ##### ERROR on store #####");

        // Test delete
        $bid = $b->getId();
        $b->destroy();
        error_log("------------- Unit test end -------------");
    }
}