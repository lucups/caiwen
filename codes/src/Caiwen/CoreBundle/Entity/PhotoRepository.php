<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 13-12-26
 * Time: 上午9:37
 */

namespace Caiwen\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PhotoRepository extends EntityRepository {

    public function save($photo) {
        $this->getEntityManager()->persist($photo);
        $this->getEntityManager()->flush();
        return $photo->getPhotoId();
    }

    public function delete($photo) {
        $this->getEntityManager()->remove($photo);
        $this->getEntityManager()->flush();
    }

} 