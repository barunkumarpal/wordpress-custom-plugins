<?php
function ttp_price_adjustment($cart_object) {
    foreach ($cart_object->cart_contents as $key => $value) {
	if (isset($value['c_price']) && !empty($value['c_price'])) {

            // $value['data']->set_price(floatval($value['c_price']));
            $value['data']->set_price($value['c_price']);

	}
    }
}