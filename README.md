Microdata Manager
=================

Microdata Manager is a plugin created for the Genesis Framework. The plugin allows a user to override the default Microdata settings in a Page, Post or Custom Post Type.

Requirements: WordPress 3.6 and the Genesis Framework 2.0

Future Development: Introduce a settings page in the Genesis admin menu with the capability of overriding global Microdata settings.

Downloading: If you download the plugin zip file and expand. Rename the expanded folder of "microdata-manager-master" to "microdata-manager" and upload to your WordPress plugins folder.


INSTALL<br />

1. Upload the microdata-manager folder via FTP to your wp-content/plugins/ directory.<br />
2. Go to your WordPress menu under Plugins and select Installed Plugins.<br />
3. Activate the Microdata Manager Plugin.<br />
4. A new meta box titled "Microdata Settings" will be added to the Edit Page or Edit Post screen.<br />
5. Enter something to override the default settings displayed within the fields.<br />


DEFAULT GENESIS MICRODATA SETTINGS<br />

Main Content - itemtype (Used on post only)<br />
http://schema.org/Blog<br />

Entry - itemtype (Used on page and post)<br />
http://schema.org/CreativeWork<br />

Entry - itemprop (Used on post only)<br />
blogPost<br />

Entry Title - itemprop (Used on page and post)<br />
headline<br />

Entry Content - itemprop (Used on page and post)<br />
text<br />
