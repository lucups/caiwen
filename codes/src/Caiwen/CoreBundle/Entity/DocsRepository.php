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

    public function doSearch($arr) {

        $sql = 'SELECT d FROM CaiwenCoreBundle:Docs d WHERE ';

//        if ($arr['title']) {
//            $sql .= 'd.title LIKE :title';
//        }

//        if ($arr['author']) {
//            $sql .= 'd.author LIKE :author AND ';
//        }
//
        if ($arr['keywords']) {
            $sql .= 'd.keywords LIKE :keywords';
        }

        $docses = $this->getEntityManager()
            ->createQuery($sql)
            //->setParameter('title', $arr['title'])
            // ->setParameter('author', $arr['author'])
            ->setParameter('keywords', '%'.$arr['keywords'].'%')
            ->getResult();
        return $docses;

        return $this->findAll();
    }

}