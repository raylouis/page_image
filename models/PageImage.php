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

use_helper('ActiveRecord');

class PageImage extends ActiveRecord {
    
    const TABLE_NAME = 'page_image';
    
    public $id;
    
    public $page_id;
    public $attachment_id;
    
    public static function deleteByPageId($page_id) {
        if ($page_image = PageImage::findByPageId($page_id)) {
            $page_image->delete();
        }
    }

    public static function findByPageId($page_id) {
        return self::find(array(
            'where' => array('page_id = ?', $page_id),
            'limit' => 1
        ));
    }
    
}