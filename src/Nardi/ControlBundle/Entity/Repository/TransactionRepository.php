<?php


namespace App\Nardi\ControlBundle\Entity\Repository;


use Doctrine\ORM\EntityRepository;

class TransactionRepository extends EntityRepository
{

    public function findByCategory($id_category)
    {
        $query = $this->createQueryBuilder('transaction')
            ->leftJoin('transaction.idCategory', 'category')
            ->where('transaction.idCategory = :idCategory')
            ->orWhere('category.idCategory = :idCategory')
            ->setParameter('idCategory', $id_category)
        ;
        return $query->getQuery()->getResult();
    }

    public function findByMonth($year, $month)
    {
        $start = $year.'-'.$month.'-01';
        $end = date("Y-m-d", strtotime("+1 month", strtotime($start)));
        $query = $this->createQueryBuilder('transaction')
            ->andWhere('transaction.date >= :start')
            ->andWhere('transaction.date < :end')
            ->setParameter('start',$start)
            ->setParameter('end', $end)
            ->getQuery()
            ;
        return $query;
    }
}
