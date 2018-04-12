<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Nardi\ControlBundle\Entity\Transaction;
use App\Services\TransactionService;

class AppReadFileCommand extends Command
{
    protected static $defaultName = 'app:read-file';

    
    private $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
        parent::__construct();
    }

    protected function configure()
    {

        $this
            ->setDescription('Read the ofx file and load transactions on database')
            ->addArgument('path', InputArgument::OPTIONAL, 'Path of the file')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $path = $input->getArgument('path');
        echo $path;

        $ofxParser = new \OfxParser\Parser();
        $ofx = $ofxParser->loadFromFile($path);

        $bankAccount = reset($ofx->bankAccounts);
        // Get the statement start and end dates
        $startDate = $bankAccount->statement->startDate;
        $io->success('Start '.$startDate->format('Y-m-d H:i:s'));
        $endDate = $bankAccount->statement->endDate;
        // Get the statement transactions for the account
        $transactions = $bankAccount->statement->transactions;
        $i = 0;
        foreach($transactions as $t) {
            $transaction = $this->transactionService->populate($t);
            $exists = $this->transactionService->checkIfExists($transaction);
            $io->success("T ".$t->memo. " ". $transaction->getDate()->format("d/m/Y"));
            if(!$exists) {
                $io->success("N EXISTS ".$transaction->getDescription());
                $this->transactionService->review($transaction);
            }
            $i++;
        }
        $io->success('Linhas  '.$i);
        $io->success('End '.$endDate->format('Y-m-d H:i:s'));
    }
}
