<?php

namespace App\Dnd\Output;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

class TableDndOutput implements DndOutputInterface
{
    public function output(array $data, OutputInterface $output)
    {
        $headers = ['Sku', 'Status', 'Price', 'Description', 'Created At', 'Slug'];

        $productsTable = new Table($output);
        $productsTable
            ->setHeaders($headers)
            ->setRows($data)
        ;

        $productsTable->render();
    }
}