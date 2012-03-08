=== Plugin Name ===
Contributors: l3rady
Donate link: http://l3rady.com/donate
Tags: plugin, posts, page, content, snippets, content
Requires at least: 3.1
Tested up to: 3.3.1
Stable tag: 0.1.1

Snippets of content that is stored in a custom post type. Content can be included into posts/pages/templates via shortcodes or template tags.

== Description ==


== Changelog ==

= 0.1.1 =
* Changed how post content is retrieved. No longer use get_posts() but now use custom SQL query to only return what is needed.
* Added new argument to API to allow post_content filter to be used or not.

= 0.1 =
* Initial release.