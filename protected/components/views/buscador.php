<div id="buscador">
  <?php $form = $this->beginWidget('CActiveForm', array(
      'action' => CHtml::normalizeUrl(Yii::app()->homeUrl.'busqueda'),
      'enableAjaxValidation'  =>true,
      'enableClientValidation'=>true,
      'id'                    =>'search-form',
      'method'                => 'get',          
  )); ?>
  <div class="row">
      <?php
      $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
          'name'         => 'artista',
          'model'        => new Perfiles, 
          'sourceUrl'    => CHtml::normalizeUrl(Yii::app()->homeUrl.'directorio/autocompletar'), 
          'options'      =>array(// additional javascript options for the autocomplete plugin
              'minLength'=> '2',
          ),
          'htmlOptions'  =>array(
              //'style'=>'height:20px;',
          ),
      ));
      Yii::app()->clientScript->registerScript(
        'autocompleteselect', 
        '$( "#artista" ).on( 
          "autocompleteselect", 
          function( event, ui ) {
            //console.log(ui.item);
            window.location = ' . Yii::app()->homeUrl . ' + ui.item.slug;
            //$( "#search-form" ).submit();
          } 
        );', 
        CClientScript::POS_END
      );
      
      ?>
  </div>
  <div class="row">
    <?php echo CHtml::submitButton('Buscar', array("class"=>"btn")) ?>
  </div>

  <?php $this->endWidget(); ?>
</div>