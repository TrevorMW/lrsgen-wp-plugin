<?php

class Room_Type extends WP_ACF_CPT
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

    public static function getRoomTypes()
    {
        $args = apply_filters( 'edit_room_type_query_args', array(
            'post_type'      => 'room-type',
            'posts_per_page' => '-1',
            'fields'         => 'ids',
            'orderby'        => 'date',
            'order'          => 'ASC'
        ));
        
        $loop = new WP_Query($args);

        return apply_filters('room_type_data_array', $loop->posts);
    }

    public static function getRoomTypeCount()
    {
        $typesCount = count(self::getRoomTypes());
        echo $typesCount * 2;
    }

    public static function displayRoomTypeHeaders()
    {
        $html = '';
        $roomTypes = self::getRoomTypes();
    
        if(is_array($roomTypes)){
            foreach($roomTypes as $id){
                $type = new Room_Type($id);
                $html .= apply_filters('edit_room_type_table_header_html', '<th colspan="2">' . $type->room_type_abbreviation . '</th>');
            }
        }
        
        echo $html;
    }
}
