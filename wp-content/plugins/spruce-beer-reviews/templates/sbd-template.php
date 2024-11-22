<?php
/**
 * Template file for Spruce Beer Dashboard
 *
 * @package SpruceBeerDashboard
 */

?>


<div class="sbd py-8 px-4 md:p-8">

	<?php // if ( $beer_info ) : ?>
		
		<?php // $beer = $beer_info['response']['beer']; ?>
		<h2 class="text-md font-bold text-[#aa2116] mb-2"><?php // echo esc_html( $beer['beer_name'] ); ?>Spruce</h2>
		
		<div class="top flex flex-row justify-between mb-8">
			<div class="beer-info flex flex-row basis-[80%]">
				<div class="mr-3">
					<img class="block" src="<?php // echo esc_attr( $beer['beer_label'] ); ?>https://assets.untappd.com/site/beer_logos/beer-110569_76393_sm.jpeg" />
				</div>
				<div class="beer-data basis-[60%]">
					<p class="text-sm font-bold">Style: <span class="font-medium"><?php // echo esc_html( $beer['beer_style'] ); ?>Hard IPA</span></p>
					<p class="text-sm font-bold">Alcohol Content: <span class="font-medium"><?php // echo esc_html( $beer['beer_abv'] ); ?>5.6</span></p>
					<p class="text-sm font-bold">IBU (Bitterness): <span class="font-medium"><?php // echo esc_html( $beer['beer_ibu'] ); ?>7</span></p>
					<p class="text-sm font-bold">Average Rating: <span class="font-medium"><?php // echo esc_html( round( $beer['rating_score'], 2 ) ); ?>3/5</span></p>
				</div>
			</div>	
			
			<div class="brewery-info basis-[20%]">
				<img src="<?php // echo esc_attr( $beer['brewery']['brewery_label'] ); ?>https://assets.untappd.com/site/brewery_logos/brewery-1473_1ed0b.jpeg" />
				<p class="text-sm text-black mb-2"><?php // echo esc_html( $beer['brewery']['brewery_name'] ); ?>Garrison Brewing</p>
			</div>
		</div>
		


		<!-- Images -->
		 <h3 class="font-md font-bold mb-5 text-[#aa2116]">Images</h3>
		<div class="images grid grid-cols-3 gap-4 mb-10">
			<?php // $media_items = $beer['media']['items']; ?>
			
			<?php // foreach ( $media_items as $media_item ) : ?>
				<?php for( $i = 0; $i < 10; $i++ ) : ?>
				<img class="w-full mx-auto" src="<?php // echo esc_attr( $media_item['photo']['photo_img_sm'] ); ?>https://images.untp.beer/crop?width=200&height=200&stripmeta=true&url=https://untappd.s3.amazonaws.com/photos/2024_09_22/dd0e72251ff1a81bbf1c1dddcd55546a_c_1419743923_raw.jpg" />
				<?php endfor; ?>
			<?php // endforeach; ?>
		</div>

		
		<!-- Reviews -->
		<div class="reviews">
			<h3 class="font-md font-bold mb-5 text-[#aa2116]">Reviews</h3>
			<?php // foreach ( $beer_activity['response']['checkins']['items'] as $review ) : ?>
			<?php for( $i = 0; $i < 10; $i++ ) : ?>
				<div class="review mb-3">
					<div class="review-top flex flex-row justify-between">
						<p class="text-sm font-bold">Name: <span class="font-medium"><?php // echo esc_html( $review['user']['first_name'] . '  ' . $review['user']['last_name'] ); ?>Paul Simon</span></p>
						<p class="text-sm font-bold">Score: <span class="font-medium"><?php // echo esc_html( $review['rating_score'] ); ?>4/5</span></p>
					</div>
					
					<?php 
					// $date = new DateTime($review['created_at'];
					$date = new DateTime( "Mon, 21 Oct 2024 22:09:07 +0000" );
					$formatted_date = $date->format('d M y');
					?>
					<p class="text-sm font-bold">Date: <span class="font-medium"><?php // echo esc_html( $formatted_date ); ?><?php echo esc_html( $formatted_date ); ?></span></p>
				</div>
			<?php endfor; ?>
			<?php // endforeach; ?>
		</div>




	<?php //else : ?>

		<p>There was an issue while trying to recover information for this beer. Please try again later.</p>
	
	<?php //endif; ?>

</div>
