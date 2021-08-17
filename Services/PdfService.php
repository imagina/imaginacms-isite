<?php


namespace Modules\Isite\Services;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\File;
//use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class PdfService
{

  public function create($data)
  {
    $viewPdf = 'isite::pdf.index';
    $viewPdfTheme = 'pdf.index';

    if (view()->exists($viewPdfTheme)) $viewPdf = $viewPdfTheme;

    $filename = ($data['filename'] ?? 'file') . '_' . strtotime(date("Y-m-d H:i:s")) . '.pdf';


    \Storage::disk('exports')->put("test.txt", "test");


    $pdf = \PDF::loadView($viewPdf, $data)->save(storage_path('app/exports/') . $filename);
    //

    /*
     *
     * TODO: Limpiar todos los archivos que existan por fecha en el nombre muy antiguos
     *
     */

    return \Storage::disk('exports')->download($filename);
  }
}