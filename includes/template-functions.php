<?php
  function get_component($compName, $args) {
    get_template_part('templates/components/'.$compName, null, $args);
  }

  function get_icon($iconName, $size) {
    get_template_part('templates/icons/'.$iconName, null, [
      'size' => $size,
    ]);
  }
?>