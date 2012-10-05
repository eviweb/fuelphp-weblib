<?php

/* vim: set noexpandtab tabstop=8 shiftwidth=8 softtabstop=8: */
/**
 * The MIT License
 *
 * Copyright 2012 Eric VILLARD <dev@eviweb.fr>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * 
 * @package     weblib
 * @author      Eric VILLARD <dev@eviweb.fr>
 * @copyright	(c) 2012 Eric VILLARD <dev@eviweb.fr>
 * @license     http://opensource.org/licenses/MIT MIT License
 */

namespace evidev\fuelphp\weblib;

/**
 * loads web libraries
 * 
 * @package     weblib
 * @author      Eric VILLARD <dev@eviweb.fr>
 * @copyright	(c) 2012 Eric VILLARD <dev@eviweb.fr>
 * @license     http://opensource.org/licenses/MIT MIT License
 */
class Loader
{
	/**
	 * @var string load all files
	 */
	const LOAD_ALL = 'all';

	/**
	 * get code to load JQuery
	 * 
	 * @return string
	 * @link http://jquery.com/
	 */
	public static function jquery()
	{
		return \Asset::js(\Config::get('weblib.jquery'));
	}

	/**
	 * get code to load JQuery UI
	 * 
	 * @return string
	 * @link http://jqueryui.com/
	 */
	public static function jquery_ui()
	{
		return \Asset::js(\Config::get('weblib.jquery-ui-base-uri').'/'.\Config::get('weblib.jquery-ui-file'));
	}

	/**
	 * get code to load JQuery UI themes
	 * 
	 * @param  string	the name of the theme or Loader::LOAD_ALL to load all themes
	 * @return string
	 * @link http://jqueryui.com/themeroller/
	 */
	public static function jquery_ui_theme($theme = self::LOAD_ALL)
	{
		$theme          = strtolower($theme);
		$theme_base_uri = \Config::get('weblib.jquery-ui-base-uri').'/themes/';
		$themes         = \Config::get('weblib.jquery-ui-themes');
		$file           = \Config::get('weblib.jquery-ui-theme-file');
		if ($theme !== self::LOAD_ALL)
		{
			if (!in_array($theme, $themes))
				return '';
			else
				return \Asset::css($theme_base_uri.$theme.'/'.$file);
		}

		$return = '';
		foreach ($themes as $theme)
		{
			$return .= \Asset::css($theme_base_uri.$theme.'/'.$file);
		}
		return $return;
	}

	/**
	 * get code to load BackboneJS
	 * 
	 * @return string
	 * @link http://backbonejs.org/
	 */
	public static function backbonejs()
	{
		return \Asset::js(\Config::get('weblib.backbonejs'));
	}

	/**
	 * get code to load RequireJS
	 * 
	 * @return string
	 * @link http://requirejs.org/
	 */
	public static function requirejs()
	{
		return \Asset::js(\Config::get('weblib.requirejs'));
	}

	/**
	 * get code to load RequireJS plugins
	 * 
	 * @param  string	the name of the plugin or Loader::LOAD_ALL to load all plugins
	 * @return string
	 * @link http://requirejs.org/
	 */
	public static function requirejs_plugin($plugin = self::LOAD_ALL)
	{
		$plugin  = strtolower($plugin);
		$plugins = \Config::get('weblib.requirejs-plugins');
		if ($plugin !== self::LOAD_ALL)
		{
			if (!array_key_exists($plugin, $plugins))
				return '';
			else
				return \Asset::js($plugins[$plugin]);
		}

		$return = '';
		foreach ($plugins as $plugin => $link)
		{
			$return .= \Asset::js($link);
		}
		return $return;
	}

	/**
	 * get code to load Underscore
	 * 
	 * @return string
	 * @link http://documentcloud.github.com/underscore/
	 */
	public static function underscorejs()
	{
		return \Asset::js(\Config::get('weblib.underscorejs'));
	}

	/**
	 * get code to load ZeptoJS
	 * 
	 * @return string
	 * @link http://zeptojs.com/
	 */
	public static function zeptojs()
	{
		return \Asset::js(\Config::get('weblib.zeptojs'));
	}

	/**
	 * get code to load JSON-js plugins
	 * 
	 * @param  string	the name of the script or Loader::LOAD_ALL to load all scripts
	 * @return string
	 * @link https://github.com/douglascrockford/JSON-js
	 */
	public static function jsonjs_script($script = self::LOAD_ALL)
	{
		$script  = strtolower($script);
		$scripts = \Config::get('weblib.json-js');
		if ($script !== self::LOAD_ALL)
		{
			if (!array_key_exists($script, $scripts))
				return '';
			else
				return \Asset::js($scripts[$script]);
		}

		$return = '';
		foreach ($scripts as $script => $link)
		{
			$return .= \Asset::js($link);
		}
		return $return;
	}

	/**
	 * get code to load Bootstrap
	 * 
	 * @return string
	 * @link http://twitter.github.com/bootstrap/
	 */
	public static function bootstrap()
	{
		throw new \Exception(__class__.'::'.__FUNCTION__.'() is not yet implemented');
	}
	
	/**
	 * get code to load lesscss
	 * 
	 * @return string
	 * @link http://lesscss.org/
	 */
	public static function lesscss()
	{
		return \Asset::js(\Config::get('weblib.lesscss'));
	}

}