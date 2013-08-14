# Microdata Manager

Microdata Manager is a plugin created for the Genesis Framework. The plugin allows a user to override the default Microdata settings in a Page, Post or Custom Post Type via a convenient Microdata Settings panel. Non-coders rejoice!

## Description

Microdata is a feature of HTML5 that provides a simple way to embed semantic markup into HTML documents. "Search engines, web crawlers, and browsers can extract and process Microdata from a web page and use it **to provide a richer browsing experience** for users" - Wikipedia.

Microdata uses a supporting vocabulary. The Genesis Framework 2.0 uses the vocabulary posted at Schema.org.

[Schema.org](http://schema.org) provides a collection of schemas, i.e., html tags, that webmasters can use to markup their pages in ways recognized by major search providers. Search engines including Bing, Google, Yahoo! and Yandex rely on this markup to **improve the display of search results**, making it easier for people to find the right web pages.

The Genesis Framework uses Schema "types" that are broad and suitable for the majority of websites. However a person may want to use a type that is more specific or narrow in focus. This plugin is for you.

To better understand why you may want to change the Schema, read the following article by one of the leading WordPress SEO experts, Joost de Valk: [Schema.org & Genesis 2.0](http://yoast.com/schema-org-genesis-2-0/).

Also see the [Schema Type Hierarchy](http://schema.org/docs/full.html).

## Genesis Default Microdata Settings

### Main Content

Itemtype (used on post only): http://schema.org/Blog  
`<main class="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">`

### Entry

Itemtype (used on page and post): http://schema.org/CreativeWork  
`<article class="entry" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">`

### Entry

Itemprop (used on post only): blogPost  
`<article class="entry" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">`

### Entry Title
Itemprop (used on page and post): headline  
`<h1 class="entry-title" itemprop="headline">`

### Entry Content
Itemprop (used on page and post): text  
`<div class="entry-content" itemprop="text">`

## Requirements

* Genesis Framework 2.0.0 or later
* WordPress 3.6 (which Genesis 2.0.0 requires anyway)

## Installation

### Upload

1. Download the latest tagged archive (choose the "zip" option).
2. Go to the __Plugins -> Add New__ screen and click the __Upload__ tab.
3. Upload the zipped archive directly.
4. Go to the Plugins screen and click __Activate__.

### Manual

1. Download the latest tagged archive (choose the "zip" option).
2. Unzip the archive.
3. Copy the folder to your `/wp-content/plugins/` directory.
4. Go to the Plugins screen and click __Activate__.

Check out the Codex for more information about [installing plugins manually](http://codex.wordpress.org/Managing_Plugins#Manual_Plugin_Installation).

### Git

Using git, browse to your `/wp-content/plugins/` directory and clone this repository:

`git clone git@github.com:bradpotter/microdata-manager.git`

Then go to your Plugins screen and click __Activate__.

## Usage

A new meta box titled "Microdata Settings" will be added to the Edit Page or Edit Post screen. Enter something to override the default settings displayed within the fields. URLs should be fully qualified.

## Future Development

Introduce a settings page in the Genesis admin menu with the capability of overriding global Microdata settings.

## Credits

Many of the plugin's functions are based on code from within the Genesis Framework itself. The core developers and contributors to Genesis have spent countless hours creating and perfecting a theme framework that is second to none. I am grateful for their hard work and dedication. 

This plugin started as a wishful thought on my part and a challenge from [Gary Jones](http://gamajo.com):

> "Don't hope - go build!"

Copyright © 2013 [Brad Potter](http://bradpotter.com). All rights reserved.
