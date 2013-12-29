<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 13-12-29
 * Time: 下午8:11
 */

namespace Caiwen\CoreBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

use Caiwen\CoreBundle\Common\Utils;

/**
 * Class File
 *
 * This class is used for file uploads API.
 * It has nothing to do with database.
 *
 * @package Medeolinx\TW\CoreBundle\Entity
 */
class File {

    private $uploadDir = 'uploads/files';

    protected $filePath;

    public function getFilePath() {
        return $this->filePath;
    }

    public function setFilePath($filePath) {
        $this->filePath = $filePath;
    }

    /**
     * @Assert\File(maxSize="2M")
     */
    private $file;

    public function getFile() {
        return $this->file;
    }

    public function setFile(UploadedFile $file = null) {
        $this->file = $file;
    }

    public function upload() {
        if (null === $this->getFile()) {
            return;
        }
        $newName = Utils::rename($this->getFile()->getClientOriginalName());
        $this->getFile()->move(
            $this->getUploadRootDir(),
            //$this->getFile()->getClientOriginalName()
            $newName
        );
        //$this->filePath = $this->getFile()->getClientOriginalName();
        $this->filePath = $newName;
        $this->file = null;
    }

    public function getAbsolutePath() {
        return null === $this->filePath
            ? null
            : $this->getUploadRootDir() . '/' . $this->filePath;
    }

    public function getWebPath() {
        return null === $this->filePath
            ? null
            : $this->getUploadDir() . '/' . $this->filePath;
    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        return $this->uploadDir;
    }

    public function setUploadDir($path) {
        $this->uploadDir = $path;
    }

    public function getMimeType() {
        if (null === $this->getFile()) {
            return;
        }
        return $this->getFile()->getMimeType();
    }

    public function getSize() {
        if (null === $this->getFile()) {
            return;
        }
        return $this->getFile()->getSize();
    }
}