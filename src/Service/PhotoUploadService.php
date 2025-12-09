<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class PhotoUploadService
{
    public function __construct(
        private string $uploadDir,
    ) {}

    /**
     * @param UploadedFile[] $files
     * @return array<int, array{filename: string, originalName: ?string}>
     */
    public function store(array $files): array
    {
        $images = [];

        foreach ($files as $file) {
            $newFilename = bin2hex(random_bytes(12)).'.'.$file->guessExtension();

            $file->move($this->uploadDir, $newFilename);

            $images[] = [
                'filename'     => $newFilename,
                'originalName' => $file->getClientOriginalName(),
            ];
        }

        return $images;
    }
}
