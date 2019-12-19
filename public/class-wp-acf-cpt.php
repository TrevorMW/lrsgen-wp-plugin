<?php

abstract class WP_ACF_CPT
{

  /**
   * __construct function.
   *
   * @access public
   * @param mixed $id (default: null)
   * @return void
   */
  public function __construct($id = null)
  {
    $post = null;

    if($id instanceOf WP_Post){
      $post = $id;
    } else {
      $post = get_post($id);
    }

    if ($post instanceOf WP_Post) {
      $new_fields = array();      
      $fields = get_field_objects($id);

      if (is_array($fields)) {
        foreach ($fields as $k => $field) {
          if ($k != '' && $k != 'add_hero')
            $new_fields[$k] = $field['key'];
        }

        if (!empty($new_fields)) {
          foreach ($new_fields as $field_id => $key) {
            $this->$field_id = get_field($key, $post->ID);
          }
        }
      }
    }
  }
}
