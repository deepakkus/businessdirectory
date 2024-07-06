<?php

class BusDataHandle
{
    function init()
    {
        add_action('init', array($this, 'data_handle'));
    }

    function data_handle()
    {
        $this->save_or_update_data();
        $this->edit_data();
        $this->delete_data();
    }

    function save_or_update_data()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            global $wpdb, $table_prefix;
            $table = $table_prefix . 'business';

            $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
            $title = sanitize_text_field($_POST['title']);
            $email = sanitize_text_field($_POST['email']);
            $phone = sanitize_text_field($_POST['phone']);
            $address = sanitize_text_field($_POST['address']);
            $category = sanitize_text_field($_POST['category']);
            $description = sanitize_text_field($_POST['description']);
            $city = sanitize_text_field($_POST['city']);
            $country = sanitize_text_field($_POST['country']);
            $zip = sanitize_text_field($_POST['zip']);
            $mon = sanitize_text_field($_POST['mon_hours']);
            $tue = sanitize_text_field($_POST['tue_hours']);
            $wed = sanitize_text_field($_POST['wed_hours']);
            $thu = sanitize_text_field($_POST['thu_hours']);
            $fri = sanitize_text_field($_POST['fri_hours']);
            $sat = sanitize_text_field($_POST['sat_hours']);
            $sun = sanitize_text_field($_POST['sun_hours']);
            $status = sanitize_text_field($_POST['status']);
            $seo_url = sanitize_text_field($_POST['seo_url']);

            $file_url = '';

            if (isset($_FILES['logo']) && $_FILES['logo']['error'] == UPLOAD_ERR_OK) {
                require_once(ABSPATH . 'wp-admin/includes/file.php');
                require_once(ABSPATH . 'wp-admin/includes/media.php');
                require_once(ABSPATH . 'wp-admin/includes/image.php');

                $upload = wp_handle_upload($_FILES['logo'], array('test_form' => false));
                if (!isset($upload['error']) && isset($upload['url'])) {
                    $file_url = $upload['url'];
                }
            } elseif ($id > 0) {
                // Fetch existing logo if no new file is uploaded
                $existing_data = $this->edit_data($id);
                if ($existing_data && isset($existing_data['logo'])) {
                    $file_url = $existing_data['logo'];
                }
            }

            $data = [
                'title' => $title,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'category' => $category,
                'description' => $description,
                'banner' => $file_url,
                'zipcode'=>$zip,
                'countryId'=>$country,
                'cityId'=>$city,
                'mon_hours'=>$mon,
                'tue_hours'=>$tue,
                'wed_hours'=>$wed,
                'thu_hours'=>$thu,
                'fri_hours'=>$fri,
                'sat_hours'=>$sat,
                'sun_hours'=>$sun,
                'status'=>$status,
                'seo_url'=>$seo_url
            ];

            if ($id > 0) {
                $wpdb->update($table, $data, array('id' => $id));
            } else {
                $wpdb->insert($table, $data);
            }
            wp_redirect(admin_url('admin.php?page=directory_list'));
            exit;
        }
    }
 
    function edit_data($id = null)
    {
        if ($id === null && isset($_GET['id'])) {
            $id = intval($_GET['id']);
        }
    
        if ($id !== null) {
            global $wpdb, $table_prefix;
            $table = $table_prefix . 'business';
            $data = $wpdb->get_row(
                $wpdb->prepare("SELECT * FROM $table WHERE id=%d", $id),
                ARRAY_A
            );
            return $data;
        }

        return null;
    }

    function delete_data()
    {
        if (isset($_GET['id']) && isset($_GET['action'])) {
            
            $id = intval($_GET['id']);
            global $wpdb, $table_prefix;
            $table = $table_prefix . 'business';
            $wpdb->delete($table, array('id' => $id));

            wp_redirect(admin_url('admin.php?page=directory_list'));
            exit;
        }
    }
}
