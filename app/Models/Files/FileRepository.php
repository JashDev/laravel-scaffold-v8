<?php

namespace App\Models\Files;

use Illuminate\Support\Facades\Storage;

class FileRepository
{
  public static function saveFile($disk, $folder, $file)
  {
    // $folderName = 'avatars';
    // $file = request()->file('file');

    $nameWithFolder = Storage::disk($disk)->putFile($folder, ($file));

    $name = str_replace($folder, '', $nameWithFolder);
    $name = str_replace('/', '', $name);

    return [$nameWithFolder, $name];
  }

  public static function getURL($disk, $nameWithFolder)
  {
    return  Storage::disk($disk)->url("{$nameWithFolder}");
  }

  public static function deleteFile($disk, $name)
  {
    return Storage::disk($disk)->delete($name);
  }
}
