<?php

namespace App\Command;

use App\Dnd\CsvFileService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class UploadFileCommand extends Command
{
    protected static $defaultName = 'app:upload-file';
    protected static $defaultDescription = "Cette commande permet de charger les lignes d'un fichier CSV présent dans src/Resouces/ et de les afficher sous forme de tableau";
    /**
     * @var CsvFileService
     */
    private $csvFileService;

    public function __construct(
        CsvFileService $csvFileService
    )
    {
        $this->csvFileService = $csvFileService;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('filename', InputArgument::OPTIONAL, "Nom du fichier suivi de l'extension csv")
            ->addOption('extension', null, InputOption::VALUE_OPTIONAL, "Permet de charger des fichiers d'une autre extension: Saisissez l'extension en minuscule")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $filename = $input->getArgument('filename');


        if($filename){
            $format = 'csv';
            if('json' === $input->getOption('extension')) {
                $format = 'json';
            }

            $this->csvFileService->uploadCsvFile($filename, $format, $output);
        }

        $io->success("La commande s'est exécutée avec succès");

        return Command::SUCCESS;
    }
}
