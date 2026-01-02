<?php

namespace App\Service;

use App\Entity\DiveLog;
use App\Message\DiveLogMessage;
use Doctrine\ORM\EntityManagerInterface;

class FishingLogManager
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function createMessage(FishingLog $fishingLog, array $images): FishingLogMessage
    {

        if ($fishingLog->getDate() > new \DateTimeImmutable('today')) {
            throw new InvalidArgumentException('Dive date cannot be in the future.');
        }

        $dateString = $fishingLog->getDate()->format('Y-m-d');

        return new  FishingLogMessage(
            date:     $dateString
        );
    }
}
