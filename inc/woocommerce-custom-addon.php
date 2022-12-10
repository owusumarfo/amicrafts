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
            <div class="form-group">
                <label>Personalize your item?</label>
                <select name="personalize_item_choice" value="' . $personalize_item_choice . '" id="personalize_item_choice">
                    <option value="no">No</option>
                    <option value="yes_4_or_less">Yes, up to 4 characters (₵' . number_format(get_option('personalizeditem_4_or_less_characters_price'), 2, '.', '') . ')</option>
                    <option value="yes_5_or_more">Yes, 5 or more characters (₵' . number_format(get_option('personalizeditem_5_or_more_characters_price'), 2, '.', '') . ')</option>
                </select>
            </div>

            <br>
            
            <div class="form-group" id="personalize_item_characters" style="display:none;">
                <label>Personalized Characters</label>
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

// // Set the new calculated price of the cart item
add_action('woocommerce_before_calculate_totals', 'calculate_personalized_characters_price', 99, 1);
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
// 4. Display personalized characters @ Cart

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
// 5. Save personalized characters into order item meta

add_action('woocommerce_add_order_item_meta', 'ami_product_add_on_order_item_meta', 10, 2);

function ami_product_add_on_order_item_meta($item_id, $values)
{
    if (!empty($values['personalize_item_characters'])) {
        wc_add_order_item_meta($item_id, 'Personalized Characters', $values['personalize_item_characters'], true);
    }
}

// -----------------------------------------
// 6. Display personalized characters into order table

add_filter('woocommerce_order_item_product', 'ami_product_add_on_display_order', 10, 2);

function ami_product_add_on_display_order($cart_item, $order_item)
{
    if (isset($order_item['personalize_item_characters'])) {
        $cart_item['personalize_item_characters'] = $order_item['personalize_item_characters'];
    }
    return $cart_item;
}

// -----------------------------------------
// 7. Display personalized characters into order emails

add_filter('woocommerce_email_order_meta_fields', 'ami_product_add_on_display_emails');

function ami_product_add_on_display_emails($fields)
{
    $fields['personalize_item_characters'] = 'Custom Text Add-On';
    return $fields;
}





//222222222222222222222222 -----------------------------------------------------------------
// Add custom fields in "product data" settings metabox ("Advanced" tab)
// add_action('woocommerce_product_options_advanced', 'add_text_field_product_dashboard');
// function add_text_field_product_dashboard()
// {

//     global $post;

//     echo '<div class="product_custom_field">';

//     // Checkbox Field
//     woocommerce_wp_checkbox(array(
//         'id'        => '_custom_text_option',
//         'description'      =>  __('set custom custom text field', 'woocommerce'),
//         'label'     => __('Display custom custom text field', 'woocommerce'),
//         'value'     => 'yes',
//         'desc_tip'  => 'true',
//     ));

//     // Minimum Letter Text Box
//     woocommerce_wp_text_input(array(
//         'id'        => '_minimum_custom_text_option',
//         'label'     => __('Minimum Letters', 'woocommerce'),
//         'description' =>  __('set custom minimum Lettering text field', 'woocommerce'),
//         'desc_tip'  => 'true',
//     ));

//     // Maximum Letter Text Box
//     woocommerce_wp_text_input(array(
//         'id'        => '_maximum_custom_text_option',
//         'label'     => __('Maximum Letters', 'woocommerce'),
//         'description' => __('set custom maximum Lettering text field', 'woocommerce'),
//         'desc_tip'  => 'true'
//     ));

//     // Cost Per Letter Pricing
//     woocommerce_wp_text_input(array(
//         'id'        => '_pricing_custom_text_option',
//         'label'     => __('Cost Per Letter (₵)', 'woocommerce'),
//         'description' => __('set custom pricing Lettering text field', 'woocommerce'),
//         'value'     => 20,
//         'desc_tip'  => 'true'
//     ));

//     echo '</div>';
// }

// // Save Inputted Entries, in the Product Dashboard Text Fields.
// add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');
// function woocommerce_product_custom_fields_save($post_id)
// {
//     // Checkbox Field
//     $checkbox = isset($_POST['_custom_text_option']) ? 'yes' : 'no';
//     update_post_meta($post_id, '_custom_text_option', $checkbox);

//     // Save Minimum Letters
//     if (isset($_POST['_minimum_custom_text_option']))
//         update_post_meta($post_id, '_minimum_custom_text_option', sanitize_text_field($_POST['_minimum_custom_text_option']));

//     // Save Maximum Letters
//     if (isset($_POST['_maximum_custom_text_option']))
//         update_post_meta($post_id, '_maximum_custom_text_option', sanitize_text_field($_POST['_maximum_custom_text_option']));

//     // Save Cost Per Letter
//     if (isset($_POST['_pricing_custom_text_option']))
//         update_post_meta($post_id, '_pricing_custom_text_option', sanitize_text_field($_POST['_pricing_custom_text_option']));
// }


// // Output Custom Text Field to Product Page
// add_action('woocommerce_before_add_to_cart_button', 'add_custom_text_field', 0);
// function add_custom_text_field()
// {
//     global $post;

//     // Get the checkbox value
//     $custom_option = get_post_meta($post->ID, '_custom_text_option', true);

//     // If is single product page and have the "custom text option" enabled we display the field
//     if (is_product() && !empty($custom_option)) {
// 
?>
<!-- <div class="form-group mb-5 personalize-text-input">
    <label>
        <?php _e('Custom Letters:', 'woocommerce');
        global $post;
        echo ' (₵' . number_format((float)get_post_meta($post->ID, '_pricing_custom_text_option', true), 2, '.', '') . ' per letter)';

        ?>
    </label>
    <br>
    <input type="text" name="custom_text" minlength="
    <?php global $post;
    echo get_post_meta($post->ID, '_minimum_custom_text_option', true);
    ?>" maxlength="
    <?php global $post;
    echo get_post_meta($post->ID, '_maximum_custom_text_option', true);

    ?>" />
</div> -->
<?php
//     }
// }

// // Set custom text and  calculated price as custom cart data in the cart item
// add_filter('woocommerce_add_cart_item_data', 'save_custom_data_in_cart_object', 30, 3);
// function save_custom_data_in_cart_object($cart_item_data, $product_id, $variation_id)
// {
//     if (!isset($_POST['custom_text']) || empty($_POST['custom_text']))
//         return $cart_item_data;

//     // Get the custom text cost by letter
//     $pricing_custom = (float) get_post_meta($product_id, '_pricing_custom_text_option', true);

//     // Get an instance of the WC_Product object
//     $product = $variation_id > 0 ? wc_get_product($variation_id) : wc_get_product($product_id);
//     $product_price = (float) $product->get_price(); // Get the product price

//     // Get the text
//     $custom_text = sanitize_text_field($_POST['custom_text']);
//     // Get lenght (trimming white spaces)
//     $lenght = (float) strlen(trim($custom_text));

//     // Set the text and the calculated price as custom cart data in the cart item
//     $cart_item_data['custom_data']['price'] = $product_price + ($lenght * $pricing_custom);
//     $cart_item_data['custom_data']['text']  = $custom_text;

//     return $cart_item_data;
// }

// // Display Custom text in cart and checkout pages
// add_filter('woocommerce_get_item_data', 'render_meta_on_cart_and_checkout', 99, 2);
// function render_meta_on_cart_and_checkout($cart_data, $cart_item = null)
// {

//     if (isset($cart_item['custom_data']['text']))
//         $cart_data[] = array("name" => "Your Custom Text", "value" => $cart_item["custom_data"]["text"]);

//     return $cart_data;
// }

// // Set the new calculated price of the cart item
// add_action('woocommerce_before_calculate_totals', 'calculate_custom_text_fee', 99, 1);
// function calculate_custom_text_fee($cart)
// {
//     if (is_admin() && !defined('DOING_AJAX'))
//         return;

//     if (did_action('woocommerce_before_calculate_totals') >= 2)
//         return;

//     foreach ($cart->get_cart() as $cart_item) {
//         if (isset($cart_item['custom_data']['price'])) {
//             // Get the new calculated price
//             $new_price = (float) $cart_item['custom_data']['price'];

//             // Set the new calculated price
//             $cart_item['data']->set_price($new_price);
//         }
//     }
// }

// // Save the custom text as order item data (displaying it in order and notifications)
// add_action('woocommerce_add_order_item_meta', 'custom_text_order_meta_handler', 99, 3);
// function custom_text_order_meta_handler($item_id, $values, $cart_item_key)
// {

//     if (isset($values['custom_data']['text']))
//         wc_add_order_item_meta($item_id, "Custom Text", $values["custom_data"]["text"]);
// }