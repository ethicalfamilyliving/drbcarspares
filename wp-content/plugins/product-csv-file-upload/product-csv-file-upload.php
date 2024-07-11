<?php
/*
Plugin Name:  Product CSV File Upload
Description:  Product CSV  file upload and show the products. 
Version:      1.0
Author:       Synergytop Dev.
*/

// Create a new table

add_action("admin_enqueue_scripts", "register_plugin_style");
add_action("admin_menu", "customplugin_menu");

function register_plugin_style(){
    if ($_GET["page"] == "product-csv-file-upload" || $_GET["page"] == "allentries" || $_GET["page"] == "addnewentry") {
        wp_register_style("my-plugin",plugins_url("product-csv-file-upload/assets/css/plugin.css"));
        wp_enqueue_style("my-plugin");

        wp_register_style("bootstrap-min",plugins_url("product-csv-file-upload/assets/css/bootstrap.min.css"));
        wp_enqueue_style("bootstrap-min");

        wp_register_style("dataTables-min",plugins_url("product-csv-file-upload/assets/css/jquery.dataTables.min.css"));
        wp_enqueue_style("dataTables-min");

        wp_enqueue_script("jquery_min_script",plugin_dir_url(__FILE__) . "assets/js/jquery.min.js",array(),"1.0");
        wp_enqueue_script("bootstrap_min_script",plugin_dir_url(__FILE__) . "assets/js/bootstrap.min.js",array(),"1.0");
        wp_enqueue_script("dataTables_script",plugin_dir_url(__FILE__) . "assets/js/jquery.dataTables.min.js",array(),"1.0");
    }
}


function webroom_add_custom_css_file_to_admin( $hook ) {
  wp_enqueue_style('your_custom_css_file',plugins_url( 'product-csv-file-upload/css/plugin.css' ));
}
add_action('admin_enqueue_scripts', 'webroom_add_custom_css_file_to_admin');


// Add menu
function customplugin_menu(){
    add_menu_page(
        "Lettuce Product Option",
        "MAM Uploads",
        "manage_options",
        "product-csv-file-upload",
        "displayList",
        plugins_url("/product-csv-file-upload/img/icon.png"),
        13
    );
    //add_submenu_page("consultant-csv-file-upload","All Entries", "All entries","manage_options", "allentries", "displayList");
    add_submenu_page(
        "addnewentry",
        "Lettuce Entries",
        "Lettuce Entries",
        "manage_options",
        "product-csv-file-upload",
        "addEntry"
    );
     add_submenu_page(
        "product-csv-file-upload", // Parent menu slug
        "Cron Job",
        "Cron Job",
        "manage_options",
        "cron-job",
        "cronJobPageCallback"
    );
}

function cronJobPageCallback() { ?>
    <div class="container">
        <h1>Cron Job Settings</h1>
        <a style="background-color: #ee333c; padding: 10px 15px;color: white;font-size: 20px;text-decoration: none;margin-top: 20px;display: inline-block;" href="https://drbcarspares.co.uk/inventory-system/" target="_blank">Cron Job Start Here</a>
    </div>
    <?php
}


add_action("admin_enqueue_scripts", "ds_admin_theme_style");
add_action("login_enqueue_scripts", "ds_admin_theme_style");
function ds_admin_theme_style(){
    if (!current_user_can("manage_options")) {
        echo "<style>.update-nag, .updated, .error, .is-dismissible, .notice-warning, .e-notice__content { display: none !important; }</style>";
        echo "<style>.notice.e-notice.e-notice--warning.e-notice--dismissible{display:none !important;}</style>";
    }
}

function displayList(){
    include "displaylist.php";
}

function addEntry(){
    include "addentry.php";
}

add_action("wp_ajax_submit_log", "submitLog");
add_action("wp_ajax_nopriv_submit_log", "submitLog");
function submitLog(){
    if (!empty($_POST)) {
        global $wpdb;
        $allData = json_decode(stripslashes($_POST["success_entries"]), true);
        foreach ($allData as $allDataValue) {
            $partNumber = $allDataValue["part_number"];
            $freeStock = $allDataValue["free_stock"];
            $retailPrice = $allDataValue["retail_price"];
            $npp = $allDataValue["npp"];

            $new_price   = (($retailPrice+3)/1.2); // New price
            $sku = $partNumber;
            $_product_id = wc_get_product_id_by_sku( $sku );
            //echo $_product_id; 
            if ( $_product_id > 0 ) {
                update_post_meta( $_product_id, '_price', $new_price ); 
                update_post_meta( $_product_id, '_regular_price', $new_price );        
                if($freeStock == 0){
                    $out_of_stock_staus = 'outofstock';
                    update_post_meta($_product_id, '_stock',  $freeStock);
                    update_post_meta( $_product_id, '_stock_status', wc_clean( $out_of_stock_staus ) );
                }
                else{
                    $instock_staus = 'instock';
                    update_post_meta($_product_id, '_stock', $freeStock);
                    update_post_meta( $_product_id, '_stock_status', wc_clean( $instock_staus ) );
                }
             

            } else {
                printf('Invalid sku "%s"… Can not update price.', $sku);
            }
        }
    } 
    else {
        $msg = 0;
        echo json_encode($msg);
    }
    exit();
}
