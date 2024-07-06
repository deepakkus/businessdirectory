<?php

class BusSidebarMenu{
    function init()
    {
        add_action('init', array($this, 'add_sidebar_menus'));
    }

    function add_sidebar_menus(){
        add_action('admin_menu', array($this, 'add_admin_menus'));
        add_action('admin_menu', array($this, 'add_sub_menus'));
        add_action('admin_menu', array($this, 'add_menus'));
    }

    function add_admin_menus(){
        
        add_menu_page(
            esc_html('Business Directory', 'business-admin-menu'),
            esc_html('Business Directory', 'business-admin-menu'),
            'manage_options',
            'business-admin-menu',
            array($this, 'add_menu_page_callback'),
            'dashicons-businessman',
            9
        );
    }
      function add_menus(){
        add_submenu_page('business-admin-menu',
        esc_html( 'Add Directory','directory-list' ),
        esc_html( 'Add Directory','directory-list' ),
        'manage_options',
        'directory_add',
        array($this,'add_menu_page_callback'),
        1
    );
      }


    function add_menu_page_callback(){
        require_once (defined( 'KUS_Business_Directory_PATH' ) == true ) ? KUS_Business_Directory_PATH . 'view/directory_add.php': '';
    }

    function add_sub_menus(){
        add_submenu_page('business-admin-menu',
        esc_html( 'List Directory','directory-list' ),
        esc_html( 'List Directory','directory-list' ),
        'manage_options',
        'directory_list',
        array($this,'sub_menu_page_callback'),
        1
    );
    }
    
    function sub_menu_page_callback(){
        require_once (defined( 'KUS_Business_Directory_PATH' ) == true ) ? KUS_Business_Directory_PATH . 'view/directory_list.php': '';
    }
}

