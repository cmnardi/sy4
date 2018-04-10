<?php

namespace App\Services;
use App\Nardi\ControlBundle\Entity\Transaction;
use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Nardi\ControlBundle\Entity\Repository\TransactionRepository;

class TransactionService
{
    private $repository = null;
    private $categoryRepository = null;
    private $categories = null;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->repository = $this->container->get('doctrine')->getRepository('NardiControlBundle:Transaction');
        $this->repository->findByMonth(2018,01);
        $this->categoryRepository = $this->container->get('doctrine')->getRepository('NardiControlBundle:Category');
        $this->categories = $this->categoryRepository->getToTest();
        $this->em = $this->container->get('doctrine')->getManager();
    }

    public function getByCategory($id_category, $begin, $end)
    {
        return $this->repository->findByCategory($id_category);
    }

    public function review(Transaction $t)
    {
        foreach ($this->categories as $c ) {
            if ( preg_match($c->getPattern(), $t->getDescription())) {
                $t->setIdCategory($c);
                $this->em->persist($t);
                $this->em->flush();
                echo "\t\ttest OK ".$c->getName();
                break;
            }
        }
    }

    /**
     * Populate a transaction object basen on \OfxParser\Entities\Transaction
     * @param \OfxParser\Entities\Transaction
     * @return Transaction
     */
    public function populate(\OfxParser\Entities\Transaction $t) : Transaction
    {
        $transaction = new Transaction();
        $transaction->setDescription($t->memo)
                    ->setFitid($t->uniqueId)
                    ->setValue($t->amount)
                    ->setDate($t->date)
        ;
        return $transaction;
    }
}