![Satellite](screenshot.jpg)

Overview
---------
Satellite is a minimal, responsive template that makes use of several open-source PHP and Javascript libraries. Use it to display your Flickr photos and photo sets on your own website, perhaps at `http://yourdomain.com/photos/`. 

Satellite uses no lightboxes, Flash code or heavy styling. Modern web techniques like [Picturefill](https://github.com/scottjehl/picturefill) and [Pjax](https://github.com/defunkt/jquery-pjax) (ajax with pushState) are incorporated to serve appropriately-sized images and smooth transitions.

View a demo at [http://jamesmuspratt.com/satellite/](http://jamesmuspratt.com/satellite/).

Requirements
-------------
- A web server with PHP 4 or 5.
- A Flickr.com account.
- A Flickr [API Key](http://www.flickr.com/services/apps/create/apply/); presumably the non-commercial one will do.


Design Features
--------
- Home page shows thumbnails of recent photos (number configurable) in reverse-chronological order.
- Sets page show "cover" thumbnail of each photo set.
- Thumbnails of videos are clearly labelled with "Video".
- All pages have a **Toggle Viewing Mode** button to switch to a darker background, less text/metadata, and wider images. This mode persists via a cookie.
- Keyboard Navigation: use **v** to toggle the viewing mode, and use the left and right arrow keys for older/newer photos and thumbnail paging. Use **p** to play and pause a video.
- All type is set in [Cutive Mono](http://www.google.com/fonts/specimen/Cutive+Mono) via Google webfonts.
- Customizable background and link colors via `config.php`.

Tech Features
-------------
- [Picturefill](https://github.com/scottjehl/picturefill/) is implemented to load images appropriate to the screen width.
- For browsers that support pushState, [Pjax](https://github.com/defunkt/jquery-pjax) smooths and speeds up prev/next transitions while updating the URL and `<title>` of the content.
- Videos are served via the HTML5 `<video>` element and the largest available .mp4 file (not including the original file). 

Limitations
-----------
- Video: No `ogv` files or Flash fallback. Sorry, Firefox.
- Currently no Previous/Next links within a set or tag.
- Currently Flickr comments are not displayed or able to be added.
- Currently machine tags are excluded from tag listings on the individual photo pages, but not from the full tags list page.

Configuration
-------------
1. Duplicate config/config-template.php and rename the copy to config.php. Open it in a plain text editor and fill in your gallery title, username, API key, etc. Close and save the file.
2. Upload the contents of /satellite/ files to your web server . You can put them in a domain root or a sub-folder like `http://yourdomain.com/photos/`.
3. Set the permissions of the `cache` directory to `777`.

Credits/License
---------------
Much of the PHP in Satellite is based on [this Net Tuts Tutorial](http://net.tutsplus.com/tutorials/php/how-to-create-a-photo-gallery-using-the-flickr-api/) by [Paul Burgess](http://iampaulburgess.co.uk). Satellite makes use of the [PHPFlickr](http://phpflickr.com) class by [Dan Coulter](http://dancoulter.com), which is released under the [GNU Lesser General Public License](http://www.gnu.org/copyleft/lgpl.html). I created the design and implemented it in HTML, CSS, and Javascript/jQuery.

Satellite is released under the [GNU General Public License](http://www.gnu.org/licenses/gpl.html).
Created by [James Muspratt](http:/jamesmuspratt.com).
[Project Home Page](http://github.com/jmuspratt/satellite/).
