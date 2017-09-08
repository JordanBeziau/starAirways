<?php

namespace AirwaysBundle\DataFixtures\ORM;

use AirwaysBundle\Entity\Flight;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class LoadCategoryFlight extends AbstractFixture implements OrderedFixtureInterface {
  public function load(ObjectManager $manager) {
   $objects = Fixtures::load(__DIR__."/fixtures.yml", $manager);
  }

  public function getOrder() {
    // TODO: Implement getOrder() method.
  }

}