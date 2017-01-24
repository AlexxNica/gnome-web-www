<?php
/**
 * GNOME Grass Theme Customizer
 *
 * @package GNOME Website
 */

add_action( 'customize_register', 'gnome_grass_options' );

function gnome_grass_options( $wp_customize ) {
    // Friends of GNOME Panel
    $wp_customize->add_panel( 'fog_settings', array(
    'priority'       => 28,
    'capability'     => 'edit_theme_options',
    'title'          => 'Friends of GNOME',
    'description'    => 'Settings for Friends of GNOME pages',
    ));
    // Donation Ruler Section
    $wp_customize->add_section( 'donation_ruler',
        array(
            'title' => 'Donation Ruler',
            'priority' => 94,
            'panel' => 'fog_settings',
        )
    );
    $wp_customize->add_setting( 'show_donation_ruler',
        array(
            'default' => false,
            'sanitize_callback' => 'grass_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
    'show_donation_ruler',
    array(
        'section'   => 'donation_ruler',
        'label'     => 'Check to enable FoG donation ruler',
        'type'      => 'checkbox'
         )
     );
    // Homepage Featured Section
    $wp_customize->add_panel( 'page_home', array(
    'priority'       => 26,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => esc_html( 'Homepage', 'grass' ),
    'description'    => esc_html( 'Edit your home page settings', 'grass' ),
    ));
    $wp_customize->add_section( 'featured_release_screenshot',
        array(
            'title' => esc_html( 'Release Screenshot', 'grass' ),
            'description' => esc_html('Settings for the page.'),
            'priority' => 94,
            'panel' => 'page_home',
        )
    );
    $wp_customize->add_setting( 'release_screenshot',
        array(
            'default' => get_bloginfo('template_directory') . '/images/home/featured_image.png',
            'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'release_screenshot',
        array(
            'label'    => esc_html( 'Release Screenshot', 'grass', 'grass' ),
            'section'  => 'featured_release_screenshot',
            'settings' => 'release_screenshot',
            'description' => esc_html('Upload an image to replace the release screenshot in the homepage.'),
            )
        )
    );
    // Featured Heading
    $wp_customize->add_setting( 'featured_heading',
        array(
            'default' => 'Discover GNOME 3',
            'sanitize_callback' => 'grass_sanitize_text',
        )
    );
    $wp_customize->add_control( 'featured_heading',
        array(
            'label' => esc_html('Featured Heading'),
            'section' => 'featured_release_screenshot',
            'type' => 'text',
        )
    );
    // Featured Heading
    $wp_customize->add_setting( 'featured_subheading',
        array(
            'default' => 'An easy and elegant way to use your computer, GNOME 3 is designed to put you in control and getting things done.',
            'sanitize_callback' => 'grass_sanitize_text',
        )
    );
    $wp_customize->add_control( 'featured_subheading',
        array(
            'label' => esc_html('Featured SubHeading'),
            'section' => 'featured_release_screenshot',
            'type' => 'textarea',
        )
    );
    // Featured Buttons
    $wp_customize->add_section( 'featured_buttons_section', array(
        'title'          => esc_html( 'Featured Buttons', 'grass' ),
        'priority'       => 95,
        'description' => esc_html( 'Edit your home page Intro section content', 'grass' ), 
        'panel' => 'page_home',
    ));
    // Featured Left Button
    $wp_customize->add_setting( 'featured_button_text_1',
        array(
            'default' => 'Learn More',
            'sanitize_callback' => 'grass_sanitize_text',
        )
    );
    $wp_customize->add_control( 'featured_button_text_1',
        array(
            'label' => esc_html('Left Featured Link Text'),
            'section' => 'featured_buttons_section',
            'type' => 'text',
        )
    );
    $wp_customize->add_setting('featured_button_url_1', array( 
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'grass_sanitize_int'
    ));
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_button_url_1', array( 
        'label' => esc_html( 'Left Featured Button URL', 'grass' ), 
        'section' => 'featured_buttons_section', 
        'type' => 'dropdown-pages',
        'settings' => 'featured_button_url_1',
    )));
    // Featured Right Button
    $wp_customize->add_setting( 'featured_button_text_2',
        array(
            'default' => 'Get GNOME 3',
            'sanitize_callback' => 'grass_sanitize_text',
        )
    );
    $wp_customize->add_control( 'featured_button_text_2',
        array(
            'label' => esc_html('Right Featured Link Text'),
            'section' => 'featured_buttons_section',
            'type' => 'text',
        )
    );
    $wp_customize->add_setting('featured_button_url_2', array( 
        'capability' => 'edit_theme_options', 
        'sanitize_callback' => 'grass_sanitize_int' 
    ));
    
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_button_url_2', array( 
        'label' => esc_html( 'Right Featured Button URL', 'grass' ), 
        'section' => 'featured_buttons_section', 
        'type' => 'dropdown-pages',
        'settings' => 'featured_button_url_2',
    )));
    //Featured Sections
    $wp_customize->add_section( 'featured_sections', array(
        'title'          => esc_html( 'Featured Sections', 'grass' ),
        'priority'       => 96,
        'description' => esc_html( 'Edit your home page Intro section content', 'grass' ), 
        'panel' => 'page_home',
    ));
    $wp_customize->add_setting( 'featured_section_button_text_1',
        array(
            'default' => 'Make a donation and become a Friend of GNOME!',
            'sanitize_callback' => 'grass_sanitize_text',
        )
    );
    $wp_customize->add_control( 'featured_section_button_text_1',
        array(
            'label' => esc_html('Left Featured Section Link Text'),
            'section' => 'featured_sections',
            'type' => 'text',
        )
    );
    $wp_customize->add_setting('featured_section_button_url_1', array( 
        'capability' => 'edit_theme_options',
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_section_button_url_1', array( 
        'label' => esc_html( 'Left Featured Section URL', 'grass' ), 
        'section' => 'featured_sections', 
        'type' => 'dropdown-pages',
        'settings' => 'featured_section_button_url_1',
    )));
    $wp_customize->add_setting( 'featured_section_text_1',
        array(
            'default' => 'Your donation will ensure that GNOME continues to be a free and open source desktop by providing resources to developers, software and education for end users, and promotion for GNOME worldwide.',
            'sanitize_callback' => 'grass_sanitize_text',
        )
    );
    $wp_customize->add_control( 'featured_section_text_1',
        array(
            'label' => esc_html('Left Section Text'),
            'section' => 'featured_sections',
            'type' => 'textarea',
        )
    );
    $wp_customize->add_setting( 'featured_section_button_text_2',
        array(
            'default' => 'Get involved!',
            'sanitize_callback' => 'grass_sanitize_text',
        )
    );
    $wp_customize->add_control( 'featured_section_button_text_2',
        array(
            'label' => esc_html('Right Featured Section Link Text'),
            'section' => 'featured_sections',
            'type' => 'text',
        )
    );
    $wp_customize->add_setting('featured_section_button_url_2',
        array( 
            'capability' => 'edit_theme_options', 
        )
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_section_button_url_2', array( 
        'label' => esc_html( 'Right Featured Section URL', 'grass' ), 
        'section' => 'featured_sections', 
        'type' => 'dropdown-pages',
        'settings' => 'featured_section_button_url_2',
    )));
    $wp_customize->add_setting( 'featured_section_text_2',
        array(
            'default' => 'The GNOME Project is a diverse international community which involves hundreds of contributors, many of whom are volunteers. Anyone can contribute to the GNOME!',
            'sanitize_callback' => 'grass_sanitize_text',
        )
    );
    $wp_customize->add_control( 'featured_section_text_2',
        array(
            'label' => esc_html('Left Section Text'),
            'section' => 'featured_sections',
            'type' => 'textarea',
        )
    );
}
?>
