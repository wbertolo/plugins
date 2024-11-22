<?php
/**
 * Template file for Spruce Beer Dashboard
 *
 * @package SpruceBeerDashboard
 */

?>


<div class="sbd bg-slate-300 py-8 px-4 md:p-8">

	
	<?php if ( $beer_info ) : ?>
		
		<?php $beer = $beer_info['response']['beer']; ?>
		<h2 class="text-sm font-bold text-red-700 mb-2"><?php echo esc_html( $beer['beer_name'] ); ?></h2>
		<p class="text-sm text-black mb-2"><?php echo esc_html( $beer['brewery']['brewery_name'] ); ?></p>
		
		<img src="<?php echo esc_attr( $beer['beer_label'] ); ?>" />
		<img src="<?php echo esc_attr( $beer['brewery']['brewery_label'] ); ?>" />
		
		<p>Style: <?php echo esc_html( $beer['beer_style'] ); ?></p>
		<p>Alcohol Content: <?php echo esc_html( $beer['beer_abv'] ); ?></p>
		<p>IBU (Bitterness): <?php echo esc_html( $beer['beer_ibu'] ); ?></p>
		<p>Average Rating: <?php echo esc_html( round( $beer['rating_score'], 2 ) ); ?>/5</p>

		<!-- Images -->
		<div class="images">
			<?php $media_items = $beer['media']['items']; ?>
			
			<?php foreach ( $media_items as $media_item ) : ?>
				<img src="<?php echo esc_attr( $media_item['photo']['photo_img_sm'] ); ?>" />
			<?php endforeach; ?>
		</div>

		
		<!-- Reviews -->
		<div class="reviews">
			<h3>Reviews</h3>
			<?php foreach ( $beer_activity['response']['checkins']['items'] as $review ) : ?>
				<p><?php echo esc_html( $review['user']['first_name'] . '  ' . $review['user']['last_name'] ); ?></p>
				<p><?php echo esc_html( $review['rating_score'] ); ?></p>
				<p><?php echo esc_html( $review['created_at'] ); ?></p>
			<?php endforeach; ?>
		</div>




	<?php else : ?>

		<p>There was an issue while trying to recover information for this beer. Please try again later.</p>
	
	<?php endif; ?>

</div>
