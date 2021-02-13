<?php

use yii\helpers\Html;

?>
<?php echo Html::beginTag('div', $this->context->options); ?>
<!-- Gallery Toolbar -->

<div class="btn-toolbar" style="padding:4px">
  <div class="btn-group" style="display: inline-block;">
    <div class="btn btn-success btn-file" style="display: inline-block">
      <i class="glyphicon glyphicon-plus"></i><?php echo Yii::t('galleryManager/main', 'Add…'); ?>
      <input type="file" name="gallery-image" class="afile" accept="image/*" multiple="multiple"/>
    </div>
  </div>
  <div class="btn-group" style="display: inline-block;">

    <label class="btn btn-default">
      <input type="checkbox" style="margin-right: 4px;" class="select_all"><?php echo Yii::t(
            'galleryManager/main',
            'Select all'
        ); ?>
    </label>
    <div class="btn btn-default disabled edit_selected">
      <i class="glyphicon glyphicon-pencil"></i> <?php echo Yii::t('galleryManager/main', 'Edit'); ?>
    </div>
    <div class="btn btn-default disabled remove_selected">
      <i class="glyphicon glyphicon-remove"></i> <?php echo Yii::t('galleryManager/main', 'Remove'); ?>
    </div>
  </div>
</div>

<hr/>
<!-- Gallery Photos -->
<div class="sorter">
  <div class="images"></div>
  <br style="clear: both;"/>
</div>

<!-- Modal window to edit photo information -->
<div class="editor-modal modal fade" id="file-name-form" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"><?php echo Yii::t('galleryManager/main', 'Edit information') ?></h3>
      </div>
    </div>
    <div class="modal-body">
      <div class="form"></div>
    </div>
    <div class="modal-footer">
      <button class="btn btn-primary save-changes" type="button" data-dismiss="file-name-form" aria-hidden="true">
          <?php echo Yii::t('galleryManager/main', 'Save changes') ?>
      </button>
      <button href="#" class="btn close-upload" type="button" data-dismiss="file-name-form" aria-hidden="true">
          <?php echo Yii::t(
              'galleryManager/main',
              'Close'
          ) ?>
      </button>
    </div>
  </div>
</div>

<div class="overlay">
  <div class="overlay-bg">&nbsp;</div>
  <div class="drop-hint">
    <span class="drop-hint-info"><?php echo Yii::t('galleryManager/main', 'Drop Files Here…') ?></span>
  </div>
</div>
<div class="progress-overlay">
  <div class="overlay-bg">&nbsp;</div>
  <!-- Upload Progress Modal-->
  <div class="modal progress-modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3><?php echo Yii::t('galleryManager/main', 'Uploading images…') ?></h3>
        </div>
        <div class="modal-body">
          <div class="progress ">
            <div class="progress-bar progress-bar-info progress-bar-striped active upload-progress"
                 role="progressbar">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php echo Html::endTag('div'); ?>
