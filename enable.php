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

$PDO = Record::getConnection();

$sql = "CREATE TABLE IF NOT EXISTS `".TABLE_PREFIX."page_image` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `page_id` INT UNSIGNED NOT NULL ,
  `attachment_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_page_image_attachment1` (`attachment_id` ASC) ,
  CONSTRAINT `fk_page_image_attachment1`
    FOREIGN KEY (`attachment_id`)
    REFERENCES `".TABLE_PREFIX."media_attachment` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB";

$PDO->exec($sql);