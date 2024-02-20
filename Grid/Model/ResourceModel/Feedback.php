<?php

namespace Tejas\Grid\Model\ResourceModel;

class Feedback extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    
    protected function _construct() {
        $this->_init('tejas_form_data', 'id');
    }
}