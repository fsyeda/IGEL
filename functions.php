<?php
/*
* custom IGEL functions
*/
require_once (get_stylesheet_directory() . '/inc/custom/custom-events.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-country-events.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-webinars.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-trainings.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-resources.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-testimonials.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-industries.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-distributors.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-regions.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-socialproof.php');
require_once (get_stylesheet_directory() . '/inc/custom/taxonomy-topic.php');
require_once (get_stylesheet_directory() . '/inc/custom/taxonomy-product.php');
require_once (get_stylesheet_directory() . '/inc/custom/taxonomy-industry.php');
require_once (get_stylesheet_directory() . '/inc/custom/taxonomy-content_type.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-news-igel.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-press-igel.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-team.php');
require_once (get_stylesheet_directory() . '/inc/custom/taxonomy-partner-category.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-partners.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-featured-partners.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-faq.php');
require_once (get_stylesheet_directory() . '/inc/custom/custom-linux-product.php');
require_once (get_stylesheet_directory() . '/inc/custom/taxonomy-linux-status.php');
require_once (get_stylesheet_directory() . '/inc/custom/taxonomy-linux-category.php');
require_once (get_stylesheet_directory() . '/inc/ajax.php');
require_once (get_stylesheet_directory() . '/inc/ajax-linux.php');
require_once (get_stylesheet_directory() . '/inc/ajax-partners.php');
//require_once (get_stylesheet_directory() . '/inc/livechat-custom/livechat-customgroup.php');
require_once (get_stylesheet_directory() . '/inc/init_download_csv.php');
require_once (get_stylesheet_directory() . '/forms/aip-application/aip_registration.php');
require_once (get_stylesheet_directory() . '/forms/aip-recruitment/aip_recruitment.php');
require_once (get_stylesheet_directory() . '/forms/try-buyhardware/try-buyhardware.php');
require_once (get_stylesheet_directory() . '/forms/deal-registration/deal-registration.php');
require_once (get_stylesheet_directory() . '/forms/ums-training/ums_training.php');
require_once (get_stylesheet_directory() . '/forms/unsubscribe/unsubscribe.php');
require_once (get_stylesheet_directory() . '/forms/subscribe/newsletter_subscribe.php');
require_once (get_stylesheet_directory() . '/forms/subscribe/newsletter_subscribe_blog.php');
require_once (get_stylesheet_directory() . '/forms/contact-an-engineer/contact-engineer.php');
require_once (get_stylesheet_directory() . '/forms/contactus/contactus.php');
require_once (get_stylesheet_directory() . '/forms/homepage_wpdownload.php');

add_image_size( 'img-resources', 520, 300, array('center','center') );
add_image_size( 'img-demo-icon', 200, 200, array('center','center') );
function my_acf_google_map_api( $api ){
  $api['key'] = 'AIzaSyAcsfZuqF6TWtZ7XgSxU6AKOGgsLvjekpw';
  return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function enqueue_scripts(){
  wp_register_script( 'stellar', get_stylesheet_directory_uri() . '/inc/js/stellar/src/jquery.stellar.js', array('jquery') , false, true );
  wp_enqueue_script( 'stellar' );

  wp_register_script( 'magnific-popup', get_stylesheet_directory_uri() . '/inc/js/magnific-popup/magnific-popup.js', array('jquery') , false, true );
  wp_enqueue_script( 'magnific-popup' );
  
  wp_register_script( 'tipped', get_stylesheet_directory_uri() . '/inc/js/tipped/tipped.js', array() , false, true );
  wp_enqueue_script( 'tipped' );

  wp_register_script( 'tipped-custom', get_stylesheet_directory_uri() . '/inc/js/tipped/tipped-custom.js', array() , false, true );
  wp_enqueue_script( 'tipped-custom' );

  wp_register_script( 'appear', get_stylesheet_directory_uri() . '/inc/js/jquery.appear.js', array('jquery') , false, true );
  wp_enqueue_script( 'appear' );

  wp_register_script('mixitup', get_stylesheet_directory_uri() . '/inc/js/jquery.mixitup.js', array('jquery') , false, true );
  wp_enqueue_script( 'mixitup');

   wp_register_script( 'count', get_stylesheet_directory_uri() . '/inc/js/jquery.countTo.js', array('jquery') , false, true );
  wp_enqueue_script( 'count' );

  wp_register_script( 'tabcollapse', get_stylesheet_directory_uri() . '/inc/js/bootstrap-tabcollapse.js', array('jquery') , false, true );
  wp_enqueue_script( 'tabcollapse' );

  wp_register_script( 'succinct', get_stylesheet_directory_uri() . '/inc/js/succinct/jQuery.succinct.min.js', array('jquery') , false, true );
  wp_enqueue_script( 'succinct' );

  wp_register_script( 'jquery-ui', get_stylesheet_directory_uri() . '/inc/js/jquery-ui.min.js', array('jquery') , false, true );
  wp_enqueue_script( 'jquery-ui' );
  

  wp_register_script( 'functions', get_stylesheet_directory_uri() . '/inc/js/functions.js', array('jquery', 'appear', 'count') , false, true );
  wp_enqueue_script( 'functions' );

  wp_localize_script( 'functions', 'ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}
add_action( 'wp_enqueue_scripts', 'enqueue_scripts', 99 );

function enqueue_css(){
  /*wp_register_style( 'tipped_css', get_stylesheet_directory_uri() . '/inc/js/tipped/tipped.css', array(), '1.0' );
  wp_enqueue_style( 'tipped_css' );
  wp_register_style( 'tipped_custom_css', get_stylesheet_directory_uri() . '/inc/js/tipped/tipped-custom.css', array(), '1.0' );
  wp_enqueue_style( 'tipped_custom_css' );

  wp_register_style( 'magnific-popup_css', get_stylesheet_directory_uri() . '/inc/js/magnific-popup/magnific-popup.css', array(), '1.0' );
  wp_enqueue_style( 'magnific-popup_css' );*/

  wp_register_style( 'jquery-ui_css', get_stylesheet_directory_uri() . '/inc/js/jquery-ui.structure.min.css', array(), '1.0' );
  wp_enqueue_style( 'jquery-ui_css' );
}
add_action('wp_enqueue_scripts', 'enqueue_css');

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );


function get_customers_case_studies(){
  $casestudies = get_posts(array(
        'post_type'   => 'resources',
        'posts_per_page'  => -1,
        'meta_query'    => array(
          'relation' => 'AND',
          array(
            'key' => 'customers_case_studies',
            'value' => true,
            'compare' => '='
          )
        ),
        'orderby' => 'title',
        'order' => 'ASC'
      ));
  return $casestudies;
}

function get_industries(){
  $casestudies = get_posts(array(
        'post_type'   => 'industries',
        'posts_per_page'  => -1,
        'orderby' => 'title',
        'order' => 'ASC'
      ));
  return $casestudies;
}
function get_partners_list(){
  $partners = get_posts(array(
        'post_type'   => 'partners',
        'posts_per_page'  => -1,
        'orderby' => 'title',
        'order' => 'ASC'
      ));
  return $partners;
}
function get_regions(){
  $casestudies = get_posts(array(
        'post_type'   => 'regions',
        'posts_per_page'  => -1,
        'orderby' => 'title',
        'order' => 'ASC'
      ));
  return $casestudies;
}
function get_distributors_by_region($region_id){
    $distributors = get_posts(array(
        'post_type' => 'distributors',
        'meta_query' => array(
          array(
            'key' => 'region',
            'value' => '"' . $region_id . '"',
            'compare' => 'LIKE'
          )
        ),
        'orderby' => 'title',
        'order' => 'ASC'
    ));

    return $distributors;
}

function get_events($date_today){
  $events = get_posts(array(
            'post_type'   => 'events',
            'posts_per_page'  => -1,
            'meta_query'    => array(
              array(
                'key' => 'date_start',
                'value' => $date_today,
                'compare' => '>='
              )
            ),
            'orderby' => 'meta_value',
            'meta_key' => 'date_start',
            'order' => 'ASC'
          ));
return $events;
}

function get_news($limit){
  global $wpdb;
  $news = get_posts(array(
    'post_type'   => 'news_igel',
    'posts_per_page'  => $limit,
    'orderby' => 'meta_value',
    'meta_key' => 'news_date',
    'order' => 'DESC'
  ));

  return $news;
  
}


function get_trainings(){
   $trainings = get_posts(array(
      'post_type' => 'trainings',
      'posts_per_page'  => -1
    ));

  return $trainings;
}        
function get_events_countries(){
    $countries = get_posts(array(
      'post_type' => 'countries_events',
      'posts_per_page'  => -1,
      'orderby' => 'title',
      'order' => 'ASC'
    ));

  return $countries;
}

function get_partners($category){
  $partners = get_posts(array(
      'post_type' => 'partners',
      'posts_per_page'  => -1,
      'orderby' => 'title',
      'order' => 'ASC',
      'tax_query' => array(
        array(
          'taxonomy' => 'partner_category',
          'field' => 'name',
          'terms' => $category,
          'include_children' => false
        )
      )
    ));

  return $partners;
}

function get_featured_partners(){
   $partners = get_posts(array(
      'post_type' => 'featured_partners',
      'posts_per_page'  => -1,
      'orderby' => 'title',
      'order' => 'ASC'
    ));

  return $partners;
}

function get_webinars($date_today){
  $webinars = get_posts(array(
    'post_type'   => 'webinars',
    'posts_per_page'  => -1,
    'meta_query'    => array(
      array(
        'key' => 'date',
        'value' => $date_today,
        'compare' => '>='
      )
    ),
    'orderby' => 'meta_value',
    'meta_key' => 'date',
    'order' => 'ASC'
  ));
  return $webinars;
}

function get_events_fn(){
  $country = $_POST['country_data'];
  $host = $_POST['host_data'];
  $text = '';
  $today = current_time('Ymd');
  $date_today = $today;
  
  if($country == 'all' && $host == 'all'){

    $query_events = "SELECT wp_posts.* FROM wp_posts  INNER JOIN wp_postmeta ON ( wp_posts.ID = wp_postmeta.post_id )  INNER JOIN wp_postmeta AS mt1 ON ( wp_posts.ID = mt1.post_id ) WHERE 1=1  AND ( wp_postmeta.meta_key = 'date_start' AND ( ( mt1.meta_key = 'date_start' AND mt1.meta_value >= '".$date_today."' ))) AND wp_posts.post_type = 'events' AND (wp_posts.post_status = 'publish') GROUP BY wp_posts.ID ORDER BY mt1.meta_value ASC";

  }else{
    if($country == 'all'){
      //host option
      $query_events ="SELECT wp_posts.* FROM wp_posts INNER JOIN wp_postmeta ON ( wp_posts.ID = wp_postmeta.post_id ) INNER JOIN wp_postmeta AS mt1 ON ( wp_posts.ID = mt1.post_id ) INNER JOIN wp_postmeta AS mt2 ON ( wp_posts.ID = mt2.post_id ) INNER JOIN wp_postmeta AS mt3 ON ( wp_posts.ID = mt3.post_id ) WHERE 1=1 AND ( wp_postmeta.meta_key = 'date_start' AND ( ( mt1.meta_key = 'date_start' AND mt1.meta_value >= '".esc_sql($date_today)."' ) AND ( mt3.meta_key = 'hosted' AND mt3.meta_value LIKE '%".esc_sql($host)."%' ) ) ) AND wp_posts.post_type = 'events' AND (wp_posts.post_status = 'publish' OR wp_posts.post_status = 'future') GROUP BY wp_posts.ID ORDER BY mt1.meta_value ASC";

    }else{
      if($host == 'all'){
        //country option
      $query_events ="SELECT wp_posts.* FROM wp_posts INNER JOIN wp_postmeta ON ( wp_posts.ID = wp_postmeta.post_id ) INNER JOIN wp_postmeta AS mt1 ON ( wp_posts.ID = mt1.post_id ) INNER JOIN wp_postmeta AS mt2 ON ( wp_posts.ID = mt2.post_id ) INNER JOIN wp_postmeta AS mt3 ON ( wp_posts.ID = mt3.post_id ) WHERE 1=1 AND ( wp_postmeta.meta_key = 'date_start' AND ( ( mt1.meta_key = 'date_start' AND mt1.meta_value >= '".esc_sql($date_today)."' ) AND ( mt2.meta_key = 'country' AND mt2.meta_value LIKE '%".esc_sql($country)."%' ) ) ) AND wp_posts.post_type = 'events' AND (wp_posts.post_status = 'publish' OR wp_posts.post_status = 'future') GROUP BY wp_posts.ID ORDER BY mt1.meta_value ASC";

      }else{

      $query_events ="SELECT wp_posts.* FROM wp_posts INNER JOIN wp_postmeta ON ( wp_posts.ID = wp_postmeta.post_id ) INNER JOIN wp_postmeta AS mt1 ON ( wp_posts.ID = mt1.post_id ) INNER JOIN wp_postmeta AS mt2 ON ( wp_posts.ID = mt2.post_id ) INNER JOIN wp_postmeta AS mt3 ON ( wp_posts.ID = mt3.post_id ) WHERE 1=1 AND ( wp_postmeta.meta_key = 'date_start' AND ( ( mt1.meta_key = 'date_start' AND mt1.meta_value >= '".esc_sql($date_today)."' ) AND ( mt2.meta_key = 'country' AND mt2.meta_value LIKE '%".esc_sql($country)."%' ) AND ( mt3.meta_key = 'hosted' AND mt3.meta_value LIKE '%".esc_sql($host)."%' ) ) ) AND wp_posts.post_type = 'events' AND (wp_posts.post_status = 'publish' OR wp_posts.post_status = 'future') GROUP BY wp_posts.ID ORDER BY mt1.meta_value ASC";

      

      }
    }
  }
  global $wpdb;

  $events = $wpdb->get_results($query_events);
  if($events)
  {
    $text = display_events_table($events);

  }else{
    $text = '<p class="no-events">'.__("There are no events scheduled.", "igel").'</p>';
  }
  
  $responses = array(
    'html_data' => $text
    );
  echo json_encode($responses);
  die;
}
add_action('wp_ajax_get_events', 'get_events_fn');
add_action('wp_ajax_nopriv_get_events','get_events_fn');


function display_events_table($events){
  
     $text ='';
    foreach($events as $event) :

      $title = get_field('event_title', $event->ID);
      $country = get_field('country', $event->ID );
      $country_name = get_the_title($country[0]->ID);

       $text .='<tr class="element-row">';
      //Date 
      $date_start = get_field('date_start', $event->ID);
      $day_not_confirmed = get_field('date_not_confirmed', $event->ID);
      $date_end = get_field('date_end', $event->ID);

      if($date_end == ''){
        if($day_not_confirmed){
          $date_text = date('M, Y', strtotime($date_start));
        }else{
          $date_text = date('M j, Y', strtotime($date_start));
        }
      }else{
        if (date("M Y", strtotime($date_start)) == date("M Y", strtotime($date_end))){
          //same month and year
          $date_text = date('M j-', strtotime($date_start)).''.date('j, Y', strtotime($date_end));
        }else if(date("Y", strtotime($date_start)) == date("Y", strtotime($date_end))){
          //different month, same year
          $date_text = date('M j -', strtotime($date_start)).''.date('M j, Y', strtotime($date_end));
        }else{
          //different month and year
          $date_text = date('M j, Y -', strtotime($date_start)).''.date('M j, Y', strtotime($date_end));
        }
      }
      $text .='<td class="col-xs-12 col-sm-2 column">';
      $text .='<a href="'.get_the_permalink($event->ID).'" title="'.$title.'"><span class="date hidden-xs">'.$date_text.'</span></a>';
      $text .='<div class="visible-xs event-info">';
      $text .='<a href="'.get_the_permalink($event->ID).'" title="'.$title.'"><span class="name">'.$title.'</span>';
      $text .='<div class="col-1">'.$date_text.'<br />'.__('Hosted by ', 'igel').get_field('hosted', $event->ID ).'</div>';
      $text .='<div class="col-2">'.get_field('city', $event->ID ).'<br />'.$country_name.'</div></a>';
      $text .='</div>';
      $text .='</td>';

      $text .='<td class="col-sm-4 hidden-xs column"><a href="'.get_the_permalink($event->ID).'" title="'.$title.'"><span class="name">'.$title.'</span></a></td>';
      $text .='<td class="col-sm-2 hidden-xs column"><a href="'.get_the_permalink($event->ID).'" title="'.$title.'"><span class="element">'.get_field('city', $event->ID ).'</span></a></td>';
      $text .='<td class="col-sm-2 hidden-xs column"><a href="'.get_the_permalink($event->ID).'" title="'.$title.'"><span class="element">'.$country_name.'</span></a></td>';
      $text .='<td class="col-sm-2 hidden-xs column"><a href="'.get_the_permalink($event->ID).'" title="'.$title.'"><span class="element">'.get_field('hosted', $event->ID ).'</span></a></td>';

      $text .='</tr>';

      wp_reset_postdata();
    endforeach;

    return $text;
}

function get_webinars_fn(){
  $language = $_POST['language_data'];
  $text = '';
  $today = current_time('Ymd');
  $date_today = $today;
  
  if($language == 'all'){
    $webinars = get_posts(array(
      'post_type'   => 'webinars',
      'posts_per_page'  => -1,
      'meta_query'    => array(
        array(
          'key' => 'date',
          'value' => $date_today,
          'compare' => '>='
        )
      ),
      'orderby' => 'meta_value',
      'meta_key' => 'date',
      'order' => 'ASC'
    ));

      $query_webinars = "SELECT wp_posts.* FROM wp_posts  INNER JOIN wp_postmeta ON ( wp_posts.ID = wp_postmeta.post_id )  INNER JOIN wp_postmeta AS mt1 ON ( wp_posts.ID = mt1.post_id ) WHERE 1=1  AND ( wp_postmeta.meta_key = 'date' AND ( ( mt1.meta_key = 'date' AND mt1.meta_value >= '".$date_today."' ))) AND wp_posts.post_type = 'webinars' AND (wp_posts.post_status = 'publish') GROUP BY wp_posts.ID ORDER BY mt1.meta_value ASC";


  }else{
      //language option
       $query_events ="SELECT wp_posts.* FROM wp_posts INNER JOIN wp_postmeta ON ( wp_posts.ID = wp_postmeta.post_id ) INNER JOIN wp_postmeta AS mt1 ON ( wp_posts.ID = mt1.post_id ) INNER JOIN wp_postmeta AS mt2 ON ( wp_posts.ID = mt2.post_id ) INNER JOIN wp_postmeta AS mt3 ON ( wp_posts.ID = mt3.post_id ) WHERE 1=1 AND ( wp_postmeta.meta_key = 'date' AND ( ( mt1.meta_key = 'date' AND mt1.meta_value >= '".esc_sql($date_today)."' ) AND ( mt2.meta_key = 'language' AND mt2.meta_value LIKE '%".esc_sql($language)."%' ) ) ) AND wp_posts.post_type = 'webinars' AND (wp_posts.post_status = 'publish' OR wp_posts.post_status = 'future') GROUP BY wp_posts.ID ORDER BY mt1.meta_value ASC";
  }

   global $wpdb;

  $webinars = $wpdb->get_results($query_webinars);
  if($webinars)
  {
    $text = display_webinars_table($webinars);
    
  }else{
    $text = '<p class="no-events">'.__("There are no webinars scheduled.", "igel").'</p>';
  }
  
  $responses = array(
    'html_data' => $text
    );
  echo json_encode($responses);
  die;
}
add_action('wp_ajax_get_webinars', 'get_webinars_fn');
add_action('wp_ajax_nopriv_get_webinars','get_webinars_fn');


function display_webinars_table($webinars){
  
     $text ='';
    foreach($webinars as $webinar) :

      $title = get_field('webinar_title', $webinar->ID);
      $language = get_field('language', $webinar->ID );
      $length = get_field('length', $webinar->ID);
      $watch = get_field('watch', $webinar->ID);

      $text .='<tr class="element-row">';
      //Date 
      $date = get_field('date', $webinar->ID);

      $date_text = date('M j, Y', strtotime($date));
      
      $text .='<td class="col-xs-12 col-sm-2 column">';
      $text .='<a href="'.get_the_permalink($webinar->ID).'" title="'.$title.'"><span class="date hidden-xs">'.$date_text.'</span></a>';
      $text .='<div class="visible-xs webinar-info">';
      $text .='<a href="'.get_the_permalink($webinar->ID).'" title="'.$title.'"><span class="name">'.$title.'</span>';
      $text .='<div class="col-1">'.$date_text.'<br />'.__('Language: ', 'igel').$language.'</div>';
      $text .='<div class="col-2">'.$length.'<br />'.$watch.'</div></a>';
      $text .='</div>';
      $text .='</td>';

      $text .='<td class="col-sm-4 hidden-xs column"><a href="'.get_the_permalink($webinar->ID).'" title="'.$title.'"><span class="name">'.$title.'</span></a></td>';
      $text .='<td class="col-sm-2 hidden-xs column"><a href="'.get_the_permalink($webinar->ID).'" title="'.$title.'"><span class="element">'.$language.'</span></a></td>';
      $text .='<td class="col-sm-2 hidden-xs column"><a href="'.get_the_permalink($webinar->ID).'" title="'.$title.'"><span class="element">'.$length.'</span></a></td>';
      $text .='<td class="col-sm-2 hidden-xs column"><a href="'.get_the_permalink($webinar->ID).'" title="'.$title.'"><span class="element">'.$watch.'</span></a></td>';

      $text .='</tr>';

      wp_reset_postdata();
    endforeach;

    return $text;
}

function get_press($limit){
  $press = get_posts(array(
    'post_type'   => 'press_igel',
    'posts_per_page'  => $limit,
    'orderby' => 'meta_value',
    'meta_key' => 'press_date',
    'order' => 'DESC'
  ));
  return $press;
}

function remove_ids_from_toggle_blocks($attributes, $block, $content, $nav_menu, $args, $theme_id) {
    if (isset($attributes['id'])) {
        unset($attributes['id']);
    }
    return $attributes;
}
add_filter('megamenu_toggle_block_attributes', 'remove_ids_from_toggle_blocks', 10, 6);


function custom_numeric_posts_nav() {

  if( is_singular() )
    return;

  global $wp_query;

  /** Stop execution if there's only 1 page */
  if( $wp_query->max_num_pages <= 1 )
    return;

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /** Add current page to the array */
  if ( $paged >= 1 )
    $links[] = $paged;

  /** Add the pages around the current page to the array */
  if ( $paged >= 3 ) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
  }

  echo '<div class="navigation-pagination"><ul>' . "\n";

  /** Previous Post Link */
  if ( get_previous_posts_link() )
    printf( '<li>%s</li>' . "\n", get_previous_posts_link('<') );

  /** Link to first page, plus ellipses if necessary */
  if ( ! in_array( 1, $links ) ) {
    $class = 1 == $paged ? ' class="active"' : '';

    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

    if ( ! in_array( 2, $links ) )
      echo '<li>…</li>';
  }

  /** Link to current page, plus 2 pages in either direction if necessary */
  sort( $links );
  foreach ( (array) $links as $link ) {
    $class = $paged == $link ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /** Link to last page, plus ellipses if necessary */
  if ( ! in_array( $max, $links ) ) {
    if ( ! in_array( $max - 1, $links ) )
      echo '<li>…</li>' . "\n";

    $class = $paged == $max ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  /** Next Post Link */
  if ( get_next_posts_link() )
    printf( '<li>%s</li>' . "\n", get_next_posts_link('>') );

  echo '</ul></div>' . "\n";

}

// Changing excerpt more
function new_excerpt_more($more) {
   global $post;
   return '… <a href="'. get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
   }
add_filter('excerpt_more', 'new_excerpt_more');

//Updateing Widget Text to include php code


add_filter('widget_text','execute_php',100);
function execute_php($html){
     if(strpos($html,"<"."?php")!==false){
          ob_start();
          eval("?".">".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}

//Home Page Whitepaper Download
add_shortcode('white_paper_form', 'white_paper_download_func');
function white_paper_download_func(){
  global $post;
  ob_start();
  ?>
  <form action="" method="post" class="whitepaper_form">
    <input type="email" value="" name="email_whitepaper" placeholder="Enter Email" required/>
    <?php wp_nonce_field('whitepaper_nonce_action','whitepaper_nonce');?>
    <input type="hidden" name="postID" value="<?php echo $post->ID;?>"/>
    <button class="button white whitepaper_submit" type="submit">DOWNLOAD WHITEPAPER</button>
    <div class="whitepaper_mess"></div>
  </form>
  <script>
  (function($){
    $(document).ready(function(){
      var form = $('.whitepaper_form');
      $.validator.addMethod("whitepaperemail", 
        function(value, element) {
          return /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value);
        }, 
        "Please enter a valid email address"
      );
      form.validate({
        rules: {
          email_whitepaper: {
            required: {
              depends:function(){
                $(this).val($.trim($(this).val()));
                return true;
              }   
            },                  
            whitepaperemail: true
          }
          },
        errorLabelContainer: $(".whitepaper_mess")
      });
      form.bind('submit',function(){
        $('.whitepaper_mess').show().html('');
        if(!form.valid()) return false;
        $('.whitepaper_mess').show().html('');
        var formvalue = form.serialize();
        $.ajax({
          type : "post",
          dataType : "json",
          url : '<?php echo admin_url('admin-ajax.php')?>',
          data : {
            action: "white_paper_download", 
            data : formvalue
          },
          context: this,
          beforeSend: function(){
            $('.whitepaper_submit').attr('disabled','disabled');
            $('.whitepaper_mess').html('Loading...');
          },
          success: function(response) {
            $('.whitepaper_submit').removeAttr('disabled');
            if(response.success){
              form[0].reset();              
              $('.whitepaper_mess').html('<a class="download_whitepapper" href="'+response.data+'" download>Download Successfull!</a>');
              var lik = $('body').find('a.download_whitepapper');
              lik[0].click();
              //window.location.href = response.data;
            }else{
              $('.whitepaper_mess').html(response.data);
            }
          }
        });
        return false;
      });
    });
  })(jQuery)
  </script>
  <?php
  return ob_get_clean();
}