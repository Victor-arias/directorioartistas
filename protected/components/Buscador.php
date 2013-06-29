<?php
Yii::import('zii.widgets.CPortlet');

class Buscador extends CPortlet
{
 	public $home;
    protected function renderContent()
    {
        $this->render('buscador');
    }
}