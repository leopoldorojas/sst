<?php

class MyActiveDataProvider extends CActiveDataProvider {
    public function getSort()
    {
        $sort = parent::getSort();
        $sort->defaultOrder = $this->model->getPrimaryKey();
        return $sort;
    }
}

?>