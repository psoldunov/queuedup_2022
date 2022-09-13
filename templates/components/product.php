<div class="experience_product-instance">
  <div class="experience_product_thumb-wrap">
    <div class="experience_product_thumb_border is-border-1"></div>
    <div class="experience_product_thumb_border is-border-2"></div>
    <div class="experience_product_thumb_inner">
      <img src="<?php echo get_template_directory_uri(); ?>/images/<?php echo $args['image']; ?>" loading="lazy"
        alt="Photo of <?php echo $args['name']; ?>" class="experience_product_thumb_image" />
    </div>
  </div>
  <div class="experience_product_info-block">
    <div class="experience_product_info_top-row">
      <h3 class="experience_product_name">
        <?php echo $args['name']; ?>
      </h3>
      <div class="text-size-regular">
        <?php echo $args['description']; ?>
      </div>
    </div>
    <div class="product_button-grid">
      <a href="<?php echo $args['learn_link']; ?>" target="_blank" class="button is-small is-product w-button">Learn
        More</a>
      <a href="<?php echo $args['buy_link']; ?>" target="_blank" class="button is-small is-product w-button">Buy Now</a>
    </div>
  </div>
</div>