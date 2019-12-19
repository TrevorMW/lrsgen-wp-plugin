<?php

class Hotel extends WP_ACF_CPT
{
    public $name;
    public $ID;
    public $slug;
    public $description;
    public $image_data;

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
                $this->name        = $post->post_title;
                $this->ID          = $post->ID;
                $this->slug        = $post->post_name;
                $this->description = $post->post_content;
                $this->image_data  = wp_get_attachment_image_src(get_post_thumbnail_id($post), 'small');

                parent::__construct($post);
            } else {
                parent::__construct($id);
            }
        }
    }

    public static function getAllHotels($args = false)
    {     
        $args = apply_filters( 'edit_hotels_query_args', array(
            'post_type'      => 'hotel',
            'posts_per_page' => '-1',
            'fields'         => 'ids'
        ));
        
        $loop = new WP_Query($args);

        return apply_filters('hotel_data_array', $loop->posts);
    }

    public static function displayAllHotels($args)
    {
        $html = '';
        $hotelData = Hotel::getAllHotels($args);

        if (is_array($hotelData)) {
            $html .= apply_filters('hotel_list_wrapper', '<ul>');

            foreach ($hotelData as $hotelID) {
                $hotel = new Hotel($hotelID);

                if ($hotel instanceof Hotel) {
                    $html .= apply_filters('hotel_html_content', 
                                '<li class="hotelCard" id="' . $hotel->slug . '" data-fuzzy-item="' . $hotel->slug . ' ' . $hotel->name . '"><a href="' . get_permalink($hotel->ID). '">
                                    <div class="hotelImage"><img src="' . $hotel->image_data[0] . '" alt="" /></div>
                                    <div class="hotelContent">
                                        <header>
                                            <h2>' . $hotel->name . '</h2>
                                        </header>
                                        <address>
                                            <span class="street">' . $hotel->hotel_street_address . '<br />
                                            <span class="addressExtras">' . $hotel->hotel_city . ', ' . $hotel->hotel_state . ' ' . $hotel->hotel_zip_code . '</span>
                                        </address>
                                        <div class="contactDetails">
                                            <span>Phone Number: <b>' . $hotel->hotel_phone_number . '</b></span>
                                        </div>
                                    </div></a>
                                    <div class="hotelActions">
                                        <nav>
                                            <ul>
                                                <li>
                                                    <a href="/new-reservation?hid=' . $hotel->ID. '" title="Start a new reservation for ' . $hotel->name . '">
                                                        <i class="fa fa-plus fa-fw"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="/rates?hid=' . $hotel->ID. '&fuzzy=' . $hotel->slug . '" title="Rates for ' . $hotel->name . '">
                                                        <i class="fa fa-dollar fa-fw"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://www.google.com/maps/place/' . $hotel->hotel_latitude . ',' . $hotel->hotel_longitude . '" title="Get directions to ' . $hotel->name . '">
                                                        <i class="fa fa-map fa-fw"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="mailto:' . $hotel->hotel_reservations_email_address . '" title="Email concierge @ ' . $hotel->name . '">
                                                        <i class="fa fa-envelope fa-fw"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </li>'
                            );
                }
            }

            $html .= apply_filters('hotel_list_wrapper_end', '</ul>');
        }

        echo $html;
    }
}
