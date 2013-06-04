Requirements
-------------

- A web server with PHP
- A Flickr.com account
- A Flickr [API Key](http://www.flickr.com/services/apps/create/apply/); presumably the non-commercial one will do.


Configuration and Setup
-----------------------

1. Open config/config.php and fill in your gallery title, username, API key, etc. Close and Save the file.
2. Upload the contents of /satellite/ files to a web server. You can put them in a domain root or a sub-folder like http://yourdomain.com/photos/
3. Set the permissions of the `cache` directory to `777`.


To Do 
-----
- Support Videos (will be HTML5 only)
- More layout options
- Separate CSS into type.css and layout.css