<?php

function register_sim_post_type($value='')
{
	//Post type
    $labels = array(
        'name'                  => _x( 'Sims', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Sim', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Sims', 'text_domain' ),
        'name_admin_bar'        => __( 'Sim', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Sims', 'text_domain' ),
        'description'           => __( 'Sim', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => ['title', 'thumbnail'],
        'taxonomies'            => array(),
        'hierarchical'          => true,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-feedback',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'sims', $args );

    // Taxonomy
    // Đầu số (fnumbers)
    $labels = array(
        'name'              => _x( 'Đầu số', 'First numbers', 'textdomain' ),
        'singular_name'     => _x( 'Đầu số', 'First numbers', 'textdomain' ),
        'search_items'      => __( 'Search Fnumbers', 'textdomain' ),
        'all_items'         => __( 'Tất cả đầu số', 'textdomain' ),
        'parent_item'       => __( 'Parent Fnumber', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Fnumber:', 'textdomain' ),
        'edit_item'         => __( 'Edit Fnumber', 'textdomain' ),
        'update_item'       => __( 'Update Fnumber', 'textdomain' ),
        'add_new_item'      => __( 'Add New Fnumber', 'textdomain' ),
        'new_item_name'     => __( 'New Fnumber Name', 'textdomain' ),
        'menu_name'         => __( 'Đầu số', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'fnumbers' ),
    );
    register_taxonomy( 'fnumbers', array( 'sims' ), $args );

    // Loại số
    $labels = array(
        'name'              => _x( 'Loại số', 'First numbers', 'textdomain' ),
        'singular_name'     => _x( 'Loại số', 'First numbers', 'textdomain' ),
        'search_items'      => __( 'Search Type', 'textdomain' ),
        'all_items'         => __( 'Tất cả loại', 'textdomain' ),
        'parent_item'       => __( 'Parent Type', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Type:', 'textdomain' ),
        'edit_item'         => __( 'Edit Type', 'textdomain' ),
        'update_item'       => __( 'Update Type', 'textdomain' ),
        'add_new_item'      => __( 'Add New Type', 'textdomain' ),
        'new_item_name'     => __( 'New Type Name', 'textdomain' ),
        'menu_name'         => __( 'Loại số', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'types' ),
    );
    register_taxonomy( 'types', array( 'sims' ), $args );

    // Loại thuê bao
    $labels = array(
        'name'              => _x( 'Loại thuê bao', 'First numbers', 'textdomain' ),
        'singular_name'     => _x( 'Loại thuê bao', 'First numbers', 'textdomain' ),
        'search_items'      => __( 'Search TypeTB', 'textdomain' ),
        'all_items'         => __( 'Tất cả loại', 'textdomain' ),
        'parent_item'       => __( 'Parent TypeTB', 'textdomain' ),
        'parent_item_colon' => __( 'Parent TypeTB:', 'textdomain' ),
        'edit_item'         => __( 'Edit TypeTB', 'textdomain' ),
        'update_item'       => __( 'Update TypeTB', 'textdomain' ),
        'add_new_item'      => __( 'Add New TypeTB', 'textdomain' ),
        'new_item_name'     => __( 'New TypeTB Name', 'textdomain' ),
        'menu_name'         => __( 'Loại thuê bao', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'tbtypes' ),
    );
    register_taxonomy( 'tbtypes', array( 'sims' ), $args );

    // Ưu đãi
    $labels = array(
        'name'              => _x( 'Ưu đãi', 'First numbers', 'textdomain' ),
        'singular_name'     => _x( 'Ưu đãi', 'First numbers', 'textdomain' ),
        'search_items'      => __( 'Search Promote', 'textdomain' ),
        'all_items'         => __( 'Tất cả ưu đãi', 'textdomain' ),
        'parent_item'       => __( 'Parent Promote', 'textdomain' ),
        'parent_item_colon' => __( 'Parent Promote:', 'textdomain' ),
        'edit_item'         => __( 'Edit Promote', 'textdomain' ),
        'update_item'       => __( 'Update Promote', 'textdomain' ),
        'add_new_item'      => __( 'Add New Promote', 'textdomain' ),
        'new_item_name'     => __( 'New Promote Name', 'textdomain' ),
        'menu_name'         => __( 'Ưu đãi', 'textdomain' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'promotes' ),
    );
    register_taxonomy( 'promotes', array( 'sims' ), $args );

    register_field_group(array (
        'id' => 'acf_sims',
        'title' => 'sims',
        'fields' => array (
            array (
                'key' => 'field_5d75ba4becqwe',
                'label' => 'Số thuê bao',
                'name' => 'number',
                'type' => 'text',
                'instructions' => 'Số thuê bao',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5d75ba4becrew',
                'label' => 'Thể hiện',
                'name' => 'show_on',
                'type' => 'text',
                'instructions' => 'Thể hiện',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5d75ba90ecewq',
                'label' => 'Giá',
                'name' => 'cost',
                'type' => 'number',
                'instructions' => 'Giá / Phí hòa mạng',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => 'VND',
                'min' => '',
                'max' => ''
            ),
            array (
                'key' => 'field_5d75ba4becwww',
                'label' => 'Cước thuê bao',
                'name' => 'cuoc_tb',
                'type' => 'text',
                'instructions' => 'Cước thuê bao',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5d75ba4becweq',
                'label' => 'Cước cam kết',
                'name' => 'cuoc_ck',
                'type' => 'text',
                'instructions' => 'Cước cam kết',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5d75ba4becwqe',
                'label' => 'Thời gian cam kết',
                'name' => 'thoigian_ck',
                'type' => 'text',
                'instructions' => 'Thời gian cam kết',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5d75ba4beceee',
                'label' => 'Địa điểm hòa mạng',
                'name' => 'address',
                'type' => 'text',
                'instructions' => 'Địa điểm hòa mạng',
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'formatting' => 'html',
                'maxlength' => '',
            ),
            array (
                'key' => 'field_5d75ba4beceqw',
                'label' => 'Gói cước khác',
                'name' => 'cuoc_khac',
                'type' => 'radio',
                'choices' => getList('goicuoc'),
                'other_choice' => 0,
                'save_other_choice' => 0,
                'default_value' => 'CK150',
                'layout' => 'vertical',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'sims',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'custom_fields',
                3 => 'discussion',
                4 => 'comments',
                5 => 'revisions',
                6 => 'author',
                7 => 'featured_image',
                8 => 'categories',
                9 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));

}
add_action( 'init', 'register_sim_post_type', 0);