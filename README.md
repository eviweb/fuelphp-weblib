Fuel PHP Weblib Package
=======================

This package adds some features to easily link useful web libraries in a template,
directly from their sources.    

Wants to use JQuery for example ?   
1. enable this package in the application config file as decribed 
[here](http://docs.fuelphp.com/general/packages.html "Fuel PHP Package Documentation"),   
2. call	``evidev\fuelphp\weblib\Loader::jquery()`` where it is needed    
    
this will produce 
``<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>``

Included Libraries :    
* [JQuery](http://jquery.com/)   
* [JQuery UI](http://jqueryui.com/)   
* [JQuery UI Themes](http://jqueryui.com/themeroller/)   
* [Backbone JS](http://backbonejs.org/)   
* [Require JS](http://requirejs.org/)   
* [Require JS Plugins](http://requirejs.org/)   
* [Underscore](http://documentcloud.github.com/underscore/)   
* [Zepto JS](http://zeptojs.com/)   
* [JSON-js Scripts](https://github.com/douglascrockford/JSON-js)    
