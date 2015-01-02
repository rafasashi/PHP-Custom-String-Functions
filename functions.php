<?php	
	
	define('CHARSET', 'utf-8');
	
	function custom_substr($content='',$pos_start=0,$num_char=1){
		$substr='';
		if(function_exists('mb_substr')){
			$substr=mb_substr($content,$pos_start,$num_char,CHARSET);
		}
		else{
			$substr=substr($content,$pos_start,$num_char);
		}
		return $substr;
	}

	function custom_str_case($string='', $case='lower'){

		$lower = array(
			"a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u",
			"v", "w", "x", "y", "z", "à", "á", "â", "ã", "ä", "å", "æ", "ç", "è", "é", "ê", "ë", "ì", "í", "î", "ï",
			"ð", "ñ", "ò", "ó", "ô", "õ", "ö", "ø", "ù", "ú", "û", "ü", "ý", "а", "б", "в", "г", "д", "е", "ё", "ж",
			"з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы",
			"ь", "э", "ю", "я"
		);
		$upper = array(
			"A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U",
			"V", "W", "X", "Y", "Z", "À", "Á", "Â", "Ã", "Ä", "Å", "Æ", "Ç", "È", "É", "Ê", "Ë", "Ì", "Í", "Î", "Ï",
			"Ð", "Ñ", "Ò", "Ó", "Ô", "Õ", "Ö", "Ø", "Ù", "Ú", "Û", "Ü", "Ý", "А", "Б", "В", "Г", "Д", "Е", "Ё", "Ж",
			"З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ъ",
			"Ь", "Э", "Ю", "Я"
		);
		
		if($case=='lower'){
			$string = str_replace($upper, $lower, $string);
		}
		else{
			$string = str_replace($lower, $upper, $string);
		}
		
		return $string;
	}

	function custom_strtolower($string){
		return custom_str_case($string,'lower');
	}

	function custom_strtoupper($string){
		return custom_str_case($string,'upper');
	}
	
	function custom_ucfirst($string){

		$string=custom_strtolower($string);
		
		$first_char=custom_substr($string,0,1);
		$rest_char=custom_substr($string,1,custom_strlen($string));

		$first_char=custom_strtoupper($first_char);
		
		return $first_char.$rest_char;
	}
	
	function is_uppercase($string=''){

		$is_uppercase=false;
		
		if($string === custom_strtoupper($string)) {
		   $is_uppercase=true;
		}
	
		return $is_uppercase;
	}

	function is_ucfirst($string=''){

		$first_char=custom_substr($string,0,1);
		
		$is_ucfirst=is_uppercase($first_char);
	
		return $is_ucfirst;
	}	
	
	function custom_ucwords($str='',$separator=' '){
		if($str!=''){
			$str_array=explode($separator,$str);
			$str_array=array_map('custom_ucfirst',$str_array);
			$str=implode($separator,$str_array);
		}
		return $str;
	}
