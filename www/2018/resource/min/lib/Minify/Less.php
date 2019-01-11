<?php

/**
 * Class LessCss_Minify  
 * @package LessCss
 */

 
require_once 'CSS.php';

/**
 * Minify CSS
 *
 * This class uses Minify_CSS and lessphp to compress LESS sources
 * 
 * @package LessCss
 * @author Marco Pivetta <ocramius@gmail.com>
 * @author http://marco-pivetta.com/
 */
class Minify_Less extends Minify_CSS {
    
    /**
     * Minify a LESS string
     * 
     * @param string $less
     * 
     * @param array $options available options:
     * 
     * @inheritdoc
     * 
     * @return string
     */
    public static function minify($less, $options = array()) 
    {
				if (!isset($options['lessCompiler'])) {
					throw new Exception("LESS Compiler path not set.");
				}
				require_once $options['lessCompiler'];
				
				$lessc = new lessc();
				
				return parent::minify($lessc->compile($less), $options);
    }
}
