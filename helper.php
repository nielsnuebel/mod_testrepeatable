<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_testrepeatable
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Helper for mod_feed
 *
 * @package     Joomla.Site
 * @subpackage  mod_testrepeatable
 * @since       1.5
 */
class ModTestRepeatableHelper
{
	/**
	 * Get the Repeatable Field information.
	 *
	 * @param   string   $repeatableField  The component option.
	 * @param   boolean  $returnarray      The component option.
	 *
	 * @return  object  An object with the information for the component.
	 *
	 * @since   1.5
	 */
	public static function getRepeatable($repeatableField, $returnarray = true)
	{
		$firstkey = false;
		$id = array();
		$repeatableField = json_decode($repeatableField);

		if (is_null($repeatableField))
		{
			return $repeatableField;
		}

		if (!$returnarray)
		{
			$result = new stdClass;
		}
		else
		{
			$result = array();
		}

		foreach ($repeatableField as $key => $values)
		{
			$i = 0;

			if (!$returnarray)
			{
				if (!$firstkey)
				{
					$count = 0;

					foreach ($values as $value)
					{
						$id[$count] = $value;
						$count++;
					}

					$firstkey = true;
				}

				foreach ($values as $value)
				{
					$setting = $id[$i];
					if (!isset($result->$setting))
					{
						$result->$setting = new stdClass;
					}

					$result->$setting->$key = $value;
					$i++;
				}
			}
			else
			{
				foreach ($values as $value)
				{
					if (!isset($result[$i]))
					{
						$result[$i] = new stdClass;
					}

					$result[$i]->$key = $value;
					$i++;
				}
			}
		}

		return $result;
	}
}
