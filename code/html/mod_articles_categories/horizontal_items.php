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
$i = 0;
foreach ($list as $item) :
?>

<div style="width:31%; padding:0 1%; float:left" class="horizontal_container">
	<li <?php if ($_SERVER['PHP_SELF'] == JRoute::_(ContentHelperRoute::getCategoryRoute($item->id))) echo ' class="active"';?>> <?php $levelup=$item->level-$startLevel -1; ?>
		<?php
		if($params->get('show_description', 0))
		{	 		
			//echo JHtml::_('content.prepare', $item->description, $item->getParams(), 'mod_articles_categories.content');?>
            <?php
            if ($item->getParams()->get('image'))
			{?>
        	<img src="<?php echo $item->getParams()->get('image');?> ?>" />
            <?php
			} else {
			?>
            <div>noimage</div>
            <?php } ?>

            <div class="text_frontcat">
                <span class="title_frontcat"><?php echo $item->title;?></span> - <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>" class="description_frontcat"><?php echo strip_tags($item->description);?></a>
            </div>
		<?php }
		?>
 </li>
</div>
<?php 
if (++$i == 3) break;
endforeach; 
?>
