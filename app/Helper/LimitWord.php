<?php
namespace App\Helper;


class LimitWord{
	public static function limit_words($limit, $text)
	{
	    $content = explode(" ", $text);
	    $words = array_slice($content, 0, $limit);

	    return implode(" ", $words);
	}	
}
