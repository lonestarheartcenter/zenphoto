<?php
if (!defined('WEBPATH')) die();
require_once (ZENFOLDER.'/'.PLUGIN_FOLDER.'/image_album_statistics.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php zp_apply_filter('theme_head'); ?>
	<title><?php printGalleryTitle(); ?> | <?php echo getAlbumTitle();?> | <?php echo getImageTitle();?></title>
	<link rel="stylesheet" href="<?php echo $_zp_themeroot ?>/css/zen.css" type="text/css" />
	<script type="text/javascript">
		// <!-- <![CDATA[
		$(document).ready(function(){
			$(".colorbox").colorbox({inline:true, href:"#imagemetadata"});
		});
		// ]]> -->
	</script>
	<?php printZenpageRSSHeaderLink("News","", "Zenpage news", ""); ?>
</head>
<body class="sidebars">
<?php zp_apply_filter('theme_body_open'); ?>
<div id="navigation"></div>
<div id="wrapper">
	<div id="container">
		<div id="header">
			<div id="logo-floater">
				<div>
					<h1 class="title"><a href="<?php echo getGalleryIndexURL();?>" title="Gallery Index"><?php echo getGalleryTitle();?></a></h1>
				</div>
			</div>
		</div>
		<!-- header -->
    <?php sidebarMenu(); ?>
		<div id="center">
			<div id="squeeze">
				<div class="right-corner">
					<div class="left-corner">
						<!-- begin content -->
						<div class="main section" id="main">
							<h3 id="gallerytitle">
							<a href="<?php echo getGalleryIndexURL();?>" title="Gallery Index"><?php echo getGalleryTitle();?></a>
							<?php printNewsIndexURL(gettext("News"),"  &raquo; ");  printCurrentNewsCategory("  &raquo; ".gettext('Category')." - "); ?><?php printNewsTitle("  &raquo; "); ?>
							</h3>
	<?php
	if(is_NewsArticle()) { // single news article
		?>
		<?php if(getPrevNewsURL()) { ?><div class="singlenews_prev"><?php printPrevNewsLink(); ?></div><?php } ?>
		<?php if(getPrevNewsURL()) { ?><div class="singlenews_next"><?php printNextNewsLink(); ?></div><?php } ?>
		<?php if(getPrevNewsURL() OR getPrevNewsURL()) { ?><br clear:both /><?php } ?>
		<h3><?php printNewsTitle(); ?></h3>

		<div class="newsarticlecredit">
			<span class="newsarticlecredit-left"> <?php
			$count = getCommentCount();
			$cat = getNewsCategories();
			printNewsDate();
			if ($count > 0) {
				echo ' | ';
				printf(gettext("Comments: %d"),  $count);
			}
			if (!empty($cat)) {
				echo ' | ';
			}
			?>
			</span>
			<?php
			if (!empty($cat)) {
				printNewsCategories(", ",gettext("Categories: "),"newscategories");
			}
			?>
		<?php printCodeblock(1); ?>
		<?php printNewsContent(); ?>
		 <?php printCodeblock(2); ?>
		</div>
		<?php
		if (function_exists('printRating')) printRating();
		commonComment();
	} else { 	// news article loop
		commonNewsLoop(true);
	}
	?>							<?php footer(); ?>
							<div style="clear: both;"></div>
						</div>
						<!-- end content -->
						<span class="clear"></span> </div>
				</div>
			</div>
		</div>
		<span class="clear"></span> </div>
	<!-- /container -->
</div>
<?php
printAdminToolbox();
zp_apply_filter('theme_body_close');
?>
</body>
</html>
