<?php

namespace AirwaysBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class LoadCategoryFlight implements FixtureInterface {
  public function load(ObjectManager $manager) {
   Fixtures::load(__DIR__."/fixtures.yml", $manager);
  }

  public function getOrder() {
    return 1;
  }

}