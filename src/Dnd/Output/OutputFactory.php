<?php

namespace App\Dnd\Output;

class OutputFactory
{
    /**
     * @param string $format
     * @return DndOutputInterface
     */
    public function getOutputClass(string $format){
        if('json' === $format){
            return new JsonDndOutput();
        }else{
            return new TableDndOutput();
        }
    }
}