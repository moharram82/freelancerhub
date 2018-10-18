<?php

if (! function_exists('env')) {
    /**
     * Gets the value of an environment variable.
     *
     * @param  string  $key
     * @param  mixed   $default
     * @return mixed
     */
    function env($key, $default = null)
    {
		$value = getenv($key);
		
		if ($value === false && $default !== null) {
            return $default;
        }

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        return $value;
    }
}

if (! function_exists('config')) {
    /**
     * Get / set the specified configuration value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string  $key
     * @param  mixed  $default
     * @return mixed
     */
    function config($key = null, $default = null)
    {
		global $config;

        if (is_null($key)) {
            return $config;
		}

		if (is_array($key)) {
			
			foreach ($key as $arr_key => $arr_value) {
				$config->set($arr_key, $arr_value);
			}

			return;
		}

        return ($config->has($key)) ? $config[$key] : $default;
    }
}

if (! function_exists('http_response_code'))
{
    function http_response_code($newcode = NULL)
    {
		static $code = 200;
		
        if ($newcode !== NULL)
        {
			header('X-PHP-Response-Code: '.$newcode, true, $newcode);
			
            if (! headers_sent()) {
                $code = $newcode;
			}
		}
		
        return $code;
    }
}

if (! function_exists('redirect')) {
	/**
	 * Redirects to the specified URL
	 * 
	 * @param string $url The URL to be directed to
	 */
	function redirect($url = '/', $code = 200)
	{
		$code = (int) $code;

		http_response_code($code);

		header("Location: {$url}");
		echo "<meta http-equiv='refresh' content='0;url={$url}'>";
		echo "If your browser doesn't support redirect, click <a href='{$url}'>here</a> to redirect manually.";
		exit();
	}
}

if (! function_exists('cookie')) {
    /**
     * Create a new cookie instance.
     *
     * @param  string  $name
     * @param  string  $value
     * @param  int  $minutes
     * @param  string  $path
     * @param  string  $domain
     * @param  bool  $secure
     * @param  bool  $httpOnly
     * @param  bool  $raw
     * @param  string|null  $sameSite
     * @return \Illuminate\Cookie\CookieJar|\Symfony\Component\HttpFoundation\Cookie
     */
    function cookie($name = null, $value = null, $seconds = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
    {
        return setcookie($name, $value, time() + $seconds, $path, $domain, $secure, $httpOnly);
    }
}

if (! function_exists('csrf_field')) {
    /**
     * Generate a CSRF token form field.
     *
     * @return \Illuminate\Support\HtmlString
     */
    function csrf_field()
    {
        if(config('csrf.enabled')) {
            return '<input type="hidden" name="' . config('csrf.field_name') . '" value="' . csrf_token() . '">';
        }

        return '';
    }
}

if (! function_exists('csrf_token')) {
    /**
     * Get the CSRF token value.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    function csrf_token($tokenId = null)
    {
        global $csrf;

        if(null !== $tokenId) {
            return $csrf->getToken($tokenId);
        }

        return $csrf->getToken(config('csrf.token_id'));
    }
}

if (! function_exists('config_app_locale')) {
	/**
	 * Sets the application locale
	 *
	 * @return void
	 */
    function config_app_locale()
    {
        global $request;
		$languages = config('languages');

		if(isset($_GET['lang']) && !empty($_GET['lang']) && in_array($_GET['lang'], $languages)) {
			$language = $_GET['lang'];
		} elseif(isset($_COOKIE['lang']) && !empty($_COOKIE['lang']) && in_array($_COOKIE['lang'], $languages)) {
			$language = $_COOKIE['lang'];
		} else {
			$language = config('locale');
		}

        setcookie('lang', $language, time()+60*60*24*30*12, config('session.cookie_path'));
        $request->setLocale($language);

		return $language;
	}
}

if (! function_exists('config_app_charset')) {
	/**
	 * Configures the application charset
	 *
	 * @return void
	 */
	function config_app_charset()
	{
		$charset = strtoupper(config('charset'));
		ini_set('default_charset', $charset);

		if (extension_loaded('mbstring')) {
			define('MB_ENABLED', true);
			// mbstring.internal_encoding is deprecated starting with PHP 5.6
			// and it's usage triggers E_DEPRECATED messages.
			@ini_set('mbstring.internal_encoding', $charset);
			// This is required for mb_convert_encoding() to strip invalid characters.
			// That's utilized by CI_Utf8, but it's also done for consistency with iconv.
			mb_substitute_character('none');
		} else {
			define('MB_ENABLED', false);
		}

		// There's an ICONV_IMPL constant, but the PHP manual says that using
		// iconv's predefined constants is "strongly discouraged".
		if (extension_loaded('iconv')) {
			define('ICONV_ENABLED', true);
			// iconv.internal_encoding is deprecated starting with PHP 5.6
			// and it's usage triggers E_DEPRECATED messages.
			@ini_set('iconv.internal_encoding', $charset);
		} else {
			define('ICONV_ENABLED', false);
		}
	}
}
