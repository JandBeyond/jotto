<?php 
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

/** @var JDocumentError $this */

$app  = Factory::getApplication();
$lang = Factory::getLanguage();
$wa   = $this->getWebAssetManager();

?>
<!doctype html>

<html lang="<?php echo $this->language; ?>">

<head>
	<meta charset="utf-8" />
	<title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
 	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/style.css" rel="stylesheet" />
</head>

<body>
	<div id="error">
		<div class="wrap-inside">
			<h1><?php echo $app->getCfg('sitename'); ?></h1>
			<h2><?php echo $this->error->getCode().' - '.$this->error->getMessage(); ?></h2>
			<?php 
			  if (($this->error->getCode()) == '404') {
				echo '<h3>';
				echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND');
				echo '</h3>';
			  }
			?>
			<p>&nbsp;</p>
			<p>
				<?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>:
				<a href="<?php echo $this->baseurl; ?>/"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>
			</p>
		</div>
	</div>
</body>

</html>
