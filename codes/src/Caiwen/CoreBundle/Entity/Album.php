<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 14-1-1
 * Time: 下午5:44
 */

namespace Caiwen\CoreBundle\Entity;

/**
 * @ORM\Entity(repositoryClass="Caiwen\CoreBundle\Entity\AlbumRepository")
 * @ORM\Table(name="album")
 */
class Album {

    /**
     * @var integer
     *
     * @ORM\Column(name="album_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $albumId;

    /**
     * @ORM\Column(name="title", type="string", length=200, nullable=false)
     */
    private $title;

    public function getAlbumId() {
        return $this->albumId;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

} 