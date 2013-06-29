<div class="row">
    <div class="span12">
        <div class="page-header">
            <h1>Listado de propuestas</h1>
        </div>      
    </div>
    <div class="span12">
    <?php
     $this->widget('zii.widgets.grid.CGridView', array(
         'dataProvider'=>$dataProvider,
         'filter'=>$model,
         'columns'=>array(
              array(
                'name' => 'nombre',
                'filter' => '<input type="text" name="Propuestas[nombre]" maxlength="100" placeholder="Filtar por nombre" style="width: 200px"/>',
              ),
              array(
                'name' => 'jurado.nombre_completo',
                'filter' => false, // para que no se muestre el campo de filtrar para el atributo direccion
              ),          
              array(
                  'class' => 'CButtonColumn',
                  'template'=>'{detalle}', // botones a mostrar
                  'buttons'=>array(
                    'detalle' => array( //botón para la acción nueva
                      'label'=>'Ver detalles de la postulación', // titulo del enlace del botón nuevo
                      'imageUrl'=>Yii::app()->request->baseUrl.'/assets/a8dbea7d/gridview/view.png', //ruta icono para el botón
                      'url'=>'Yii::app()->createUrl("/propuestas/detalle?id=$data->perfiles_id" )', //url de la acción nueva
                    ),
                  ),
              ),         
         ),
         'pager'=>array('header'=>'Ir a la página','nextPageLabel'=>'Siguiente »','prevPageLabel'=>'« Anterior'),
         'summaryText'=>'',
         'itemsCssClass'=>'table table-bordered table-hover',
     ));
    ?>
    </div>
</div>
