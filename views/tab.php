<div class="page" id="page_image" style="display: block;">
    <div title="<?php echo __('Settings'); ?>" id="div-page_image">
      <table cellspacing="0" cellpadding="0" border="0">
        <tr>
          <td class="label"><label><?php echo __('Image'); ?></label></td>
          <td class="field">
              <select name="page_image[attachment_id]">
                  <option value="NULL"><?php echo __('None'); ?></option>
                  <?php foreach ($images as $image): ?>
                  <option value="<?php echo $image->id; ?>" <?php if ($image->id == $current): ?>selected="selected"<?php endif; ?>><?php echo $image->title; ?></option>
                  <?php endforeach; ?>
              </select>
          </td>
        </tr>
      </tbody></table>
    </div>
</div>