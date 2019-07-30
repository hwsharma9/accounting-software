<?php 

if (!function_exists('test')) {
	function test()
	{
		$CI =& get_instance();
		$html = 'Welcome to '.basename(__FILE__);
		return $html;
	}
}

if (!function_exists('flashAlertMessage')) {
	function flashAlertMessage()
	{
		$CI =& get_instance();
		$html = '';
		if (flashdata('message')) {
			$html = '<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <h4><i class="icon fa fa-check"></i> Alert!</h4>
		                '.flashdata('message').'
		              </div>';
		}
		if (flashdata('emessage')) {
			$html = '<div class="alert alert-danger alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
		                '.flashdata('emessage').'
		              </div>';
		}
		return $html;
	}
}

if (!function_exists('profileImage')) {
	function profileImage($image_path='')
	{
		$CI =& get_instance();
		if (!empty($image_path) && file_exists($image_path)) {
			$image_path = base_url($image_path);
		}else{
			$image_path = base_url("assets/admin/dist/img/profile_pic_default.png");
		}
		return $image_path;
	}
}

if (!function_exists('session')) {
	function session($session='',$set='',$action='get')
	{
		$CI =& get_instance();
		if ($action == 'set') {
			$CI->session->set_userdata($session, $set);
			return true;
		}else{
			if ($CI->session->has_userdata($session)) {
				return $CI->session->$session;
			}
		}
		return false;
	}
}

if (!function_exists('flashdata')) {
	function flashdata($flash='',$set='',$action='get')
	{
		$CI =& get_instance();
		if ($action == 'set') {
			$CI->session->set_flashdata($flash, $set);
			return true;
		}else{
			if ($CI->session->flashdata($flash)) {
				return $CI->session->flashdata($flash);
			}
		}
		return false;
	}
}

if (!function_exists('lang')) {
	function lang($lang='')
	{
		$CI =& get_instance();
		$line = ($CI->lang->line($lang))?$CI->lang->line($lang):ucwords(str_replace("_", " ", $lang));
		return $line;
	}
}

if (!function_exists('config_item')) {
	function config_item($item='')
	{
		$CI =& get_instance();
		$item = $CI->config->item($item);
		return $item;
	}
}

if (!function_exists('wordInitials')) {
	function wordInitials($string='')
	{
		preg_match_all('/(?<=\s|^)[a-z]/i', $string, $matches);
		return strtoupper(implode("", $matches[0]));
	}
}

if (!function_exists('convertToIndianCurrency')) {
	function convertToIndianCurrency($number) {
		$CI =& get_instance();
		$language = (session("lang")?session("lang"):$CI->language);   
	    $i = 0;
	    $str = array();
		if ($language == "hindi") {
			$words= ["", "एक", "दो", "तीन", "चार", "पाँच", "छह", "सात", "आठ", "नौ", "दस", "ग्यारह", "बारह", "तेरह", "चौदह", "पन्द्रह", "सोलह", "सत्रह", "अठारह", "उन्नीस", "बीस", "इक्कीस", "बाईस", "तेईस", "चौबीस", "पच्चीस", "छब्बीस", "सत्ताईस", "अट्ठाईस", "उनतीस", "तीस", "इकतीस", "बत्तीस", "तैंतीस", "चौंतीस", "पैंतीस", "छत्तीस", "सैंतीस", "अड़तीस", "उनतालीस", "चालीस", "इकतालीस", "बयालीस", "तैंतालीस", "चौवालीस", "पैंतालीस", "छियालीस", "सैंतालीस", "अड़तालीस", "उनचास", "पचास", "इक्यावन", "बावन", "तिरेपन", "चौवन", "पचपन", "छप्पन", "सत्तावन", "अट्ठावन", "उनसठ", "साठ", "इकसठ", "बासठ", "तिरेसठ", "चौंसठ", "पैंसठ", "छियासठ", "सड़सठ", "अड़सठ", "उनहत्तर", "सत्तर", "इकहत्तर", "बहत्तर", "तिहत्तर", "चौहत्तर", "पचहत्तर", "छिहत्तर", "सतहत्तर", "अठहत्तर", "उनासी", "अस्सी", "इक्यासी", "बयासी", "तिरासी", "चौरासी", "पचासी", "छियासी", "सत्तासी", "अट्ठासी", "नवासी", "नब्बे", "इक्यानबे", "बानबे", "तिरानबे", "चौरानबे", "पंचानबे", "छियानबे", "सत्तानबे", "अट्ठानबे", "निन्यानबे"];
    		$digits = ["", "सौ", "हजार", "लाख", "करोड़", "अरब", "खरब"];//, "नील"
		    $no = round($number);
		    $decimal = round($number - ($no = floor($number)), 2) * 100;    
		    $digits_length = strlen($no); 
			while ($i < $digits_length) {
		        $divider = ($i == 2) ? 10 : 100;
		        $number = floor($no % $divider);
		        $no = floor($no / $divider);
		        $i += $divider == 10 ? 1 : 2;
		        if ($number) {
		            $counter = count($str);
		            $str[] = ($number < 100)? $words[$number] . ' ' . $digits[$counter]:$words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter];
		        } else {
		            $str [] = null;
		        }  
		    }
		    $Rupees = implode(' ', array_reverse($str));
			$paise = ($decimal) ? " और " . ($words[$decimal]) . " पैसे" : '';
			return ($Rupees ?  $Rupees . 'रूपये' : '') . $paise . " मात्";
		}else{
		    $words = array(
		        0 => '',
		        1 => 'One',
		        2 => 'Two',
		        3 => 'Three',
		        4 => 'Four',
		        5 => 'Five',
		        6 => 'Six',
		        7 => 'Seven',
		        8 => 'Eight',
		        9 => 'Nine',
		        10 => 'Ten',
		        11 => 'Eleven',
		        12 => 'Twelve',
		        13 => 'Thirteen',
		        14 => 'Fourteen',
		        15 => 'Fifteen',
		        16 => 'Sixteen',
		        17 => 'Seventeen',
		        18 => 'Eighteen',
		        19 => 'Nineteen',
		        20 => 'Twenty',
		        30 => 'Thirty',
		        40 => 'Forty',
		        50 => 'Fifty',
		        60 => 'Sixty',
		        70 => 'Seventy',
		        80 => 'Eighty',
		        90 => 'Ninety');
		    $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore', 'Arab', 'Kharab');
		    $no = round($number);
		    $decimal = round($number - ($no = floor($number)), 2) * 100;    
		    $digits_length = strlen($no); 
		    while ($i < $digits_length) {
		        $divider = ($i == 2) ? 10 : 100;
		        $number = floor($no % $divider);
		        $no = floor($no / $divider);
		        $i += $divider == 10 ? 1 : 2;
		        if ($number) {
		            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;            
		            $str [] = ($number < 21) ? $words[$number] . ' ' . $digits[$counter] . $plural : $words[floor($number / 10) * 10] . ' ' . $words[$number % 10] . ' ' . $digits[$counter] . $plural;
		        } else {
		            $str [] = null;
		        }  
		    }
		    
		    $Rupees = implode(' ', array_reverse($str));
		    $paise = ($decimal) ? "And Paise " . ($words[$decimal - $decimal%10]) ." " .($words[$decimal%10])  : '';
		    return ($Rupees ? 'Rupees ' . $Rupees : '') . $paise . " Only";
		}
	}
}

?>