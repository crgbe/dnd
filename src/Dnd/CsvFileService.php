<?php

namespace App\Dnd;

use App\Dnd\Model\Product;
use App\Dnd\Output\OutputFactory;
use Symfony\Component\Console\Output\OutputInterface;

class CsvFileService
{
    /**
     * @var string
     */
    private $csvDirectory;

    public function __construct(
        string $csvDirectory
    )
    {
        $this->csvDirectory = $csvDirectory;
    }

    /**
     * @param string $filename
     * @param string $format
     * @return array
     */
    public function uploadCsvFile(string $filename, $format = 'csv', OutputInterface $output){
        $index = 0;
        $headerFlag = true;
        $productsAsArray = [];

        if (($handle = fopen($this->csvDirectory . '/' . $filename, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 100, ";")) !== FALSE) {
                if($headerFlag){
                    $headerFlag = false;
                    continue;
                }

                $product = new Product($data);
                $productsAsArray[$index] = [
                    'Sku' => $product->getSku(),
                    'Status' => $product->isEnabled() ? 'Enable' : 'Disable',
                    'Price' => $product->getPriceWithCurrency(),
                    'Description' => $product->getDescription(),
                    'Create At' => $product->getCreatedAt()->format('d-m-Y H:i:s'),
                    'Slug' => $product->getSlugTitle(),
                ];

                $index++;
            }
            fclose($handle);
        }

        $outputFactory = new OutputFactory();
        $outputFormater = $outputFactory->getOutputClass($format);
        $outputFormater->output($productsAsArray, $output);
    }
}