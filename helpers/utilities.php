<?php

use Intervention\Image\ImageManager;

/**
 * Connect to mysql server instance through mysqli extension.
 * 
 * @param string $dbHostName database host name.
 * @param string $dbUserName database username.
 * @param string $dbPassword database password.
 * @param string $dbName database name.
 * @param string $charset database charset to be used.
 * @return mysqli $link MySQLi link identifier on success or FALSE on failure
 */
function mysqliConnect($dbHostName, $dbUserName, $dbPassword, $dbName, $charset = 'utf8')
{

	try {
		$link = mysqli_connect($dbHostName, $dbUserName, $dbPassword, $dbName);

		$link->set_charset($charset);
		mysqli_query($link, "SET NAMES '{$charset}'");
		mysqli_query($link, "SET CHARACTER SET {$charset}");
		mysqli_query($link, "SET character_set_results={$charset}");
		mysqli_query($link, "SET character_set_client={$charset}");
		mysqli_query($link, "SET character_set_connection={$charset}");
		mysqli_query($link, "SET collation_connection={$charset}_general_ci");
	} catch (Exception $e) {
	    die($e->getCode() . ': ' . $e->getMessage());
	}
		
	return $link;
}

/**
 * Connect to mysql server instance through PDO extension.
 * 
 * @param string $dbHostName database host name.
 * @param string $dbUserName database username.
 * @param string $dbPassword database password.
 * @param string $dbName database name.
 * @param string $charset database charset to be used.
 * @return PDO $db PDO connection object.
 */
function pdoMysqlConnect($dbHostName, $dbUserName, $dbPassword, $dbName, $charset = 'utf8')
{

	$options = [
	    PDO::MYSQL_ATTR_INIT_COMMAND => "SET character_set_results={$charset}",
	    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$charset}",
	    PDO::MYSQL_ATTR_INIT_COMMAND => "SET character_set_client={$charset}",
	    PDO::MYSQL_ATTR_INIT_COMMAND => "SET character_set_connection={$charset}",
	    PDO::MYSQL_ATTR_INIT_COMMAND => "SET collation_connection={$charset}_general_ci"
	];

	try {

		$db = new PDO("mysql:host={$dbHostName};dbname={$dbName};charset={$charset}", $dbUserName, $dbPassword, $options);

	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	    die($e->getCode() . ': ' . $e->getMessage());
	}

	return $db;
}

/**
 * checks if the supplied string is a valid username that:
 * - is in English only characters
 * - contains no spaces
 * - starts with letters only
 * - contains only letters, numbers and underscores
 * - does not end with underscores
 * 
 * @param string $string the string to be checked
 * @return bool if the string is english returns true else returns false
 */
function validUsername($string)
{
	
	$string = trim($string);

	if(preg_match('/^[a-zA-Z]+[a-zA-Z0-9_]+[a-zA-Z0-9]$/', $string)) {
		return true;
	}

	return false;
}

/**
 * checks if the supplied password is strong, which must be:
 * - contain at least 1 uppercase letter
 * - contain at least 1 lowercase letter
 * - contain at least 1 number
 * - at least 8 characters long
 * 
 * @param string $password the password to be tested
 * @return bool true if the password is strong, false if it is weak
 */
function isStrongPassword($password)
{
	
	$password = trim($password);

	if(preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $password)) {
		return true;
	}

	return false;
}

/**
 * checks if the supplied string is:
 * - English letters only
 * - may contain spaces in between words but not at the end
 * 
 * @param string $en_text the string to be checked
 * @return bool true or false
 */
function isEnglishText($en_text)
{
	
	$en_text = trim($en_text);

	if(preg_match('/^[a-zA-Z]+\s?[a-zA-Z]+$/', $en_text)) {
		return true;
	}

	return false;
}

/**
 * Checks if a string is a valid timestamp.
 *
 * @param  string $timestamp Timestamp to be validated.
 * @return bool true if TIMESTAMP or false if not.
 */
function isTimestamp($timestamp)
{
	
	$check = (is_int($timestamp) OR is_float($timestamp)) ? $timestamp : (string) (int) $timestamp;

	return  ($check === $timestamp)	AND ((int) $timestamp <=  PHP_INT_MAX)	AND ((int) $timestamp >= ~PHP_INT_MAX);
}

/**
 * Removes protocol prefix (http://) or (https://) from a link
 *
 * @param string $url the URL to be cleaned from protocol prefix
 * @return string $url the URL without the protocol
 */
function removeHttpProtocol($url)
{

   $disallowed = array('http://', 'https://');

   foreach($disallowed as $d) {
      if(strpos($url, $d) === 0) {
         return str_replace($d, '', $url);
      }
   }

   return $url;
}

/**
 * Removes any extra white spaces from the beginning, ending, and inbetween words.
 * 
 * @param string $text the text to be cleared from extra white spaces.
 * @return string the cleaned text.
 */
function removeExtraSpace($text)
{
	return trim(preg_replace('/\s\s+/', ' ', $text));
}

/**
 * Cleans text from any html and duplicate spaces or new lines.
 * 
 * @param string $str the string to be cleaned
 * @return mixed|string the cleaned string
 */
function cleanText($str)
{
	$str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');
	$str = strip_tags($str); // erases any html markup
	$str = preg_replace('/\s\s+/', ' ', $str); // erases possible duplicated white spaces
	$str = str_replace(array('\r\n', '\n', '+'), ',', $str); // erases new lines

	return $str;
}

/**
 * Extracts keywords from text for the keywords html meta tag.
 * 
 * @param string $text the text to extract keywords from.
 * @param int $max_keys the max number of generated keywords.
 * @return string the extracted keywords in form of comma separated values.
 */
function extractKeywords($text, $max_keys = 10)
{
	$text = cleanText($text);

	$min_word_length = 4;
	$stopwords = array('��', '������', '�������', '������', '�������', '������', '�������', '������', '�������', '����', '�����', '���', '����', '���', '����', '���', '���', '��', '���', '��', '���', '��', '���', '���', '����', '���', '����', '��', '���', '��', '���', '��', '���', '��', '���');

	$string = preg_replace('/[\pP]/u', '', trim(preg_replace('/\s\s+/iu', '', mb_strtolower($text))));
	$matchWords = array_filter(explode(' ', $string), function ($item) use ($stopwords) {
		return !($item == '' || in_array($item, $stopwords) || mb_strlen($item) <= 2 || is_numeric($item));
	});

	$wordCountArr = array_count_values($matchWords);

	foreach($wordCountArr as $key => $value)
	{
		if((mb_strlen($key) <= $min_word_length) OR in_array($key, $stopwords)) {
			unset($wordCountArr[$key]);
		}
	}

	//sort keywords from most repetitions to less
	uasort($wordCountArr, function ($a, $b)	{
		if ($a == $b) return 0;
		return ($a < $b) ? 1 : -1;
	});

	//keep only X keywords
	$wordCountArr = array_slice($wordCountArr,0, $max_keys);

	//return keywords on a string
	return implode(', ', array_keys($wordCountArr));
}

/**
 * Limits a phrase to a given number of characters.
 *
 * @param   string  $str phrase to limit characters of
 * @param   integer $limit number of characters to limit the phrase to
 * @param   string  $end_char end character or entity
 * @param   boolean $preserve_words enable or disable the preservation of words while limiting
 * @return  string the limited phrase.
 */
function limitChars($str, $limit = 100, $end = '...')
{
	$str = cleanText($str);

	$limit = (int) $limit;

	if (mb_strwidth($str, 'UTF-8') <= $limit) {
		return $str;
	}

	return rtrim(mb_strimwidth($str, 0, $limit, '', 'UTF-8')) . ' ' . $end;
}

/**
 * Validates phone number and returns true if valid otherwise returns false.
 * 
 * @param string $number the phone number to be validated
 * @return bool returns true if the phone number is correct otherwise returns false
 */
function validPhone($number)
{
	$number = trim($number);

	if(preg_match('/^(\+)?[0-9]*$/', $number)) {
		return true;
	}

	return false;
}

/**
 * Validate an e-mail address and return true if valid or false if not.
 * 
 * @param string $email e-mail address to be validated.
 * @return Boolean True or False
 */
function validEmail($email)
{
	$email = trim($email);
	$isValid = true;
	$atIndex = strrpos($email, "@");

	if (is_bool($atIndex) && !$atIndex) {
		$isValid = false;
	} else {
		$domain = substr($email, $atIndex + 1);
		$local = substr($email, 0, $atIndex);
		$localLen = strlen($local);
		$domainLen = strlen($domain);
		if ($localLen < 1 || $localLen > 64) {
			// local part length exceeded
			$isValid = false;
		} else if ($domainLen < 1 || $domainLen > 255) {
			// domain part length exceeded
			$isValid = false;
		} else if ($local[0] == '.' || $local[$localLen - 1] == '.') {
			// local part starts or ends with '.'
			$isValid = false;
		} else if (preg_match('/\\.\\./', $local)) {
			// local part has two consecutive dots
			$isValid = false;
		} else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
			// character not valid in domain part
			$isValid = false;
		} else if (preg_match('/\\.\\./', $domain)) {
			// domain part has two consecutive dots
			$isValid = false;
		} else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\", "", $local))) {
			// character not valid in local part unless
			// local part is quoted
			if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\", "", $local))) {
				$isValid = false;
			}
		}

		if ($isValid && !(checkdnsrr($domain, "MX") || checkdnsrr($domain, "A"))) {
			// domain not found in DNS
			$isValid = false;
		}
	}

	return $isValid;
}

/**
 * Validates the specified date and returns true if valid, otherwise returns false.
 * 
 * @param String $date the date to be validated...
 * @param String $format the format against which the date will be validated (YYYY-MM-DD) or (DD/MM/YYYY)
 * @return bool true or false.
 */
function validDate($date, $format = 'YYYY-MM-DD') {
	$year = "";
	$month = "";
	$day = "";
	$date = trim($date);
	$format = trim($format);
	if (strlen($date) >= 8 && strlen($date) <= 10) {
		$separator_only = str_replace(array('M', 'D', 'Y'), '', $format);
		$separator = $separator_only[0];
		if ($separator) {
			$regexp = str_replace($separator, "\\" . $separator, $format);
			$regexp = str_replace('MM', '(0[1-9]|1[0-2])', $regexp);
			$regexp = str_replace('M', '(0?[1-9]|1[0-2])', $regexp);
			$regexp = str_replace('DD', '(0[1-9]|[1-2][0-9]|3[0-1])', $regexp);
			$regexp = str_replace('D', '(0?[1-9]|[1-2][0-9]|3[0-1])', $regexp);
			$regexp = str_replace('YYYY', '\d{4}', $regexp);
			$regexp = str_replace('YY', '\d{2}', $regexp);
			if ($regexp != $date && preg_match('/' . $regexp . '$/', $date)) {
				foreach (array_combine(explode($separator, $format), explode($separator, $date)) as $key => $value) {
					if ($key == 'YY')
						$year = '20' . $value;
					if ($key == 'YYYY')
						$year = $value;
					if ($key[0] == 'M')
						$month = $value;
					if ($key[0] == 'D')
						$day = $value;
				}

				if (checkdate($month, $day, $year))
					return true;
			}
		}
	}

	return false;
}

/**
 * Checks if the supplied URL is a valid URL address or not.
 * 
 * @param string $url the URL address to be validated
 * @return bool true if valid URL or false if not
 */
function validUrl($url)
{
	$url = trim($url);

	if(preg_match("/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/", $url)) {
		return true;
	}

	return false;
}

/**
 * Resizes an image.
 * 
 * @param string $target the original image to be resized
 * @param string $newcopy the newly resized image
 * @param int $w the width of the newly created image
 * @param int $h the height of the newly created image
 * @param string $ext the extension of the newly created image file
 */
function imgResize($target, $newcopy, $w, $h, $ext)
{
	list($w_orig, $h_orig) = getimagesize($target);

	$scale_ratio = $w_orig / $h_orig;

	if (($w / $h) > $scale_ratio) {
		$w = $h * $scale_ratio;
	} else {
		$h = $w / $scale_ratio;
	}

	$img = "";
	$ext = strtolower($ext);

	if ($ext == "gif") {
		$img = imagecreatefromgif($target);
	} else if ($ext == "png") {
		$img = imagecreatefrompng($target);
	} else {
		$img = imagecreatefromjpeg($target);
	}

	$tci = imagecreatetruecolor($w, $h);

	// imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
	imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
	imagejpeg($tci, $newcopy, 80);
}

/**
 * Calculates the age from a given birth date and returns the age or false if the supplied birth date is invalid date.
 * 
 * @param $birthdate Birth date in (yyyy-mm-dd) format
 * @param string $type ("years", "months" or "days").
 * @return bool|mixed false if the $birthdate is not a valid date, integer if the type is (years, months or days), float if the type is decimal.
 */
function calculateAge($birthdate, $type = 'years')
{
	if(!validDate($birthdate)) {
		return false;
	}

	list($year,$month,$day) = explode("-",$birthdate);
	$year_diff  = date("Y") - $year;
	$month_diff = date("m") - $month;
	$day_diff   = date("d") - $day;

	if($month_diff < 0) {
		$year_diff--;
		$month_diff = 12 + $month_diff;
	}

	if($day_diff < 0) {
		$month_diff--;
		$day_diff = 30 + $day_diff;
	}

	$year_diff_in_months = $year_diff * 12;
	$year_diff_in_days = $year_diff_in_months * 30;
	$months_diff_in_days = $month_diff  * 30;

	$age_in_months = $year_diff_in_months + $month_diff;
	$age_in_days = $year_diff_in_days + $months_diff_in_days + $day_diff;
	$float_age = $age_in_days / 30 / 12;

	switch($type) {
		case 'years':
			return $year_diff;
			break;

		case 'decimal':
			return round($float_age, 1);
			break;

		case 'months':
			return $age_in_months;
			break;

		case 'days':
			return $age_in_days;
			break;

		default:
			return $year_diff;
			break;
	}
}

/**
 * Encodes data with MIME base64
 * 
 * @param string $string the string to be encoded
 * @return string the encoded string
 */
function urlsafe_b64encode($string)
{
	$data = base64_encode($string);
	$data = str_replace(array('+','/','='),array('-','_','.'),$data);

	return $data;
}

/**
 * Decodes data encoded with urlsafe_b64encode
 * 
 * @param string $string the encoded string to be decoded
 * @return string the decoded string
 */
function urlsafe_b64decode($string)
{
	$data = str_replace(array('-','_','.'),array('+','/','='),$string);
	$mod4 = strlen($data) % 4;
	if ($mod4) {
		$data .= substr('====', $mod4);
	}
	return base64_decode($data);
}

/**
 * Gets the IP address of the current internet session
 * 
 * @return string the ip address
 */
function getIP()
{
	$ip = '';

	$client = (isset($_SERVER['HTTP_CLIENT_IP']) AND $_SERVER['HTTP_CLIENT_IP'] != "") ? $_SERVER['HTTP_CLIENT_IP'] : FALSE;
	$remote = (isset($_SERVER['REMOTE_ADDR']) AND $_SERVER['REMOTE_ADDR'] != "") ? $_SERVER['REMOTE_ADDR'] : FALSE;
	$forward = (isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND $_SERVER['HTTP_X_FORWARDED_FOR'] != "") ? $_SERVER['HTTP_X_FORWARDED_FOR'] : FALSE;

	if($client && $remote)	$ip = $client;
	elseif($remote)			$ip = $remote;
	elseif($client)			$ip = $client;
	elseif($forward)		$ip = $forward;

	if(strpos($ip, ',') !== FALSE)
	{
		$x = explode(',', $ip);
		$ip = end($x);
	}

	if(!filter_var($ip, FILTER_VALIDATE_IP))
	{
		$ip = '0.0.0.0';
	}

	unset($client);
	unset($remote);
	unset($forward);

	return $ip;
}

/**
 * Gets the Useragent string of the current internet session
 *
 * @access	public
 * @return	string
 */
function getUseragent()
{
	return (!isset($_SERVER['HTTP_USER_AGENT'])) ? FALSE : $_SERVER['HTTP_USER_AGENT'];
}

/**
 * Gets the hindi (arabic) number format from english numbers to output to html.
 * 
 * @param $str The number in english to be converted to arabic.
 * @return string The converted hexa-decimal arabic unicode value or empty or the input string if not converted.
 */
function getArabicNumbers($str)
{
	$dic = array(
		'0' => '&#x0660;',
		'1' => '&#x0661;',
		'2' => '&#x0662;',
		'3' => '&#x0663;',
		'4' => '&#x0664;',
		'5' => '&#x0665;',
		'6' => '&#x0666;',
		'7' => '&#x0667;',
		'8' => '&#x0668;',
		'9' => '&#x0669;',
		'%' => '&#x066A;',
		'.' => '&#x066B;',
		',' => '&#x066C;'
	);

	$result = array();
	$number = '';

	if(!is_array($str)) {
		$chars = str_split($str);

		foreach($chars as $char) {
			if(array_key_exists($char, $dic)) {
				$result[] = $dic[$char];
			}
		}

		if(count($result)) {
			foreach($result as $symbol) {
				$number .= $symbol;
			}
		} else {
			$number = $str;
		}
	}

	return $number;
}

/**
 * Scans a dir and extract images based on file name extension (jpg|png|gif).
 * Note: this function does not check the image type.
 * 
 * @param string $images_dir the directory to be scanned file system path.
 * @param array $types types of the images to be found or all types (jpg|png|gif) if not specified.
 * @return array|bool returns false if no images were found or array containing images file names.
 */
function findImagesByExt($images_dir, $types = array())
{
	$images = array();

	if(is_dir($images_dir)) {
		// read images dir
		$dir_handler = opendir($images_dir);

		while($file = readdir($dir_handler)) {
			if(!is_dir($file)) {
				if(is_array($types) && !empty($types)) {
					foreach($types as $type) {
						if(strpos($file, '.' . strtoupper($type)) || strpos($file, '.' . strtolower($type))) {
							$images[] = $file;
						}
					}
				} else {
					if(strpos($file, '.jpg') || strpos($file, '.JPG') || strpos($file, '.png') || strpos($file, '.PNG') || strpos($file, '.gif') || strpos($file, '.GIF')) {
						$images[] = $file;
					}
				}
			}
		}

		closedir($dir_handler);
	}

	sort($images);

	return (count($images) > 0) ? $images : false;
}

/**
 * Recursively deletes a directory and its entire contents
 *
 * @param  string $dir         the full file system path to the directory to be deleted
 * @return bool   true/false   return true on success or false on error
 */
function removeDir($dir)
{
	if(is_dir($dir)) {
		$objects = scandir($dir);
		foreach($objects as $object) {
			if($object != "." && $object != "..") {
				if(filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
			}
		}

		reset($objects);

		return (rmdir($dir)  === true) ? true : false;
	}

	return false;
}

/**
 * Generates random alpha-numeric string
 *
 * @param $length length of the string
 * @return string generated random string
 */
function randomString($length = 16)
{
	$string = '';

	$keys = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

	for($i = 0; $i < $length; $i++) {
		$string .= $keys[array_rand($keys)];
	}

	return $string;
}

/**
 * Determines whether the current environment is Windows based.
 *
 * @return bool
 */
function is_windows_os()
{
	return strtolower(substr(PHP_OS, 0, 3)) === 'win';
}

/**
 * Build a user-friendly error message from an array of errors.
 * 
 * @param array $errors array of errors to be fetched
 * @param string $errorMsg custom error message shown to the user
 * @param string $errorMsgWrapper the HTML tag which wrap the error message
 * @param string $errorWrapper the HTML tag which wrap each error item
 * @return bool|string returns false if the supplied errors variable is not an array otherwise returns the error message
 */
function build_error_message($errors, $errorMsg, $errorMsgWrapper = "p", $errorWrapper = "ul") {
	if((is_array($errors) || is_string($errors)) && !empty($errors)) {
		$errorMsgWrapper = strtolower($errorMsgWrapper);
		$errorWrapper = strtolower($errorWrapper);

		$message = "";
		$errorMsgWrapper_openTag = "";
		$errorMsgWrapper_closeTag = "";

		$errorWrapper_openTag = "";
		$errorWrapper_closeTag = "";
		$errorWrapper_itemOpenTag = "";
		$errorWrapper_itemCloseTag = "";

		// creating the errorWrapper...
		switch ($errorWrapper) {
			case 'ol':
			case '<ol>':
			case '<ol></ol>':
			case 'ordered list':
			case 'ordered-list':
			case 'ordered_list':
			case 'orderedlist':
				$errorWrapper_openTag = "<ol>";
				$errorWrapper_closeTag = "</ol>";
				$errorWrapper_itemOpenTag = "<li>";
				$errorWrapper_itemCloseTag = "</li>";
				break;

			case 'pre':
			case '<pre>':
			case '<pre></pre>':
				$errorWrapper_openTag = "<pre>";
				$errorWrapper_closeTag = "</pre>";
				break;

			default:
				$errorWrapper_openTag = "<ul>";
				$errorWrapper_closeTag = "</ul>";
				$errorWrapper_itemOpenTag = "<li>";
				$errorWrapper_itemCloseTag = "</li>";
				break;
		}

		// creating the $errorWrapper...
		switch ($errorMsgWrapper) {
			case 'h':
			case 'h3':
			case '<h3>':
			case '<h3></h3>':
			case 'heading':
			case 'heading3':
			case 'heading 3':
			case 'heading_3':
			case 'heading-3':
				$errorMsgWrapper_openTag = "<h3>";
				$errorMsgWrapper_closeTag = "</h3>";
				break;

			default:
				$errorMsgWrapper_openTag = "<p>";
				$errorMsgWrapper_closeTag = "</p>";
				break;
		}

		$message = $errorMsgWrapper_openTag . $errorMsg . $errorMsgWrapper_closeTag;
		$message .= $errorWrapper_openTag;

		if(is_array($errors)) {
			// fetching the errors from the errors array...
			foreach ($errors as $error) {
				$message .= $errorWrapper_itemOpenTag . $error . $errorWrapper_itemCloseTag;
			}
		} else {
			// fetching the error from the error variable...
			$message .= $errorWrapper_itemOpenTag . $errors . $errorWrapper_itemCloseTag;
		}

		$message .= $errorWrapper_closeTag;

		return $message;
	} else {
		return FALSE;
	}
}

function show_notification($title, $message, $type = 'success', $closable = true) {
	switch ($type) {
		case 'success':
			$type = 'success';
			break;

		case 'error':
			$type = 'error';
			break;

		case 'warning':
			$type = 'warning';
			break;

		default:
			$type = 'success';
			break;
	}

	$html =  "<div class='notification {$type}'>";
	$html .= "<p><span class='title'>{$title}</span> {$message}</p>";

	if($closable === true) {
		$html .= "<div class='close'></div>";
	}

	$html .= "</div>";

	return $html;
}
