<?php
/*
Plugin Name: Zaerl Highlight
Plugin URI: http://www.zaerl.com
Description: Highlight topics/forums
Author: Zaerl
Version: 0.1
Author URI: http://www.zaerl.com
*/

define('ZA_H_VERSION', '0.1');
define('ZA_H_ID', 'za-highlight');
define('ZA_P_NAME', 'zaerl Highlight');

// Specify the id of the topics that you want to highlight
$za_highlight_topics = array();

// Highlight topic class
$za_highlight_topic_class = '';

// Specify the id of the forums that you want to highlight
$za_highlight_forums = array();

// Highlight forum class
$za_highlight_forum_class = 'regge';

function za_topic_class($class, $topic_id)
{
    global $za_highlight_topics, $za_highlight_topic_class;
    $topic = get_topic_id($id);
    
    if(in_array($topic_id, $za_highlight_topics))
    {
        $class[] = $za_highlight_topic_class;
    }
    
    return $class;
}

function za_forum_class($classes, $args)
{
    global $za_highlight_forums, $za_highlight_forum_class;

    if(in_array(get_forum_id(), $za_highlight_forums) &&
        $args['key'] == 'forum' && $args['output'] == 'string')
    {
        $classes .= ' ';
        $classes .= $za_highlight_forum_class;
    }

    return $classes;
}

add_filter('topic_class', 'za_topic_class', 100, 2);
add_filter('bb_get_forum_class', 'za_forum_class', 100, 2);
