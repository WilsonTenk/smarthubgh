<?php

function smarthub_enqueue_scripts() {
    // Tailwind CSS (CDN as per requirement)
    wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com', array(), null, false);
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap', array(), null);
    
    // Theme Styles
    wp_enqueue_style('main-style', get_stylesheet_uri());

    // Tailwind Config
    wp_add_inline_script('tailwind', "
      tailwind.config = {
        darkMode: 'class',
        theme: {
          extend: {
            fontFamily: {
              sans: ['Plus Jakarta Sans', 'sans-serif'],
              display: ['Plus Jakarta Sans', 'sans-serif'], 
            },
            colors: {
              brand: {
                blue: '#0055FF',
                navy: '#0B1121',
                green: '#00D26A',
                light: '#F8FAFC',
                dark: '#020617'       
              }
            },
            animation: {
              'float-slow': 'float 8s ease-in-out infinite',
              'marquee': 'marquee 40s linear infinite',
            },
            keyframes: {
              float: {
                '0%, 100%': { transform: 'translateY(0)' },
                '50%': { transform: 'translateY(-15px)' },
              },
              marquee: {
                '0%': { transform: 'translateX(0%)' },
                '100%': { transform: 'translateX(-100%)' },
              }
            }
          }
        }
      }
    ");

    // Initialize Dark Mode
    wp_add_inline_script('tailwind', "
      if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }
    ");
}
add_action('wp_enqueue_scripts', 'smarthub_enqueue_scripts');

// Theme Support
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('menus');

// Register Menus
function smarthub_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'smarthub'),
        'footer' => __('Footer Menu', 'smarthub')
    ));
}
add_action('init', 'smarthub_menus');

// Register Projects Custom Post Type
function smarthub_register_projects_cpt() {
    $labels = array(
        'name'               => 'Projects',
        'singular_name'      => 'Project',
        'menu_name'          => 'Projects',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Project',
        'edit_item'          => 'Edit Project',
        'new_item'           => 'New Project',
        'view_item'          => 'View Project',
        'search_items'       => 'Search Projects',
        'not_found'          => 'No projects found',
        'not_found_in_trash' => 'No projects found in Trash'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'rewrite'             => array('slug' => 'projects'),
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'menu_icon'           => 'dashicons-portfolio',
        'show_in_rest'        => true, // Enable Gutenberg editor
    );

    register_post_type('project', $args);
}
add_action('init', 'smarthub_register_projects_cpt');

// Allow SVG Uploads
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
