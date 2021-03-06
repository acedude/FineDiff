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

namespace acedude\FineDiff\Exceptions;

/**
 * Thrown when trying to set an opcode that doesn't implement acedude\FineDiff\Parser\Operations\OperationInterface.
 */
class OperationException extends \Exception {}