# ALT Lab Post Grid

Version: 1.1

Requires at least: 3.0.1

Tested up to: 4.2.2

## Description

Shortcode for displaying posts or custom post types in masonry grid.

## Usage

`[altlab-postgrid]`

`[altlab-postgrid category='something' max_column='2' excerpt='false' author='false' date='false']`
This shortcode would give you a two column layout showing only the posts in category 'something' and it would hide the excerpt, the author, and the date. 

| Attribute         | Default    | Description   
| :---------------- | :--------- | :------------- 
| post_type         | 'post'     | any registered post type
| category          | ''         | comma seperated list of category slugs
| tag               | ''         | comma seperated list of tag slugs
| mix_it_up         | 'false'    | allow sorting by categories and or tags 
| paged             | 'true'     | enable Pagination - reccomend setting to false if using mix_it_up
| posts_per_page    | '15'       | max number of posts per page
| max_column        | '3'        | maximum number of columns (1-6) at fullscreen (responsive)
| thumbnail         | 'true'     | show thumbnail (featured image)
| thumbnail_size    | 'large'    | Any registered thumbnail size (wp defaults: thumbnail, medium, large, full)
| excerpt           | 'true'     | show excerpt
| content           | 'false'    | show content
| title             | 'true'     | show title
| permalink         | 'true'     | wrap title in permalink
| author            | 'true'     | show author
| date              | 'true'     | show date
| use_plugin_styles | 'true'     | include basic styles from plugin
| use_plugin_theme  | 'light'    | light / dark (required use_plugin_styles set to true)



## Installation 

1. Upload `altlab-postgrid.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `[altlab-postgrid]` in your templates

## Frequently Asked Questions


## Changelog 

v1.1

* Added support for [Mix It Up](https://mixitup.kunkalabs.com/)
* Removed Masonry and replaced with css columns 
