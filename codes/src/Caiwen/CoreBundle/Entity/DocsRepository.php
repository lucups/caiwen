<?php
/**
 * Created by PhpStorm.
 * User: Lucups
 * Date: 13-12-26
 * Time: 上午9:31
 */

namespace Caiwen\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;

class DocsRepository extends EntityRepository {

    public function save($docs) {
        $this->getEntityManager()->persist($docs);
        $this->getEntityManager()->flush();
        return $docs->getDocsId();
    }

    public function delete($docs) {
        $this->getEntityManager()->remove($docs);
        $this->getEntityManager()->flush();
    }

    public function doSearch($arr){


        return $this->findAll();
    }

}