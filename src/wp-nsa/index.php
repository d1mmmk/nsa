<?php get_header(); ?>
<div class="content container wow fadeIn" data-wow-delay=".3s" data-wow-duration=".5s">
<?php 

$pages = get_pages(array(
	'sort_column' => 'menu_order',
	'child_of' => 2,
));
foreach ( $pages as $page ) {
	$content = $page->post_content;
	if ( ! $content ) // Check for empty page
		continue;
	$content = apply_filters( 'the_content', $content );
	$title = $page->post_title;
	$section_class = get_post_meta($page->ID, 'section_class', true);
	$hide_title = get_post_meta($page->ID, 'hide_title', true);
	$anchor = get_post_meta($page->ID, 'anchor', true);
	?>
	<section class="<?php echo $section_class ? $section_class : '';?> wow fadeIn" id="<?php echo $anchor ? $anchor : '';?>">
		<?php if(!$hide_title):?>
		<h1><?php echo $title;?></h1>
		<?php endif;?>
		<?php echo $content;?>
	</section>
	<?
  }
?>
</div>
<?php get_footer(); ?>