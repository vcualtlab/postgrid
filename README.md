# ALT Lab Post Grid
Version: 1.0
Contributors: luetkemj
Requires at least: 3.0.1
Tested up to: 4.2.2
License: WTFL
License URI: http://www.wtfpl.net/

Shortcode for displaying posts or custom post types in masonry grid.

## Description

Shortcode for displaying posts or custom post types in masonry grid.


| Attribute        		 | Default  | Description   
| ---------------------- | -------- | ------------- 
| $comment           | false    | Output full comment
| $title      		 | true     | Output title
| $date       		 | true     | Output Date
| $link       		 | true     | Wrap title in permalink to post
| $max_number 		 | null     | Set max limit of comments to display
| $dispay_list_title | true     | Display "Comments: " before list
| $cache             | 43200    | Cache in seconds



| Attribute        | Default  | Description   
| ---------------- | -------- | ------------- 
| post_type        | post     | any registered post type
| category_name    |          | comma seperated list of category slugs
| tag              |          |	comma seperated list of tag slugs
| paged            | true     | enable Pagination
| posts_per_page   | 15       | max number of posts per page
| max_column       | 3        | maximum number of columns at fullscreen (responsive)
| thumbnail        | true     | show thumbnail (featured image)
| thumbnail_size   | large    | Any registered thumbnail size (wp defaults: thumbnail, medium, large, full)
| excerpt          | false    | show excerpt
| content          | true     | show content
| title            | false    | show title
| author           | false    | show author
| date             | false    | show date



## Installation 

1. Upload `altlab-postgrid.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `[altlab-postgrid]` in your templates

## Frequently Asked Questions


## Changelog 

v1.0