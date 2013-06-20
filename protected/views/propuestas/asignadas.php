<?php foreach($models as $model): ?>
    <?php echo $model->nombre ?><br/>
<?php endforeach; ?>

<div class="pagination">
<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
    'htmlOptions' => array('class'=>''),
    'header'=>'',
    'firstPageCssClass'=>'',
    'firstPageLabel' => '«« Primeros',
    'prevPageLabel' => '« Anterior',
    'previousPageCssClass' => '',
    'selectedPageCssClass' => 'active',
    'nextPageLabel' => 'Siguientes »',
    'nextPageCssClass' => '',
    'lastPageCssClass' => '',
    'lastPageLabel' => 'Últimos »»'
)) ?>
</div>