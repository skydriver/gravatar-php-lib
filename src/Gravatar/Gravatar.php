<?php

namespace Gravatar;

/**
 * Avatar class
 *
 * @since 1.0.0
 * @author Damjan Krstevski - 2018
 * @package gravatar-php-lib
 */
class Gravatar
{
	/**
	 * Get either a Gravatar URL or complete image tag for a specified email address.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param string $email The email address
	 * @param string $s Size in pixels, defaults to 80px [ 1 - 2048 ]
	 * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
	 * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
	 * @param boole $img True to return a complete IMG tag False for just the URL
	 * @param array $atts Optional, additional key/value attributes to include in the IMG tag
	 * 
	 * @return String containing either just a URL or a complete image tag
	 * 
	 * @source https://gravatar.com/site/implement/images/php/
	 */
	public static function getAvatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() )
	{
		$url = 'https://www.gravatar.com/avatar/';
		$url .= md5( strtolower( trim( $email ) ) );
		$url .= "?s=$s&d=$d&r=$r";

		if ($img) {
			$url = '<img src="' . $url . '"';
			foreach ($atts as $key => $val) {
				$url .= ' ' . $key . '="' . $val . '"';
			}

			$url .= ' />';
		}

		return $url;
	}





	/**
	 * Get a Gravatar profile data for a specified email address.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param string $email The email address
	 * @param string $format [json | xml | php | vcf | qr]
	 * 
	 * @return String containing either just a URL or a complete image tag
	 * 
	 * @source https://gravatar.com/site/implement/images/php/
	 */
	public static function getProfile( $email, $format = 'php' )
	{
		$email = md5(strtolower(trim($email)));
		return file_get_contents( 'https://www.gravatar.com/' . $email . '.' . $format );
	}
}