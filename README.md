Page Image plugin for Wolf CMS
==============================

The Page Image plugin is a third-party plugin that lets you link images to pages. This can, for instance, be used by layouts to show thumbnails next to blog posts.

Requirements
------------

* The [ActiveRecord helper](https://github.com/NicNLD/wolfcms-ActiveRecord) (which requires PHP 5.3+)
* The [Media plugin](https://github.com/NicNLD/wolfcms-media)
* Wolf CMS 0.7.5 or higher (lower might be possible, but has not been tested)
* MySQL

Installation instructions
-------------------------

1. Download the [ActiveRecord helper](https://github.com/NicNLD/wolfcms-ActiveRecord) and place the file **ActiveRecord.php** inside **wolf/helpers**.
2. Download the [Media plugin](https://github.com/NicNLD/wolfcms-image) and upload it to **wolf/plugins** (make sure the folder is called **media**).
3. Upload the 'page_image' plugin folder to **wolf/plugins** (again, make sure the folder is called **page_image**).
4. In the backend of Wolf CMS, go to **Administration** and enable both the Media plugin and the Page Image plugin by checking their checkboxes.

Usage
-----

1. In the backend of Wolf CMS, go to the Media tab, click the upload button and upload an image file.
2. When you edit or create a page, a fourth tab called 'Image' will appear. Open the tab, select your image from the dropdown list and save the page. The selected image is now linked to the page.
3. Use `<?php echo PageImage::findByPageId($this->id)->attachment->html_img('crop',120,80); ?>` within your layout (or snippet) to produce an `<img>` tag that displays a cropped version of the image that is 120 x 80 pixels.

Contributing
------------

Would you like to help developing this plugin? Or would you like to submit a bug report or feature request? The [GitHub repository](https://github.com/NicNLD/wolfcms-page_image) is the right place for this.

If you would like to contribute by translating the plugin to your language, head over to [Transifex.com](https://www.transifex.com/projects/p/wolfcms-page-image-plugin/).