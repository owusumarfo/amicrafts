<?php

/**
 * @snippet       Add input field to products - WooCommerce
 * @how-to        Get    FREE
 * @author        Justice Markwei
 * @compatible    WooCommerce 3.9
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */

// -----------------------------------------
// 1. Show custom input field above Add to Cart

add_action('woocommerce_before_add_to_cart_button', 'ami_product_add_on', 9);

function ami_product_add_on()
{
    if (get_option('wcpersonalizeditem_checkbox') === 'yes') {

        $personalize_item_choice = isset($_POST['personalize_item_choice']) ? sanitize_text_field($_POST['personalize_item_choice']) : '';
        $personalize_item_characters = isset($_POST['personalize_item_characters']) ? sanitize_text_field($_POST['personalize_item_characters']) : '';
        echo '
            <table class="variations" cellspacing="0" role="presentation">
                <tbody>
                    <tr>
                        <th class="label">
                            <label for="personalize_item_choice">Personalize your item?</label>
                        </th>
                        <td class="value">
                            <select name="personalize_item_choice" value="' . $personalize_item_choice . '" id="personalize_item_choice">
                                <option value="no">No</option>
                                <option value="yes_4_or_less">Yes, up to 4 characters (₵' . number_format(get_option('personalizeditem_4_or_less_characters_price'), 2, '.', '') . ')</option>
                                <option value="yes_5_or_more">Yes, 5 or more characters (₵' . number_format(get_option('personalizeditem_5_or_more_characters_price'), 2, '.', '') . ')</option>
                            </select>
                        </td>
                    </tr>
                    
                </tbody>
            </table>

            <br>

            <div class="form-group" id="personalize_item_characters" style="display:none;">
                <label id="characters_input_label">Enter Characters</label>
                <input name="personalize_item_characters" value="' . $personalize_item_characters . '">
            </div>
        ';
    }
}

// -----------------------------------------
// 2. Throw error if custom input field empty

add_filter('woocommerce_add_to_cart_validation', 'ami_product_add_on_validation', 10, 3);

function ami_product_add_on_validation($passed, $product_id, $qty)
{
    if ((isset($_POST['personalize_item_choice']) && $_POST['personalize_item_choice'] != 'no') && (isset($_POST['personalize_item_characters']) && sanitize_text_field($_POST['personalize_item_characters']) == '')) {
        wc_add_notice('Personalized Characters is a required field', 'error');
        $passed = false;
    }
    return $passed;
}

// -----------------------------------------
// 3. Save personalized characters into cart item data

add_filter('woocommerce_add_cart_item_data', 'ami_product_add_on_cart_item_data', 10, 2);

function ami_product_add_on_cart_item_data($cart_item, $product_id)
{
    if ((isset($_POST['personalize_item_choice']) && $_POST['personalize_item_choice'] != 'no') && isset($_POST['personalize_item_characters'])) {
        $cart_item['personalize_item_characters'] = sanitize_text_field($_POST['personalize_item_characters']);
        // $cart_item['data']->set_price($cart_item['data']->get_price() + 1);
    }
    return $cart_item;
}


// -----------------------------------------
// 4. Set the new calculated price of the cart item
add_action('woocommerce_before_calculate_totals', 'calculate_personalized_characters_price', 10, 2);
function calculate_personalized_characters_price($cart)
{
    if (is_admin() && !defined('DOING_AJAX'))
        return;

    if (did_action('woocommerce_before_calculate_totals') >= 2)
        return;

    foreach ($cart->get_cart() as $cart_item) {

        if (isset($cart_item['personalize_item_characters'])) {

            $characters_count = strlen($cart_item['personalize_item_characters']);
            $item_price = (float)$cart_item['data']->get_price();

            $personalization_price = 0;
            if ($characters_count > 0 && $characters_count <= 4) {
                $personalization_price = get_option('personalizeditem_4_or_less_characters_price');
            }
            if ($characters_count >= 5) {
                $personalization_price = get_option('personalizeditem_5_or_more_characters_price');
            }

            $new_price = (float)$personalization_price + $item_price;
            $cart_item['data']->set_price($new_price);
        }
    }
}


// -----------------------------------------
// 5. Display personalized characters @ Cart

add_filter('woocommerce_get_item_data', 'ami_product_add_on_display_cart', 10, 2);

function ami_product_add_on_display_cart($data, $cart_item)
{
    if (isset($cart_item['personalize_item_characters'])) {
        $data[] = array(
            'name' => 'Personalized Characters',
            'value' => sanitize_text_field($cart_item['personalize_item_characters'])
        );
    }
    return $data;
}

// -----------------------------------------
// 6. Save personalized characters into order item meta

add_action('woocommerce_add_order_item_meta', 'ami_product_add_on_order_item_meta', 10, 2);

function ami_product_add_on_order_item_meta($item_id, $values)
{
    if (!empty($values['personalize_item_characters'])) {
        wc_add_order_item_meta($item_id, 'Personalized Characters', $values['personalize_item_characters'], true);
    }
}

// -----------------------------------------
// 7. Display personalized characters into order table

add_filter('woocommerce_order_item_product', 'ami_product_add_on_display_order', 10, 2);

function ami_product_add_on_display_order($cart_item, $order_item)
{
    if (isset($order_item['personalize_item_characters'])) {
        $cart_item['personalize_item_characters'] = $order_item['personalize_item_characters'];
    }
    return $cart_item;
}

// -----------------------------------------
// 8. Display personalized characters into order emails

add_filter('woocommerce_email_order_meta_fields', 'ami_product_add_on_display_emails');

function ami_product_add_on_display_emails($fields)
{
    $fields['personalize_item_characters'] = 'Personalized Characters';
    return $fields;
}