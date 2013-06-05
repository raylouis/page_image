<?php
if (!defined('IN_CMS')) { exit(); }

/**
 * Page Image
 * 
 * The page image plugin lets you associate an image with a page.
 * 
 * @package     Plugins
 * @subpackage  page_image
 * 
 * @author      Nic Wortel <nic.wortel@nth-root.nl>
 * @copyright   Nic Wortel, 2013
 * @version     0.1.0
 */

if (!defined('PAGE_IMAGE')) {
    define('PAGE_IMAGE', PLUGINS_ROOT.'/page_image');
}

Plugin::setInfos(array(
    'id'                    =>    'page_image',
    'title'                 =>    __('Page Image'),
    'description'           =>    __('The page image plugin lets you associate an image with a page.'),
    'type'                  =>    'backend',
    'author'                =>    'Nic Wortel',
    'version'               =>    '0.1.0',
    'website'               =>    'http://www.wolfcms.org/',
    'require_wolf_version'  =>    '0.7.4'
));

AutoLoader::addFolder(PAGE_IMAGE.'/models');

Observer::observe('view_page_edit_tab_links', 'page_image_tab_link');
Observer::observe('view_page_edit_tabs', 'page_image_tab');
Observer::observe('page_add_after_save', 'page_image_tab_save');
Observer::observe('page_edit_after_save', 'page_image_tab_save');
Observer::observe('page_delete', 'page_image_delete_page');

function page_image_delete_page(&$page) {
    PageImage::deleteByPageId($page->id);
}

function page_image_tab_link(&$page) {
    echo '<li class="tab"><a href="#page_image">' . __('Image') . '</a></li>';
}

function page_image_tab(&$page) {
    if ($page_image = PageImage::findByPageId($page->id)) {
        $current = $page_image->attachment_id;
    }
    else {
        $current = false;
    }

    echo new View('../../plugins/page_image/views/tab', array(
        'current' => $current,
        'images' => Attachment::findImages()
    ));
}

function page_image_tab_save(&$page) {
    if ($page_image = PageImage::findByPageId($page->id)) {
        if (isset($_POST['page_image']) && $_POST['page_image']['attachment_id'] != '' && $_POST['page_image']['attachment_id'] != 'NULL') {
            $page_image->attachment_id = $_POST['page_image']['attachment_id'];
            $page_image->save();
        }
        else {
            PageImage::deleteByPageId($page->id);
        }
    }
    else {
        if (isset($_POST['page_image']) && $_POST['page_image']['attachment_id'] != '' && $_POST['page_image']['attachment_id'] != 'NULL') {
            $page_image = new PageImage();
            $page_image->page_id = $page->id;
            $page_image->attachment_id = $_POST['page_image']['attachment_id'];
            $page_image->save();
        }
    }
}