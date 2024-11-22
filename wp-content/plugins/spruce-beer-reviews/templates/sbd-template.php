<?php
/**
 * Template file for Spruce Beer Dashboard
 *
 * @package SpruceBeerDashboard
 */

// echo '<pre>';
// var_dump($result);
// echo '</pre>';

?>


<div class="sbd bg-slate-300 py-8 px-4 md:p-8">

	<h2 class="font-bold text-black mb-5">Posts from This Light</h2>

	<div class="flex flex-col flex-wrap justify-between">
		<?php if ( $result ) : ?>

			<?php $beer = $result[ 'response' ][ 'beer' ]; ?>
			<h2><?php echo esc_html( $beer[ 'beer_name' ] ); ?></h2>
			<p>Brewery: <?php echo esc_html( $beer[ 'brewery' ][ 'brewery_name' ] ); ?></p>
			
			<img src="<?php echo esc_attr( $beer[ 'beer_label' ] ); ?>" />
			<img src="<?php echo esc_attr( $beer[ 'brewery' ][ 'brewery_label' ] ); ?>" />
			
			<p>Style: <?php echo esc_html( $beer[ 'beer_style' ] ); ?></p>
			<p>Alcohol Content: <?php echo esc_html( $beer[ 'beer_abv' ] ); ?></p>
			<p>IBU (Bitterness): <?php echo esc_html( $beer[ 'beer_ibu' ] ); ?></p>
			<p>Average Rating: <?php echo esc_html( round( $beer[ 'rating_score' ], 2 ) ); ?>/5</p>

			<!-- Images -->
			<?php $media_items = $beer[ 'media' ][ 'items' ] ?>
			
			<?php foreach( $media_items as $media_item ) : ?>
				<img src="<?php echo esc_attr( $media_item[ 'photo' ][ 'photo_img_sm' ] ); ?>" />
			<?php endforeach; ?>

			 

			<!-- Reviews -->
			<?php $reviews; ?>




		<?php else : ?>

			<p>There was an issue while trying to recover information for this beer. Please try again later.</p>
		
		<?php endif; ?>


	</div>

</div>
