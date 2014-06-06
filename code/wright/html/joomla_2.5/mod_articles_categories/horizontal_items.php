<?php
// Wright v.3 Override: Joomla 2.5.18
/**
 * @package		Joomla.Site
 * @subpackage	mod_articles_categories
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
foreach ($list as $item) :

?>
	<li <?php if ($_SERVER['PHP_SELF'] == JRoute::_(ContentHelperRoute::getCategoryRoute($item->id))) echo ' class="active"';?>> <?php $levelup=$item->level-$startLevel -1; ?>
  <h<?php echo $params->get('item_heading')+ $levelup; ?>>
		<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>">
			<i class="icon-folder-open"></i>  <?php // Wright v.3: Added icon ?>
		<?php echo $item->title;?></a>test
   </h><?php echo $params->get('item_heading')+ $levelup; ?>>
   
<?php if ($this->params->get('show_description_image') && $this->parent->getParams()->get('image')) : ?>
     <img src="<?php echo $this->parent->getParams()->get('image'); ?>" alt=" "/>
<?php endif; ?>

		<?php
		if($params->get('show_description', 0))
		{
			echo JHtml::_('content.prepare', $item->description, $item->getParams(), 'mod_articles_categories.content');
		}
		
		
		if($params->get('show_children', 0) && (($params->get('maxlevel', 0) == 0) || ($params->get('maxlevel') >= ($item->level - $startLevel))) && count($item->getChildren()))
		{

			echo '<ul class="nav nav-list">';  // Wright v.3: Added nav nav-list classes
			$temp = $list;
			$list = $item->getChildren();
			require JModuleHelper::getLayoutPath('mod_articles_categories', $params->get('layout', 'horizontal').'_items');
			$list = $temp;
			echo '</ul>';
		}
		?>
 </li>
<?php endforeach; ?>