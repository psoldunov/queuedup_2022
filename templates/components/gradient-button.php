<a href="<?php echo $args['link']; ?>" class="gradient-button w-inline-block" <?php if ($args['target']){
    echo 'target="' . $args['target'] . '"';
  }; ?>>
  <div class="gradient-button_border_left"></div>
  <div class="gradient-button_border_top"></div>
  <div class="gradient-button_border_right"></div>
  <div class="gradient-button_border_bottom"></div>
  <div class="gradient-button_background"></div>
  <div class="gradient-button_inner">
    <?php echo $args['text']; ?>
  </div>
</a>