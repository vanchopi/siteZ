<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;


class ImageController extends Controller
{
    public $files;
    public $url_img = [];
    public $destinationPath;

    public function __construct()
    {


    }
    public function addImages($files,$path)
    {
        $this->destinationPath = $path;
        foreach($files as $file) //обрабатываем массив с файлами
        {
            if(empty($file)) continue;
            $file_name = $file->getClientOriginalName();
            $fileName=self::encodestring(str_random(6).'_'.$file_name);
            $this->url_img[]=$fileName;
            $file->move($this->destinationPath,$fileName);
        }
        return $this->url_img;
    }
    public static function encodestring($filename)
    {
        $searchurl = array("а", "б","в", "г", "д", "е", "ё", "ж", "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы", "ь", "э", "ю", "я", "А", "Б","В", "Г", "Д", "Е", "Ё", "Ж", "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ы", "Ь", "Э", "Ю", " ");
        $replaceurl = array("a", "b","v", "g", "d", "e", "jo", "zh", "z", "i", "j", "k", "l", "m", "n", "o", "p", "r", "s", "t", "u", "f", "h", "c", "ch", "sh", "w", "tz", "y", "mz", "je", "ju", "ja", "A", "B","V", "G", "D", "E", "JO", "ZH", "Z", "I", "J", "K", "L", "M", "N", "O", "P", "R", "S", "T", "U", "F", "H", "C", "CH", "SH", "W", "TZ", "Y", "MZ", "JE", "JU", "_");
        $filename = str_replace($searchurl, $replaceurl, $filename);
        return $filename;
    }

}
