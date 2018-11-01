<?php

namespace moharram82\File;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDirectory;
    private $newFileName;
    private $errors;

    public function __construct($targetDirectory, $newFileName = null)
    {
        $this->targetDirectory = $targetDirectory;
        $this->newFileName = $newFileName;
    }

    public function upload(UploadedFile $file)
    {
        if(null !== $this->newFileName) {
            $fileName = $this->newFileName;
        } else {
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
        }

        try {
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            $this->errors = $e->getMessage();
        }

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
