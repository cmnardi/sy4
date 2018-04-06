<?php
namespace App\Nardi\ControlBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;


class CategoryRepository extends EntityRepository
{

    public function getToTest()
    {
        $query = $this->createQueryBuilder('category')
            ->where('category.pattern IS NOT NULL')
            ->andWhere('category.pattern != \'\'')
            ->orderBy('category.order' , 'ASC')
        ;
        return $query->getQuery()->getResult();
    }
}