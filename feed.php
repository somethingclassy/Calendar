<?php
/*
* See: http://wordpress.stackexchange.com/questions/1447/
*
*/

include "../wordpress/wp-load.php";
global $wpdb;
header('Content-Type:application/json');
$events = array();
$result = new WP_Query('post_type=post&posts_per_page=-1');
foreach($result->posts as $post) {
  $events[] = array(
  	'id'   => $post->ID,
    'title'   => $post->post_title,
    'url'   => get_the_permalink(),
    'class' => 'success',
    'start'   => get_the_time( 'U', $post->ID ) * 1000,
    'end'   => get_the_time( 'U', $post->ID ) * 1000        
    );	
	
}
echo json_encode(array('success' => 1, 'result' => $events));
exit;

?>