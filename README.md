# ALT Lab Post Grid

Version: 1.0

Requires at least: 3.0.1

Tested up to: 4.2.2

## Description

Shortcode for displaying posts or custom post types in masonry grid.

## Usage

`[altlab-postgrid]`

| Attribute         | Default    | Description   
| :---------------- | :--------- | :------------- 
| post_type         | 'post'     | any registered post type
| category          | ''         | comma seperated list of category slugs
| tag               | ''         | comma seperated list of tag slugs
| paged             | 'true'     | enable Pagination
| posts_per_page    | '15'       | max number of posts per page
| max_column        | '3'        | maximum number of columns (1-6) at fullscreen (responsive)
| thumbnail         | 'true'     | show thumbnail (featured image)
| thumbnail_size    | 'large'    | Any registered thumbnail size (wp defaults: thumbnail, medium, large, full)
| excerpt           | 'false'    | show excerpt
| content           | 'true'     | show content
| title             | 'false'    | show title
| permalink         | 'false'    | wrap title in permalink
| author            | 'false'    | show author
| date              | 'false'    | show date
| use_plugin_styles | 'true'     | include basic styles from plugin
| use_plugin_theme  | 'light'    | light / dark (required use_plugin_styles set to true)



## Installation 

1. Upload `altlab-postgrid.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `[altlab-postgrid]` in your templates

## Frequently Asked Questions


## Changelog 

v1.0