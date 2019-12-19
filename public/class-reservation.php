<?php

class Reservation extends WP_ACF_CPT
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
        if (is_int($id)) {
            $post = get_post($id);

            if ($post instanceof WP_Post) {
                parent::__construct($post);
            } else {
                parent::__construct($id);
            }
        }
    }

    public static function displayAllReservations($args)
    {
        
    }
}
