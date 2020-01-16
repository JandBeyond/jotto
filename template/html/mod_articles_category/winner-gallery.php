<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2019 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Layout\LayoutHelper;

if (!$list)
{
	return;
}

?>
<ul class="mod-articlescategory category-module mod-list winner-gallery">
	<?php foreach ($list as $item) : ?>
	<?php $images   = json_decode($item->images); ?>
		<li>
			<figure>
				<img loading="lazy" class="lazyload" src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="<?php echo $item->title; ?>">
				<figcaption>
					<p>
						<?php echo $item->title; ?> - <?php echo $item->displayAuthorName; ?>
					</p>
				</figcaption>
			</figure>
		</li>
	<?php endforeach; ?>
</ul>
