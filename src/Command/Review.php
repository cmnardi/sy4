<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Services\TransactionService;

class Review extends Command
{
    protected static $defaultName = 'app:review';

    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Review all transactions in the database')
            ->addArgument('begin', InputArgument::OPTIONAL, 'Date range begin')
            ->addArgument('end', InputArgument::OPTIONAL, 'Date rand end')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $begin = $input->getArgument('begin');
        $end = $input->getArgument('end');

        echo $begin. " - ". $end;
        $id_category = 8;
        $transactions = $this->transactionService->getByCategory($id_category, $begin, $end);
        foreach ( $transactions as $i => $t) {
            $io->success("#".$t->getId()." - ".$t->getValue()."\t".$t->getDescription());
            $this->transactionService->review($t);
        }

        $io->success('END Review');
    }
}
