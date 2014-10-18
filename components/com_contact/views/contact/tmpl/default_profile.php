<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

if (JPluginHelper::isEnabled('user', 'profile'))
{
	$fields = $this->item->profile->getFieldset('profile');
	?>
	<div class="contact-profile" id="users-profile-custom">
		<dl class="dl-horizontal">
			<?php
				foreach ($fields as $profile)
				{
					if ($profile->value)
					{
						echo '<dt>' . $profile->label . '</dt>';
						$profile->text = htmlspecialchars($profile->value, ENT_COMPAT, 'UTF-8');

						if ($profile->id == 'profile_website')
						{
							if (substr($profile->value, 0, 4) != "http")
							{
								$profile->text = "http://" . $profile->text;
							}

							echo '<dd><a href="' . $profile->text . '">' . $profile->text . '</a></dd>';
						}
						else
						{
							echo '<dd>' . $profile->text . '</dd>';
						}
					}
				}
			?>
		</dl>
	</div>
	<?php
}
