<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\ToDo;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      for ($i = 1; $i <= 10; $i++) {
        $this->createToDo($manager, $i);
      }
    }

  /**
   *
   * @param ObjectManager $manager
   * @param int $n
   */
  private function createToDo(ObjectManager $manager, $n)
  {
    $todo = new ToDo();
    $todo->setTitle('ToDo ' . $n);
    $todo->setBody('Lorem ipsum dolor sit amet, consectetur adipiscing elit...');
    $todo->setCreatedAt(new \DateTime(date("Y-m-d H:i:s", mt_rand(1262055681, 1562055681))));
    $todo->setDone(rand(0,1) == 1);
    $manager->persist($todo);
    $manager->flush();
  }
}
