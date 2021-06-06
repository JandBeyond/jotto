<?php 

defined( '_JEXEC' ) or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Uri\Uri;

$templatePath = Uri::root() . 'templates/'.$this->template.'/css/style.css';
HTMLHelper::_('stylesheet', $templatePath, ['version' => 'auto', 'relative' => true]);

$app = Factory::getApplication();
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx');
$menu = $app->getMenu();
$active = $app->getMenu()->getActive();
$doc = Factory::getDocument();
//$doc->addStyleSheet($this->baseurl.'/media/vendor/fontawesome-free/css/fontawesome.min.css');

?>
<!doctype html>
<html lang="<?php echo $this->language; ?>">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo Uri::base() . 'templates/'.$this->template; ?>/img/apple-touch-icon.png"> 
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo Uri::base() . 'templates/'.$this->template; ?>/img/favicon-32x32.png"> 
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo Uri::base() . 'templates/'.$this->template; ?>/img/favicon-16x16.png"> 
	<link rel="manifest" href="<?php echo Uri::base() . 'templates/'.$this->template; ?>/img/site.webmanifest"> 
	<meta name="msapplication-TileColor" content="#5091cd"> 
	<meta name="theme-color" content="#ffffff">
	<meta property="og:image" content="<?php echo Uri::base() . 'images/jotto-og.jpg'; ?>">
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="1200" />
	<meta property="og:image:alt" content="J!Otto Community Award" />
	<jdoc:include type="head" />
</head>

<body class="<?php echo $active->alias . ' ' . $pageclass . (($menu->getActive() == $menu->getDefault()) ? ' front' : ' page'); ?>">
	<script type = "text/javascript">
	  if ('loading' in HTMLImageElement.prototype) {
		const images = document.querySelectorAll('img[loading="lazy"]');
		images.forEach(img => {
		  img.src = img.dataset.src;
		});
	  } else {
		// Dynamically import the LazySizes library
		const script = document.createElement('script');
		script.src ='<?php echo Uri::base() . 'templates/'.$this->template; ?>/js/lazysizes.min.js';
		script.type='text/javascript';
		document.body.appendChild(script);
	  }
	</script>

	<nav role="navigation">
		<div id="mainMenu">
			<input id="hamburger-menu" name="menu" type="checkbox" />
			<label for="hamburger-menu" class="visuallyhidden">Menü öffnen</label>
			<span></span>
			<span></span>
			<span></span>
			<jdoc:include type="modules" name="menu" />
		</div>
	</nav>

	<?php if ($this->countModules( 'logo' )) : ?>
		<section class="logo">
			<div class="wrap-inside">
				<a href="<?php echo Uri::base(); ?>">
				<jdoc:include type="modules" name="logo" />
				</a>
			</div>
		</section>
	<?php endif; ?>

	<?php if ($this->countModules( 'header' )) : ?>
	<header>
		<jdoc:include type="modules" name="header" />
	</header>
	<?php endif; ?>

	<?php if ($this->countModules( 'top_a' )) : ?>
	<section id="top-a">
		<div class="wrap-inside">
			<jdoc:include type="modules" name="top_a" />
		</div>
	</section>
	<?php endif; ?>

	<main>
		<div class="wrap-inside">
			<?php if ($this->countModules('breadcrumbs')) : ?>
				<jdoc:include type="modules" name="breadcrumbs" />
			<?php endif; ?>

			<?php if ($this->countModules('main_top')) : ?>
				<section id="main-top">
					<jdoc:include type="modules" name="main_top" />
				</section>
			<?php endif; ?>

			<div class="main-content <?php echo ($this->countModules('sidebar')) ? ('with-sidebar') : ('full-width'); ?>">
				<div>
					<article>
						<jdoc:include type="message" />
						<jdoc:include type="component" />
					</article>

					<?php if ($this->countModules('sidebar')) : ?>
					<aside>
						<jdoc:include type="modules" name="sidebar" />
					</aside>
					<?php endif; ?>
				</div>
			</div>

			<?php if ($this->countModules('main_bottom')) : ?>
			<section id="main-bottom">
				<jdoc:include type="modules" name="main_bottom" />
			</section>
			<?php endif; ?>
		</div>
	</main>
	<?php if ($this->countModules( 'bottom_a' )) : ?>
	<section id="bottom-a">
		<div class="wrap-inside">
			<jdoc:include type="modules" name="bottom_a" />
		</div>
	</section>
	<?php endif; ?>

	<?php if ($this->countModules( 'bottom_b' )) : ?>
	<section id="bottom-b">
		<div class="wrap-inside">
			<jdoc:include type="modules" name="bottom_b" style="html5" />
		</div>
	</section>
	<?php endif; ?>

	<?php if ($this->countModules( 'bottom_c' )) : ?>
	<section id="bottom-c">
		<div class="wrap-inside cluster">
			<div>
				<jdoc:include type="modules" name="bottom_c" style="html5" />
			</div>
		</div>
	</section>
	<?php endif; ?>
	<footer>
		<div class="wrap-inside">
			<jdoc:include type="modules" name="footer" style="html5" />
			<p class="footertext">Made with <img src="<?php echo $this->baseurl.'/templates/'.$this->template; ?>/img/herz.png" alt="Herz" class="fa-beat" style="display:inline-block; vertical-align:middle;"> by <a href="https://www.dr-menzel-it.de" target="_blank" rel="noopener noreferrer nofollow">Viviana Menzel</a> - Design <a href="https://www.8ung-media.de/" target="_blank" rel="noopener noreferrer nofollow">Ralf Nöppert</a> / Viviana Menzel - Entwicklung <a href="https://www.chmst.de/" target="_blank" rel="noopener noreferrer nofollow">Christiane Maier-Stadtherr</a> - Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></p>
		</div>
	</footer>
	<button onclick="topFunction()" id="myBtn" title="Nach oben">Nach oben</button> 
	<jdoc:include type="modules" name="debug" />
	<script src="<?php echo $this->baseurl.'/templates/'.$this->template; ?>/js/app.js"></script>
</body>

</html>
