<?php

namespace moharram82\File;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;

class FileUploader
{
    private $targetDirectory;
    private $newFileName;
    private $errors;
    private $imageManager;

    public function __construct($targetDirectory, $newFileName = null)
    {
        $this->targetDirectory = $targetDirectory;
        $this->newFileName = $newFileName;

        // create an image manager instance with favored driver
        $this->imageManager = new ImageManager(array('driver' => 'gd'));
    }

    public function upload(UploadedFile $file, $width = null, $height = null)
    {

        if(null !== $this->newFileName) {
            $fileName = $this->newFileName;
        } else {
            $fileName = md5(uniqid()).'.'.$file->guessExtension();
        }

        try {
            $file = $file->move($this->getTargetDirectory(), $fileName);

            if(null !== $width || null !== $height) {
                // create image
                $image = $this->imageManager->make($file->getPathname());

                // resize the image
                $image->fit($width, $height);

                // save the image to the specified location
                $image->save();
            }

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
