=== WP Blank Referer ===
Contributors: blackhatzen
Donate link: http://blackhatzen.com/
Tags: seo, cpa, privacy, blank-referer, affiliate-marketing, internet-marketing
Requires at least: 2.8.4
Tested up to: 2.8.6
Stable tag: 1.1.2

Automatically changes all external links on the blog to redirect through various anonymization services, used to hide the source of traffic.

== Description ==

When activated, this plugin will automatically pass all outbound links on a WordPress blog through one of four different services used to hide the referer of traffic.

= Supported Services =

* [Anonym.to](http://anonym.to/)
* [HideRefer.com](http://hiderefer.com/)
* [HideRefer.org](http://hiderefer.org/)
* [Referer.us](http://referer.us/)

= Translations =

* Spanish: [Omi](http://equipajedemano.info/)

== Installation ==

1. Upload the `wp-blank-referer` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Choose your blanking/redirection service from the list under Settings -> WP Blank Referer (Defaults to Anonym.to)

== Frequently Asked Questions ==

= What is a referer? =

[Click here](http://en.wikipedia.org/wiki/Referer) for Wikipedia's description.

= Why would I want to blank the referer? =

Some people do it privacy. Some people do it to keep their 

= Will WP Blank Referer definitely blank the referer? =

Nope. We can't guarantee anything because clicks are forwarded through 3rd-party services. Some browsers are easier to blank than others, so make sure you test each service and choose your favorite.

= Why are you spelling referrer incorrectly? =

We're going by the spelling the official HTTP spec uses, but it really annoys us to.

== Screenshots ==

1. Not much to show.

== Changelog ==

= 1.1.2 =

* Added Spanish translation by [Omi](http://equipajedemano.info/).
* Tested on WordPress 2.8.6

= 1.1.1 =

* Adjusted code for easy internationalization.

= 1.1 =

* Added three new services (HideRefer.com, HideRefer.org, and Referer.us)
* Added a Settings menu item and control panel page.

= 1.0 =

* First version.