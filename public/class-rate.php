<?php

class Rate extends WP_ACF_CPT
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

    public static function displayRateTable()
    {
        $html = $rowHtml = '';
        $hotels = Hotel::getAllHotels();

        if(is_array($hotels)){
            $roomTypes = Room_Type::getRoomTypes();
            
            foreach($hotels as $id){
                
                $hotel = new Hotel($id);
            
                $rowHtml .= '<tr data-fuzzy-item="' . $hotel->slug . ' ' . $hotel->name . '">
                                <form data-ajax-form>
                                    <input type="hidden" name="action" value="save_hotel_rates"/>
                                    <input type="hidden" id="" name="" value=""/>
                                </form>
                                <td class="tiny" data-rate-row-status>
                                    <i class="fa fa-check fa-fw" style="color:green;"></i>
                                </td>
                                <td class="hotelDetails">' . $hotel->name . '</td>
                                <td class="hotelPhone">' . $hotel->hotel_phone_number . '</td>';

                if(count($roomTypes) > 0){
                    foreach( $roomTypes as $type ){
                        $type = new Room_Type($type);

                        $rowHtml .= '<td class="roomTypePrice" contenteditable data-associated-form-field=""></td>
                                  <td contenteditable class="tiny"></td>';
                    }
                }

                $rowHtml .= '</tr>';

                $html = apply_filters('edit_rate_table_room_type_cells_html', $rowHtml);
            }
        }
        
        echo $html;
    }
}
