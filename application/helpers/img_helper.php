<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('product_image_url')) {
    function product_image_url($image) {
        // Sanitize the filename to remove any leading/trailing quotes or spaces
        $filename = trim($image, "'");

        // Check if the filename is not empty
        if (empty($filename)) {
            return ''; // Return an empty string if the filename is empty
        }

        // Construct the URL
        return 'https://ezpizza.store/assets/img/products/' . $filename;
    }


}
