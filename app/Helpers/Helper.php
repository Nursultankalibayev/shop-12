<?php
namespace App\Helpers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Helper{
    public static function getTranslatedSlugRu($text)
    {
        $cyr2lat_replacements = array (
            "А" => "a","Ә" => "a", "Б" => "b","В" => "v","Г" => "g","Ғ" => "gh","Д" => "d",
            "Е" => "e","Ё" => "yo","Ж" => "dg","З" => "z","И" => "i","І" => "i",
            "Й" => "y","К" => "k","Қ" => "q","Һ" => "q","Л" => "l","М" => "m","Н" => "n","Ң" => "nh",
            "О" => "o","Ө" => "o","П" => "p","Р" => "r","С" => "s","Т" => "t",
            "У" => "u","Ұ" => "u","Ү" => "u","Ф" => "f","Х" => "kh","Ц" => "ts","Ч" => "ch",
            "Ш" => "sh","Щ" => "csh","Ъ" => "","Ы" => "y","Ь" => "",
            "Э" => "e","Ю" => "yu","Я" => "ya","?" => "",

            "а" => "a","ә" => "a","б" => "b","в" => "v","г" => "g","ғ" => "gh","д" => "d",
            "е" => "e","ё" => "yo","ж" => "dg","з" => "z","и" => "i","і" => "i",
            "й" => "y","к" => "k","қ" => "q","һ" => "q","л" => "l","м" => "m","н" => "n","ң" => "nh",
            "о" => "o","ө" => "o","п" => "p","р" => "r","с" => "s","т" => "t",
            "у" => "u","ұ" => "u","ү" => "u","ф" => "f","х" => "kh","ц" => "ts","ч" => "ch",
            "ш" => "sh","щ" => "sch","ъ" => "","ы" => "y","ь" => "",
            "э" => "e","ю" => "yu","я" => "ya",
            "(" => "", ")" => "", "," => "", "." => "",

            "-" => "-","%" => "-"," " => "-", "+" => "", "®" => "", "«" => "", "»" => "", '"' => "", "`" => "", "&" => "","/" => "-"
        );

        $str = strtr (trim($text),$cyr2lat_replacements);
        $str =  substr($str, 0, 100);
        return $str;
    }

    public static function uploadFile($image)
    {
        $extension = $image->getClientOriginalExtension();
        $fileName = str_random(5).date('Y-m-d-H-m-s').'.'.$extension;
        Storage::disk('local')->put($fileName,  File::get($image));

        return $fileName;
    }

    public static function uploadFiles($images)
    {
        $array_images = [];
        foreach ($images as $image) {
            $extension = $image->getClientOriginalExtension();
            $fileName = str_random(5).date('Y-m-d-H-m-s').'.'.$extension;
            Storage::disk('local')->put($fileName,  File::get($image));
            $array_images[] = $fileName;
        }
        return $array_images;
    }

    public static function getCategoryInSlug($slug)
    {
        $category = Category::where('link',$slug)->first();
        isset($category) ? $result = $category : $result = [];

        return $result;
    }
	
	public static function getLocations(){
		$locations = [
			'Алматы','Астана','Актау','Актобе','Атырау','Караганда','Костанай','Кызылорда','Павлодар','Семей','Талдыкорган','Тараз','Шымкент'
		];
		return $locations;
	}
}