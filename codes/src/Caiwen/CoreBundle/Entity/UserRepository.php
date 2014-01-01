<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 13-12-26
 * Time: 上午9:37
 */

namespace Caiwen\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository {

    public function save($user) {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush();
        return $user->getUserId();
    }

    public function delete($user) {
        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();
    }
}
