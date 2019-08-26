<?php if (has_post_thumbnail($the_post->ID)): ?>
<div class="<?php echo $classes; ?>">
	<p class="wp-media-attachment">
		<?php echo get_the_post_thumbnail($the_post->ID, 'full'); ?>
	</p>
	<?php if (!empty($thumb_meta)) {
		if (!empty($thumb_meta['caption'])) { ?>
			<p class="wp-caption-text"><?php echo $thumb_meta['caption']; ?></p>
		<?php }
		if (!empty($thumb_meta['credit'])) {
			if (!empty($thumb_meta['credit_url'])) { ?>
				<p class="wp-media-credit"><a href="<?php echo $thumb_meta['credit_url']; ?>"><?php echo $thumb_meta['credit'];
				if (!empty($thumb_meta['organization'])) { ?>/<?php echo $thumb_meta['organization']; } ?></a></p>
			<?php } else { ?>
			<p class="wp-media-credit"><?php echo $thumb_meta['credit'];
				if (!empty($thumb_meta['organization'])) { ?>/<?php echo $thumb_meta['organization']; } ?></p>
			<?php }
		}
	} ?>
</div>
<?php endif; ?>