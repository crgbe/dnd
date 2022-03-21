<?php

namespace App\Dnd\Output;

use Symfony\Component\Console\Output\OutputInterface;

interface DndOutputInterface
{
    public function output(array $data, OutputInterface $output);
}