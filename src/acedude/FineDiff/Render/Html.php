<?php

/**
 * FINE granularity DIFF
 *
 * Computes a set of instructions to convert the content of
 * one string into another.
 *
 * Originally created by Raymond Hill (https://github.com/gorhill/PHP-FineDiff), brought up
 * to date by Cog Powered (https://github.com/acedude/FineDiff).
 *
 * @copyright Copyright 2011 (c) Raymond Hill (http://raymondhill.net/blog/?p=441)
 * @copyright Copyright 2013 (c) Robert Crowe (http://acedude.com)
 * @link https://github.com/acedude/FineDiff
 * @version 0.0.1
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

namespace acedude\FineDiff\Render;

use acedude\FineDiff\Parser\OpcodeInterface;

class Html extends Renderer {
	public function callback( $opcode, $from, $from_offset, $from_len ) {
		if ( $opcode === 'c' ) {
			$html = htmlentities( substr( $from, $from_offset, $from_len ) );
		} else if ( $opcode === 'd' ) {

			$deletion = substr( $from, $from_offset, $from_len );

			if ( strcspn( $deletion, " \n\r" ) === 0 ) {
				$deletion = str_replace( array( "\n", "\r" ), array( '\n', '\r' ), $deletion );
			}

			$html = '<del>' . htmlentities( $deletion ) . '</del>';
			$html = str_replace( "\r\n", PHP_EOL, $html );
			$html = str_replace( PHP_EOL, '</del>' . PHP_EOL . '<del>', $html );

		} else /* if ( $opcode === 'i' ) */ {
			$html = '<ins>' . htmlentities( substr( $from, $from_offset, $from_len ) ) . '</ins>';
			$html = str_replace( ["\r\n"], PHP_EOL, $html );
			$html = str_replace( PHP_EOL, '</ins>' . PHP_EOL . '<ins>', $html );
		}

		return $html;
	}
}