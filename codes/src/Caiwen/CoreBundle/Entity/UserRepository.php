<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 13-12-26
 * Time: 上午9:37
 */

namespace Caiwen\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class UserRepository extends EntityRepository implements UserProviderInterface {

    /** Implements UserProviderInterface */
    public function loadUserByUsername($username) {
        $q = $this
            ->createQueryBuilder('u')
            //->where('u.email = :email')
            ->where('u.username = :username')
            ->setParameter('username', $username)
            ->getQuery();
        try {
            // The Query::getSingleResult() method throws an exception
            // if there is no record matching the criteria.
            $user = $q->getSingleResult();
        } catch (NoResultException $e) {
            $message = sprintf(
                'Unable to find an active MedeolinxTWCoreUser object identified by "%s".',
                $username
            );
            throw new UsernameNotFoundException($message, 0, $e);
        }

        return $user;
    }

    /** Implements UserProviderInterface */
    public function refreshUser(UserInterface $user) {
        $class = get_class($user);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(
                sprintf(
                    'Instances of "%s" are not supported.',
                    $class
                )
            );
        }

        return $this->find($user->getUserId());
    }

    /** Implements UserProviderInterface */
    public function supportsClass($class) {
        return $this->getEntityName() === $class
        || is_subclass_of($class, $this->getEntityName());
    }

    /**
     * Persist the object to Database.
     * @param $user
     */
    public function save($user) {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

    /**
     * Active the account
     * @param $user
     */
    public function activeAccount($user) {
        $user->setStatus(User::STATUS_NEED_INFO);
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
    }

}