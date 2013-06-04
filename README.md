Overview
-------------
Satellite is a straightforward, responsive template for displaying a Flickr stream on your own website, perhaps at `http://yourdomain.com/photos`. Satellite uses no lightboxes, Flash code or heavy styling.

Requirements
-------------

- A web server with PHP
- A Flickr.com account
- A Flickr [API Key](http://www.flickr.com/services/apps/create/apply/); presumably the non-commercial one will do.


Configuration and Setup
-----------------------

1. Duplicate config/config-template.php and rename the copy to config.php. Open it in a plain text editor and fill in your gallery title, username, API key, etc. Close and save the file.
2. Upload the contents of /satellite/ files to a web server. You can put them in a domain root or a sub-folder like http://yourdomain.com/photos/
3. Set the permissions of the `cache` directory to `777`.


To Do 
-----
- Support Videos (will be HTML5 only)
- More layout options
- Separate CSS into type.css and layout.css