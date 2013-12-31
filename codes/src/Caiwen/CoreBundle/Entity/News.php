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
 * @ORM\Entity(repositoryClass="Caiwen\CoreBundle\Entity\NewsRepository")
 * @ORM\Table(name="news")
 */
class News {

    /**
     * @var integer
     *
     * @ORM\Column(name="news_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $newsId;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     * })
     */
    private $user;

    /**
     * @ORM\Column(name="title", type="string", length=200, nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @ORM\Column(name="create_time", type="datetime")
     */
    private $createTime;

    /**
     * Get newsId
     *
     * @return integer
     */
    public function getNewsId() {
        return $this->newsId;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return News
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
     * @return News
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

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     * @return News
     */
    public function setCreateTime($createTime) {
        $this->createTime = $createTime;

        return $this;
    }

    /**
     * Get createTime
     *
     * @return \DateTime
     */
    public function getCreateTime() {
        return $this->createTime;
    }

    /**
     * Set user
     *
     * @param \Caiwen\CoreBundle\Entity\User $user
     * @return News
     */
    public function setUser(\Caiwen\CoreBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Caiwen\CoreBundle\Entity\User
     */
    public function getUser() {
        return $this->user;
    }
}
