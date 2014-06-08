<?php

class Wjr
{
  static public function slugify($text)
  {
	// zamiana polskich znakow
	$text = str_replace('Ą', 'a', $text);
	$text = str_replace('ą', 'a', $text);
	$text = str_replace('Ć', 'c', $text);
	$text = str_replace('ć', 'c', $text);
	$text = str_replace('Ę', 'e', $text);
	$text = str_replace('ę', 'e', $text);
	$text = str_replace('Ł', 'l', $text);
	$text = str_replace('ł', 'l', $text);
	$text = str_replace('Ń', 'n', $text);
	$text = str_replace('ń', 'n', $text);
	$text = str_replace('Ó', 'o', $text);
	$text = str_replace('ó', 'o', $text);
	$text = str_replace('Ś', 's', $text);
	$text = str_replace('ś', 's', $text);
	$text = str_replace('Ż', 'z', $text);
	$text = str_replace('ż', 'z', $text);
	$text = str_replace('Ź', 'z', $text);
	$text = str_replace('ź', 'z', $text);
	
    // replace all non letters or digits by -
    $text = preg_replace('/\W+/', '-', $text);
 
    // trim and lowercase
    $text = strtolower(trim($text, '-'));
 
    return $text;
  }
}