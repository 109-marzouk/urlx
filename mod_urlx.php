<?php
/**
 * @package    urlx
 *
 * @author     Mohamed Marzouk <109.marzouk@gmail.com>
 * @copyright  Copyrights Reserved
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       https://www.github.com/109-marzouk
 */

use Joomla\CMS\Helper\ModuleHelper;

defined('_JEXEC') or die;

require ModuleHelper::getLayoutPath('mod_urlx', $params->get('layout', 'default'));
