<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 13-12-26
 * Time: 上午12:05
 */

namespace Caiwen\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Caiwen\CoreBundle\Entity\PhotoRepository")
 * @ORM\Table(name="photo")
 */
class Photo {

    /**
     * @var integer
     *
     * @ORM\Column(name="photo_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $photoId;

    /**
     * @ORM\Column(name="album_id", type="integer", nullable=false)
     */
    private $albumId;

    /**
     * @ORM\Column(name="image_path", type="string", length=200, nullable=false)
     */
    private $imagePath;

    /**
     * @ORM\Column(name="title", type="string", length=200, nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * Get photoId
     *
     * @return integer
     */
    public function getPhotoId() {
        return $this->photoId;
    }

    /**
     * Set albumId
     *
     * @param integer $albumId
     * @return Photo
     */
    public function setAlbumId($albumId) {
        $this->albumId = $albumId;

        return $this;
    }

    /**
     * Get albumId
     *
     * @return integer
     */
    public function getAlbumId() {
        return $this->albumId;
    }

    /**
     * Set imagePath
     *
     * @param string $imagePath
     * @return Photo
     */
    public function setImagePath($imagePath) {
        $this->imagePath = $imagePath;

        return $this;
    }

    /**
     * Get imagePath
     *
     * @return string
     */
    public function getImagePath() {
        return $this->imagePath;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Photo
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Photo
     */
    public function setContent($content) {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent() {
        return $this->content;
    }
}
