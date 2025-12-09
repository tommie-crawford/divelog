<?php

namespace App\Service;

use App\Entity\DiveLog;
use App\Message\DiveLogMessage;
use Doctrine\ORM\EntityManagerInterface;

class DiveLogManager
{
    public function __construct(
        private EntityManagerInterface $em
    ) {}

    public function save(DiveLog $diveLog, array $images): DiveLogMessage
    {

        if ($diveLog->getDate() > new \DateTimeImmutable('today')) {
            throw new InvalidArgumentException('Dive date cannot be in the future.');
        }

        $payload = [
            'date' => $diveLog->getDate(),
            'location' => $diveLog->getLocation(),
            'notes' => $diveLog->getNotes(),
            'images' => $images,
        ];

        return new DiveLogMessage($payload);
    }
}
