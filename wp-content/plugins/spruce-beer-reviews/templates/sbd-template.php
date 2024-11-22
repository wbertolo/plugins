<?php
/**
 * Template file for Spruce Beer Dashboard
 *
 * @package SpruceBeerDashboard
 */

?>


<div class="sbd bg-slate-300 py-8 px-4 md:p-8">

	<h2 class="font-bold text-black mb-5">Posts from This Light</h2>

	<div class="flex flex-row flex-wrap justify-between">
		
		<?php foreach ( $posts as $post_item ) : ?>
			<div class="sbdBox p-7 my-3 bg-white border rounded-md shadow-sm shadow-slate-500 basis-[100%] md:basis-[48%]">

				<!-- var setup for each post -->
				<?php $post_item = $post_item['node']; ?>
				<?php if ( isset( $post_item['featuredImage'] ) ) : ?>
					<!-- <?php $featured_image = $post_item['featuredImage']['node']; ?> -->

					<?php 
					foreach ( $featured_image['mediaDetails']['sizes'] as $size ) {
						if ( $size['name'] === 'medium' ) {
							$medium_image_url = $size['sourceUrl'];
							break;
						}
					}
					?>


				<?php else : ?>
					<?php $featured_image = null; ?>
				<?php endif; ?>
				
				<!-- display -->
				<h3 class="font-bold text-blue-900 mb-3"><?php echo esc_html( $post_item['title'] ); ?></h3>
				<?php if ( isset( $featured_image ) ) : ?>
					<img class="w-full mb-5 max-w-[300px]" src="<?php echo esc_attr( $medium_image_url ); ?>" alt="<?php echo esc_attr( $featured_image['altText'] ); ?>" />
				<?php endif; ?>
				<div class="text-lg text-black">
					<?php echo wp_kses( $post_item['excerpt'], array() ); ?>
				</div>

			</div>
		<?php endforeach; ?>
	</div>

</div>
