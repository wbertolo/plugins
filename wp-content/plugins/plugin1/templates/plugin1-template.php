<?php
/**
 * Template file for Plugin 1
 *
 * @package Plugin1
 */

?>


<div class="plugin1">

	<h2>Posts from This Light</h2>

	<div class="flex flex-row flex-wrap justify-between">
		
		<?php foreach ( $posts as $post_item ) : ?>
			<div class="plugin1Box p-7 my-3 border rounded-md shadow-sm shadow-slate-500 basis-[100%] md:basis-[48%]">

				<!-- var setup for each post -->
				<?php $post_item = $post_item['node']; ?>
				<?php if ( isset( $post_item['featuredImage'] ) ) : ?>
					<?php $featured_image = $post_item['featuredImage']['node']; ?>
				<?php else : ?>
					<?php $featured_image = null; ?>
				<?php endif; ?>
				
				<!-- display -->
				<h3 class="font-bold text-blue-900 mb-3"><?php echo esc_html( $post_item['title'] ); ?></h3>
				<?php if ( isset( $featured_image ) ) : ?>
					<img class="w-full mb-5" src="<?php echo esc_attr( $featured_image['sourceUrl'] ); ?>" alt="<?php echo esc_attr( $featured_image['altText'] ); ?>" />
				<?php endif; ?>
				<div class="text-lg">
					<?php echo wp_kses( $post_item['excerpt'], array() ); ?>
				</div>

			</div>
		<?php endforeach; ?>
	</div>

</div>
