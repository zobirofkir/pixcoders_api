<?php

namespace App\Exports;

use Barryvdh\DomPDF\Facade\Pdf;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SubscribersPdfExport extends ExcelExport
{
    public function download(?string $fileName = null, ?string $writerType = null, ?array $headers = null)
    {
        $data = $this->getQuery()->get();
        
        $pdf = Pdf::loadView('exports.subscribers', compact('data'));
        
        return $pdf->download(($fileName ?? $this->getFilename()) . '.pdf');
    }
    
    public function store(?string $filePath = null, ?string $disk = null, ?string $writerType = null, $diskOptions = [])
    {
        return $this->download();
    }
}