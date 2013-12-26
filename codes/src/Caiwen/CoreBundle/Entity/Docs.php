<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 13-12-26
 * Time: 上午12:06
 */

namespace Caiwen\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="Caiwen\CoreBundle\Entity\DocsRepository")
 * @ORM\Table(name="docs")
 */
class Docs {

    /**
     * @var integer
     *
     * @ORM\Column(name="docs_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $docsId;

    /**
     * @ORM\Column(name="title", type="string", length=200, nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(name="author", type="string", length=200, nullable=false)
     */
    private $author;

    /**
     * @ORM\Column(name="keywords", type="string", length=200, nullable=false)
     */
    private $keywords;

    /**
     * @ORM\Column(name="file_path", type="string", length=200, nullable=false)
     */
    private $filePath;

    /**
     * Get docsId
     *
     * @return integer 
     */
    public function getDocsId()
    {
        return $this->docsId;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Docs
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Docs
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     * @return Docs
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set filePath
     *
     * @param string $filePath
     * @return Docs
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * Get filePath
     *
     * @return string 
     */
    public function getFilePath()
    {
        return $this->filePath;
    }
}
