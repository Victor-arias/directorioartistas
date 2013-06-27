<?php
Yii::import('zii.widgets.CPortlet');

class Buscador extends CPortlet
{
 
    protected function renderContent()
    {
        $this->render('buscador');
    }
}