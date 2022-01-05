<?php
/**
 * @package    urlx
 *
 * @author     Mohamed Marzouk <109.marzouk@gmail.com>
 * @copyright  Copyrights Reserved
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       https://www.github.com/109-marzouk
 */

defined('_JEXEC') or die;

require_once __DIR__ . '\..\helper.php';

// Access to module parameters
$first_param  = new UrlXParam($params->get('key1', ''), $params->get('value1', ''));
$second_param = new UrlXParam($params->get('key2', ''), $params->get('value2', ''));

$full_url = new UrlX($params->get('url', ''), $first_param, $second_param);

echo $full_url->getHTML();