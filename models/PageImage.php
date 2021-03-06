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

class PageImage extends ActiveRecord
{
    const TABLE_NAME = 'page_image';

    static $belongs_to = array(
        'attachment' => array(
            'class_name' => 'Attachment',
            'foreign_key' => 'attachment_id'
        )
    );
    
    public $id;
    
    public $page_id;
    public $attachment_id;

    public static function deleteByAttachmentId($attachment_id)
    {
        if ($page_image = PageImage::findByAttachmentId($attachment_id)) {
            $page_image->delete();
        }
    }
    
    public static function deleteByPageId($page_id)
    {
        if ($page_image = PageImage::findByPageId($page_id)) {
            $page_image->delete();
        }
    }

    public static function findByAttachmentId($attachment_id)
    {
        return self::find(array(
            'where' => array('attachment_id = ?', $attachment_id),
            'limit' => 1,
            'include' => array('attachment')
        ));
    }

    public static function findByPageId($page_id)
    {
        return self::find(array(
            'where' => array('page_id = ?', $page_id),
            'limit' => 1,
            'include' => array('attachment')
        ));
    }

    public static function findByParentPage($parent_id, $limit = null)
    {
        
    }
    
}