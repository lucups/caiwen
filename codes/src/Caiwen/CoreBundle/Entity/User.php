<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 13-12-26
 * Time: 上午12:06
 */

namespace Caiwen\CoreBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Caiwen\CoreBundle\Entity\UserRepository")
 */
class User implements UserInterface {

    const ROLE_ADMIN = 0; // 管理员角色
    const ROLE_USER = 1; // 用户角色

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=false)
     */
    private $password;

    /**
     * @ORM\Column(name="role", type="integer", nullable=false)
     */
    private $role;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_time", type="datetime", nullable=false)
     */
    private $createTime;

    /**
     * User Table has no "username" property,
     * so, return User's email.
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    /**
     * get the role of the user
     * @return array|\Symfony\Component\Security\Core\Role\Role[]
     */
    public function getRoles() {
        switch ($this->role) {
            case 0:
                return array('ROLE_ADMIN');
                break;
            case 1:
                return array('ROLE_USER');
                break;
            default:
                return array('IS_AUTHENTICATED_ANONYMOUSLY');
                break;
        }
        return array('ROLE_USER');
    }

    /**
     * add salt to password
     * @return null|string
     */
    public function getSalt() {
        return 'caiwen2013';
    }

    public function eraseCredentials() {
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username) {
        $this->username = $username;
        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    /**
     * Set role
     *
     * @param integer $role
     * @return User
     */
    public function setRole($role) {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return integer
     */
    public function getRole() {
        return $this->role;
    }

    /**
     * Set createTime
     *
     * @param \DateTime $createTime
     * @return User
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
}
