<?php
defined('_JEXEC') or die;

$items = ModTestRepeatableHelper::getRepeatable($params->get('items', null), true);

if (count($items))
{
	echo '<ul>';
	foreach($items as $item)
	{
		echo '<li>';
		echo '<h2>' . $item->item_title  . '</h2>';
		echo JHtml::_('image', htmlspecialchars($item->item_image), '', array('class' => 'img-polaroid'));
		echo '</li>';
	}
	echo '</ul>';
}

