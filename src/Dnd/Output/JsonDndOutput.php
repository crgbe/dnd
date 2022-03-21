<?php

namespace App\Dnd\Output;

use Symfony\Component\Console\Output\OutputInterface;

class JsonDndOutput implements DndOutputInterface
{
    public function output(array $data, OutputInterface $output)
    {
        $output->write(json_encode($data, JSON_PRETTY_PRINT));
    }
}