![Satellite](screenshot.jpg)

Overview
-------------
Satellite is a minimal, responsive template based on [phpFlickr](http://phpflickr.com). Use it to display your Flickr photos and photo sets on your own website, perhaps at `http://yourdomain.com/photos/`. Satellite uses no lightboxes, Flash code or heavy styling. 


Requirements
-------------
- A web server with PHP 4 or 5.
- A Flickr.com account.
- A Flickr [API Key](http://www.flickr.com/services/apps/create/apply/); presumably the non-commercial one will do.


Features
--------
- Home page shows thumbnails of recent photos (number configurable) in reverse-chronological order.
- Sets page shows "cover" thumbnail of each photo set in reverse-chronological order.
- Thumbnails of videos are clearly labelled with "Video".
- Single item view has a **Wide Format** option: (dark background, no title/captions/metadata). Mode persists via a cookie.
- Keyboard Navigation: use **w** to toggle the wide format, and use the left and right arrow keys for older/newer photos and thumbnail paging.


Limitations
-----------
- Videos are served as the highest available HTML5 .mp4 file; sorry, Firefox.
- No Previous/Next links within a set.


Configuration
-------------

1. Duplicate config/config-template.php and rename the copy to config.php. Open it in a plain text editor and fill in your gallery title, username, API key, etc. Close and save the file.
2. Upload the contents of /satellite/ files to your web server . You can put them in a domain root or a sub-folder like `http://yourdomain.com/photos/`.
3. Set the permissions of the `cache` directory to `777`.

Credits/License
---------------

Much of the PHP in Satellite is based on [this Net Tuts Tutorial](http://net.tutsplus.com/tutorials/php/how-to-create-a-photo-gallery-using-the-flickr-api/) by [Paul Burgess](http://iampaulburgess.co.uk). 

Satellite makes use of the [PHPFlickr](http://phpflickr.com) class by [Dan Coulter](http://dancoulter.com), which is released under the [GNU Lesser General Public License](http://www.gnu.org/copyleft/lgpl.html).

Satellite is released under the [GNU General Public License](http://www.gnu.org/licenses/gpl.html).
Created by [James Muspratt](http:/jamesmuspratt.com).
[Project Home Page](http://github.com/jmuspratt/satellite/).
