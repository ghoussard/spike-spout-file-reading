<?php

namespace Akeneo\SpikeSpoutFileReading;

require_once __DIR__ . '/../vendor/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

function dumpRows(string $fileName) {
    $filePath = __DIR__ . '/files/' . $fileName;
    $reader = ReaderEntityFactory::createXLSXReader();
    $reader->open($filePath);

    foreach ($reader->getSheetIterator() as $sheet) {
        print('Sheet: ' . $sheet->getName() . PHP_EOL);

        // here we can select our desired sheet by index or name ($sheet->getName()/$sheet->getIndex())
        // then we can iterate on rows with an iterator
        $i = 0;
        foreach ($sheet->getRowIterator() as $row) {
            print('Row: ' . $i++ . PHP_EOL);
            var_dump($row->toArray());
        }
    }

    $reader->close();
}
