Microdata Manager
=================

Copyright © 2013 Brad Potter. All rights reserved.<br />
http://bradpotter.com<br /><br />

<strong>DESCRIPTION</strong><br />
Microdata Manager is a plugin created for the Genesis Framework. The plugin allows a user to override the default Microdata settings in a Page, Post or Custom Post Type via a convenient Microdata Settings panel. Non-coders rejoice!<br /><br />

<strong>REQUIREMENTS</strong><br />
WordPress 3.6<br />
Genesis Framework 2.0<br /><br />

<strong>INTRODUCTION</strong><br />
Microdata is a feature of HTML5 that provides a simple way to embed semantic markup into HTML documents. “Search engines, web crawlers, and browsers can extract and process Microdata from a web page and use it <strong>to provide a richer browsing experience</strong> for users” - Wikipedia.<br />

Microdata uses a supporting vocabulary. The Genesis Framework 2.0 uses the vocabulary posted at Schema.org.<br />

Schema.org provides a collection of schemas, i.e., html tags, that webmasters can use to markup their pages in ways recognized by major search providers. Search engines including Bing, Google, Yahoo! and Yandex rely on this markup to <strong>improve the display of search results</strong>, making it easier for people to find the right web pages.
Please visit http://schema.org to learn more about Schema.<br />

The Genesis Framework uses a Schema "type" that is broad and suitable for the majority of websites however a person may want to use a type that is more targeted or narrow in focus. This plugin is for you.<br />

See the Schema Type Hierarchy here: http://schema.org/docs/full.html<br /><br />

<strong>DEFAULT MICRODATA SETTINGS - GENESIS FRAMEWORK</strong><br />
Main Content - itemtype (Used on post only)<br />
http://schema.org/Blog<br />
`<main class="content" role="main" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="http://schema.org/Blog">`<br />

Entry - itemtype (Used on page and post)<br />
http://schema.org/CreativeWork<br />
`<article class="entry" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">`

Entry - itemprop (Used on post only)<br />
blogPost<br />
`<article class="entry" itemscope="itemscope" itemtype="http://schema.org/BlogPosting" itemprop="blogPost">`

Entry Title - itemprop (Used on page and post)<br />
headline<br />
`<h1 class="entry-title" itemprop="headline">`

Entry Content - itemprop (Used on page and post)<br />
text<br />
`<div class="entry-content" itemprop="text">`<br /><br />


<strong>INSTALLATION</strong><br />
Important: If you download the plugin zip file from GitHub and expand, rename the expanded folder of "microdata-manager-master" to "microdata-manager" and upload to your WordPress plugins folder.

1. Upload the microdata-manager folder via FTP to your wp-content/plugins/ directory.<br />
2. Go to your WordPress menu under Plugins and select Installed Plugins.<br />
3. Activate the Microdata Manager plugin.<br />
4. A new meta box titled "Microdata Settings" will be added to the Edit Page or Edit Post screen.<br />
5. Enter something to override the default settings displayed within the fields.<br /><br />

<strong>FUTURE DEVELOPMENT</strong><br />
Introduce a settings page in the Genesis admin menu with the capability of overriding global Microdata settings.
