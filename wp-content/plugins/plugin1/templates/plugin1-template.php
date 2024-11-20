<?php
/**
 * Template file for Plugin 1
 *
 * @package Plugin1
 */
?>

<div class="plugin1 flex flex-row flex-wrap justify-between">
    <?php foreach ($posts as $post) : ?>
        <div class="plugin1Box p-7 my-3 border rounded-md shadow-sm shadow-slate-500 basis-[100%] md:basis-[48%]">
            
            <!-- var setup for each post -->
            <?php $post = $post['node']; ?>
            
            <!-- display -->
            <h2 class="font-bold text-blue-900 mb-3"><?php echo esc_html( $post['title'] ); ?></h2>
            <?php if ( isset( $featuredImage['sourceUrl'] ) ) : ?>
                <?php $featuredImage = $post['featuredImage']['node']; ?>
                <img class="w-6/12 mb-5" src="<?php echo esc_attr( $featuredImage['sourceUrl'] ); ?>" alt="<?php echo esc_attr( $featuredImage['altText'] ); ?>" />
            <?php endif; ?>
            <div class="text-lg"><?php echo $post['excerpt']; ?></div>

        </div>
    <?php endforeach; ?>
</div>