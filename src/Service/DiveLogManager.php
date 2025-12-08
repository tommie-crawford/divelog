<?php

namespace App\Service;

use App\Entity\DiveLog;
use Doctrine\ORM\EntityManagerInterface;

class DiveLogManager
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function save(DiveLog $diveLog): void
    {
        if ($diveLog->getDate() > new \DateTimeImmutable('today')) {
            throw new InvalidArgumentException('Dive date cannot be in the future.');
        }

        $this->em->persist($diveLog);
        $this->em->flush();
    }
}
