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

namespace evidev\fuelphp\weblib\test;

/**
 * loads web libraries
 * 
 * @package     weblib
 * @author      Eric VILLARD <dev@eviweb.fr>
 * @copyright	(c) 2012 Eric VILLARD <dev@eviweb.fr>
 * @license     http://opensource.org/licenses/MIT MIT License
 * @group	weblib
 */
class Loader extends \Fuel\Core\TestCase
{
	/**
	 * @covers evidev\fuelphp\weblib\Loader::jquery
	 */
	public function testJquery()
	{
		$this->assertEquals(
		    '<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>',
		    trim(\evidev\fuelphp\weblib\Loader::jquery())
		);
	}

	/**
	 * @covers evidev\fuelphp\weblib\Loader::jquery_ui
	 */
	public function testJquery_ui()
	{
		$this->assertEquals(
		    '<script type="text/javascript" src="http://code.jquery.com/ui/1.8.24/jquery-ui.min.js"></script>',
		    trim(\evidev\fuelphp\weblib\Loader::jquery_ui())
		);
		$this->assertEquals(
		    '<script type="text/javascript" src="http://code.jquery.com/ui/1.8.24/jquery-ui.min.js"></script>',
		    trim(\evidev\fuelphp\weblib\Loader::jquery_ui('1.8.24'))
		);
		$this->assertEquals(
		    '<script type="text/javascript" src="http://code.jquery.com/ui/1.8.24/jquery-ui.min.js"></script>',
		    trim(\evidev\fuelphp\weblib\Loader::jquery_ui('1.8.23'))
		);
		$this->assertEquals(
		    '<script type="text/javascript" src="http://code.jquery.com/ui/1.9.0/jquery-ui.min.js"></script>',
		    trim(\evidev\fuelphp\weblib\Loader::jquery_ui('1.9.0'))
		);		
	}

	/**
	 * @covers evidev\fuelphp\weblib\Loader::jquery_ui_theme
	 */
	public function testJquery_ui_theme()
	{
		$this->assertEquals(
		    '<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.8.24/themes/base/jquery-ui.css" />',
		    trim(\evidev\fuelphp\weblib\Loader::jquery_ui_theme('base'))
		);
		$this->assertEquals(
		    '<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.8.24/themes/base/jquery-ui.css" />',
		    trim(\evidev\fuelphp\weblib\Loader::jquery_ui_theme('base', '1.8.24'))
		);
		$this->assertEquals(
		    '<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.8.24/themes/base/jquery-ui.css" />',
		    trim(\evidev\fuelphp\weblib\Loader::jquery_ui_theme('base', '1.8.23'))
		);
		$this->assertEquals(
		    '<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />',
		    trim(\evidev\fuelphp\weblib\Loader::jquery_ui_theme('base', '1.9.0'))
		);
		$this->assertEmpty(
		    \evidev\fuelphp\weblib\Loader::jquery_ui_theme('wrong_theme')
		);
		$this->assertEquals(
		    \evidev\fuelphp\weblib\Loader::jquery_ui_theme(),
		    \evidev\fuelphp\weblib\Loader::jquery_ui_theme(\evidev\fuelphp\weblib\Loader::LOAD_ALL)
		);
		$this->assertEquals(
		    $this->_get_all_jquery_ui_themes(),
		    \evidev\fuelphp\weblib\Loader::jquery_ui_theme()
		);
		$this->assertEquals(
		    $this->_get_all_jquery_ui_themes('1.9.0'),
		    \evidev\fuelphp\weblib\Loader::jquery_ui_theme(\evidev\fuelphp\weblib\Loader::LOAD_ALL, '1.9.0')
		);
	}

	/**
	 * @covers evidev\fuelphp\weblib\Loader::backbonejs
	 */
	public function testBackbonejs()
	{
		$this->assertEquals(
		    '<script type="text/javascript" src="http://backbonejs.org/backbone-min.js"></script>',
		    trim(\evidev\fuelphp\weblib\Loader::backbonejs())
		);
	}

	/**
	 * @covers evidev\fuelphp\weblib\Loader::requirejs
	 */
	public function testRequirejs()
	{
		$this->assertEquals(
		    '<script type="text/javascript" src="http://requirejs.org/docs/release/2.0.6/minified/require.js"></script>',
		    trim(\evidev\fuelphp\weblib\Loader::requirejs())
		);
	}

	/**
	 * @covers evidev\fuelphp\weblib\Loader::requirejs_plugin
	 */
	public function testRequirejs_plugin()
	{
		$this->assertEquals(
		    '<script type="text/javascript" src="https://raw.github.com/requirejs/text/latest/text.js"></script>',
		    trim(\evidev\fuelphp\weblib\Loader::requirejs_plugin('text'))
		);
		$this->assertEmpty(
		    \evidev\fuelphp\weblib\Loader::requirejs_plugin('wrong_plugin')
		);
		$this->assertEquals(
		    \evidev\fuelphp\weblib\Loader::requirejs_plugin(),
		    \evidev\fuelphp\weblib\Loader::requirejs_plugin(\evidev\fuelphp\weblib\Loader::LOAD_ALL)
		);
		$this->assertEquals(
		    $this->_get_all_requirejs_plugins(),
		    \evidev\fuelphp\weblib\Loader::requirejs_plugin()
		);
	}

	/**
	 * @covers evidev\fuelphp\weblib\Loader::underscorejs
	 */
	public function testUnderscorejs()
	{
		$this->assertEquals(
		    '<script type="text/javascript" src="http://documentcloud.github.com/underscore/underscore-min.js"></script>',
		    trim(\evidev\fuelphp\weblib\Loader::underscorejs())
		);
	}

	/**
	 * @covers evidev\fuelphp\weblib\Loader::zeptojs
	 */
	public function testZeptojs()
	{
		$this->assertEquals(
		    '<script type="text/javascript" src="http://zeptojs.com/zepto.min.js"></script>',
		    trim(\evidev\fuelphp\weblib\Loader::zeptojs())
		);
	}

	/**
	 * @covers evidev\fuelphp\weblib\Loader::jsonjs_script
	 */
	public function testJsonjs_script()
	{
		$this->assertEquals(
		    '<script type="text/javascript" src="https://raw.github.com/douglascrockford/JSON-js/master/json2.js"></script>',
		    trim(\evidev\fuelphp\weblib\Loader::jsonjs_script('json2'))
		);
		$this->assertEmpty(
		    \evidev\fuelphp\weblib\Loader::jsonjs_script('wrong_script')
		);
		$this->assertEquals(
		    \evidev\fuelphp\weblib\Loader::jsonjs_script(),
		    \evidev\fuelphp\weblib\Loader::jsonjs_script(\evidev\fuelphp\weblib\Loader::LOAD_ALL)
		);
		$this->assertEquals(
		    $this->_get_all_jsonjs_scripts(),
		    \evidev\fuelphp\weblib\Loader::jsonjs_script()
		);
	}

	/**
	 * @covers evidev\fuelphp\weblib\Loader::bootstrap
	 * @expectedException        Exception
	 * @expectedExceptionMessage Loader::bootstrap() is not yet implemented
	 */
	public function testBootstrap()
	{		
		\evidev\fuelphp\weblib\Loader::bootstrap();
	}

	/**
	 * @covers evidev\fuelphp\weblib\Loader::lesscss
	 */
	public function testLesscss()
	{
		$this->assertEquals(
		    '<script type="text/javascript" src="http://lesscss.googlecode.com/files/less-1.3.0.min.js"></script>',
		    trim(\evidev\fuelphp\weblib\Loader::lesscss())
		);
	}
	
	/**
	 * get all jquery ui themes
	 * 
	 * @return string	returns the html code
	 */
	private function _get_all_jquery_ui_themes($version = '1.8.24')
	{
		return 
'	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/base/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/black-tie/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/blitzer/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/cupertino/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/dark-hive/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/dot-luv/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/eggplant/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/excite-bike/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/flick/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/hot-sneaks/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/humanity/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/le-frog/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/mint-choc/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/overcast/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/pepper-grinder/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/redmond/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/smoothness/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/south-street/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/start/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/sunny/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/swanky-purse/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/trontastic/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/ui-darkness/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/ui-lightness/jquery-ui.css" />
	<link type="text/css" rel="stylesheet" href="http://code.jquery.com/ui/'.$version.'/themes/vader/jquery-ui.css" />
';
	}
	
	/**
	 * get all require JS plugins
	 * 
	 * @return string	returns the html code
	 */
	private function _get_all_requirejs_plugins()
	{
		return 
'	<script type="text/javascript" src="https://raw.github.com/requirejs/text/latest/text.js"></script>
	<script type="text/javascript" src="https://raw.github.com/requirejs/domReady/latest/domReady.js"></script>
	<script type="text/javascript" src="https://github.com/jrburke/require-cs/raw/latest/cs.js"></script>
	<script type="text/javascript" src="https://raw.github.com/requirejs/i18n/latest/i18n.js"></script>
';
	}
	
	/**
	 * get all JSON-js scripts
	 * 
	 * @return string	returns the html code
	 */
	private function _get_all_jsonjs_scripts()
	{
		return 
'	<script type="text/javascript" src="https://raw.github.com/douglascrockford/JSON-js/master/cycle.js"></script>
	<script type="text/javascript" src="https://raw.github.com/douglascrockford/JSON-js/master/json.js"></script>
	<script type="text/javascript" src="https://raw.github.com/douglascrockford/JSON-js/master/json2.js"></script>
	<script type="text/javascript" src="https://raw.github.com/douglascrockford/JSON-js/master/json_parse.js"></script>
	<script type="text/javascript" src="https://raw.github.com/douglascrockford/JSON-js/master/json_parse_state.js"></script>
';
	}
}