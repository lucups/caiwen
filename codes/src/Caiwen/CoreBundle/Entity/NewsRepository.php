<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 13-12-26
 * Time: 上午9:37
 */

namespace Caiwen\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

class NewsRepository extends EntityRepository {

    public function save($news) {
        $this->getEntityManager()->persist($news);
        $this->getEntityManager()->flush();
        return $news->getNewsId();
    }

    public function delete($news){
        $this->getEntityManager()->remove($news);
        $this->getEntityManager()->flush();
    }

}