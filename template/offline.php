<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Helper\AuthenticationHelper;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

/** @var JDocumentHtml $this */

$twofactormethods = AuthenticationHelper::getTwoFactorMethods();
$app              = Factory::getApplication();
$wa               = $this->getWebAssetManager();

?>
<!doctype html>

<html lang="<?php echo $this->language; ?>">

<head>
	<meta charset="utf-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/style.css" rel="stylesheet" />
</head>

<body>
	<div id="offline">
		<div class="wrap-inside">
			<div class="header">
			<?php if (!empty($logo)) : ?>
				<h1><?php echo $logo; ?></h1>
			<?php else : ?>
				<h1><?php echo $sitename; ?></h1>
			<?php endif; ?>
			<?php if ($app->get('offline_image') && file_exists($app->get('offline_image'))) : ?>
				<img src="<?php echo $app->get('offline_image'); ?>" alt="<?php echo $sitename; ?>">
			<?php endif; ?>
			<?php if ($app->get('display_offline_message', 1) == 1 && str_replace(' ', '', $app->get('offline_message')) != '') : ?>
				<p><?php echo $app->get('offline_message'); ?></p>
			<?php elseif ($app->get('display_offline_message', 1) == 2) : ?>
				<p><?php echo Text::_('JOFFLINE_MESSAGE'); ?></p>
			<?php endif; ?>
			<div class="login">
				<jdoc:include type="message" />
				<form action="<?php echo Route::_('index.php', true); ?>" method="post" id="form-login">
					<fieldset>
						<label for="username"><?php echo Text::_('JGLOBAL_USERNAME'); ?></label>
						<input name="username" class="form-control" id="username" type="text">

						<label for="password"><?php echo Text::_('JGLOBAL_PASSWORD'); ?></label>
						<input name="password" class="form-control" id="password" type="password">

						<?php if (count($twofactormethods) > 1) : ?>
						<label for="secretkey"><?php echo Text::_('JGLOBAL_SECRETKEY'); ?></label>
						<input name="secretkey" class="form-control" id="secretkey" type="text">
						<?php endif; ?>

						<input type="submit" name="Submit" class="btn btn-primary" value="<?php echo Text::_('JLOGIN'); ?>">

						<input type="hidden" name="option" value="com_users">
						<input type="hidden" name="task" value="user.login">
						<input type="hidden" name="return" value="<?php echo base64_encode(Uri::base()); ?>">
						<?php echo HTMLHelper::_('form.token'); ?>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
</body>

</html>
