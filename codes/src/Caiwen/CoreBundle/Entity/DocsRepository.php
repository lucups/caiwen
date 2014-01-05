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

        $js = 0;
        if ($arr['title']) {
            $sql .= 'd.title LIKE :title ';
            $js = 1;
        }

        if ($arr['author']) {
            if ($js > 0) {
                $sql .= 'AND ';
                $js = 2;
            } else {
                $js = 3;
            }
            $sql .= 'd.author LIKE :author ';
        }

        if ($arr['keywords']) {
            if ($js > 0) {
                $sql .= 'AND ';
                if($js == 1){
                    $js = 4;
                }else if($js == 2){
                    $js = 5;
                }else{
                    $js = 6;
                }

            } else {
                $js = 7;
            }
            $sql .= 'd.keywords LIKE :keywords';
        }

        $docses = NULL;
        switch ($js) {
            case 0:
                break;
            case 1:
                $docses = $this->getEntityManager()
                    ->createQuery($sql)
                    ->setParameter('title', '%' . $arr['title'] . '%')
                    ->getResult();
                break;
            case 2:
                $docses = $this->getEntityManager()
                    ->createQuery($sql)
                    ->setParameter('title', '%' . $arr['title'] . '%')
                    ->setParameter('author', '%' . $arr['author'] . '%')
                    ->getResult();
                break;
            case 3:
                $docses = $this->getEntityManager()
                    ->createQuery($sql)
                    ->setParameter('author', '%' . $arr['author'] . '%')
                    ->getResult();
                break;
            case 4:
                $docses = $this->getEntityManager()
                    ->createQuery($sql)
                    ->setParameter('title', '%' . $arr['title'] . '%')
                    ->setParameter('keywords', '%' . $arr['keywords'] . '%')
                    ->getResult();
                break;
            case 5:
                $docses = $this->getEntityManager()
                    ->createQuery($sql)
                    ->setParameter('author', '%' . $arr['author'] . '%')
                    ->setParameter('keywords', '%' . $arr['keywords'] . '%')
                    ->getResult();
                break;
            case 6:
                $docses = $this->getEntityManager()
                    ->createQuery($sql)
                    ->setParameter('title', '%' . $arr['title'] . '%')
                    ->setParameter('author', '%' . $arr['author'] . '%')
                    ->setParameter('keywords', '%' . $arr['keywords'] . '%')
                    ->getResult();
                break;
            case 7:
                $docses = $this->getEntityManager()
                    ->createQuery($sql)
                    ->setParameter('keywords', '%' . $arr['keywords'] . '%')
                    ->getResult();
                break;
        }


        return $docses;
    }

}