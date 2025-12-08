<?php

namespace App\Tests\Service;

use App\Entity\DiveLog;
use App\Service\DiveLogManager;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class DiveLogManagerTest extends TestCase
{
    public function testSavePersistsAndFlushesDiveLog(): void
    {
        $diveLog = new DiveLog();
        $em = $this->createMock(EntityManagerInterface::class);

        $em->expects($this->once())
            ->method('persist')
            ->with($this->identicalTo($diveLog));

        $em->expects($this->once())
            ->method('flush');
        $manager = new DiveLogManager($em);
        $manager->save($diveLog);
    }
}
