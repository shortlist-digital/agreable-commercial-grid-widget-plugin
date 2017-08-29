<?php

$key = 'widget_commercial_grid';
$choices = self::$config['image_choices'];
$media_widths = self::$config['media_widths'];
$widgetplacement = self::$config['tab_placement'];
$post_types = self::$config['post_types'];

$widget_config = array (
  'key' => $key,
  'name' => 'commercial_grid',
  'label' => 'Commercial Grid',
  'display' => 'block',
  'sub_fields' => array (
    array (
      'key' => $key . '_basic_details_tab',
      'label' => 'Basic Details',
      'type' => 'tab',
      'placement' => $widgetplacement,
    ),
    array (
      'key' => $key . '_title',
      'label' => 'Widget title',
      'name' => 'title',
      'type' => 'text',
      'instructions' => 'Enter a title for the widget and it will display on page.',
    ),
    array (
      'key' => $key . '_sell',
      'label' => 'Widget sell',
      'name' => 'sell',
      'type' => 'text',
      'instructions' => 'Enter a sell for the widget and it will display on page.',
    ),
    array (
      'key' => $key . '_limit',
      'label' => 'Amount of items',
      'name' => 'limit',
      'type' => 'number',
      'default_value' => '6',
    ),
    array (
      'key' => $key . '_lists',
      'label' => 'Lists',
      'name' => 'lists',
      'type' => 'post_object',
      'post_type' => array (
        0 => 'list',
      ),
      'multiple' => 1,
      'return_format' => 'object',
      'ui' => 1,
    ),
    array (
      'key' => $key . '_posts_manual',
      'label' => 'Manually insert content (Posts or Tiles)',
      'name' => 'posts',
      'type' => 'post_object',
      'post_type' => $post_types,
      'allow_null' => 1,
      'multiple' => 1,
      'return_format' => 'object',
      'ui' => 1,
    ),
    array (
      'key' => $key . '_options',
      'label' => 'Options',
      'name' => 'options',
      'type' => 'checkbox',
      'choices' => array (
        'display_sell' => 'Display sell',
        'display_category' => 'Display category',
        'display_view_all' => 'Display "View All" button',
      ),
      'default_value' => array (
        'display_sell' => 'display_sell',
        'display_category' => 'display_category'
      ),
      'layout' => 'vertical',
    ),
     array (
      'key' => $key . '_view_all_label',
      'label' => 'View All label',
      'name' => 'view_all_label',
      'type' => 'text',
      'placeholder' => 'View All',
      'instructions' => 'The label for the View All button',
      'conditional_logic' => array (
        array (
          array (
            'field' => 'widget_grid_options',
            'operator' => '==',
            'value' => 'display_view_all',
          ),
        ),
      ),
    ),
    array (
      'key' => $key . '_view_all_link',
      'label' => 'View All link',
      'name' => 'view_all_link',
      'type' => 'text',
      'placeholder' => '/film',
      'instructions' => 'The link for the View All button',
      'conditional_logic' => array (
        array (
          array (
            'field' => 'widget_grid_options',
            'operator' => '==',
            'value' => 'display_view_all',
          ),
        ),
      ),
    ),
    array (
      'key' => $key . '_crop',
      'label' => 'Select a crop (image shape)',
      'name' => 'crop',
      'type' => 'select',
      'instructions' => 'This will force all the items to have the same crop. Don&rsquo;t forget to manually adjust the crop for each image.',
      'required' => 1,
      'wrapper' => array (
        'width' => '100%',
      ),
      'choices' => $choices,
      'default_value' => 'landscape'
    ),
    array (
      'key' => $key . '_advanced_details_tab',
      'label' => 'Advanced Details',
      'type' => 'tab',
      'placement' => $widgetplacement,
    ),
  ),
);

$widget_config["content-types"] = get_option("options_" . $key . "_available_post_types");
$widget_config["content-sizes"] = array('main', 'main-full-bleed'); // main, main-full-bleed, sidebar
