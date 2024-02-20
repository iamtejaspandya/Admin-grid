<?php

namespace Tejas\Grid\Model\ResourceModel\Feedback;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    /**
     * @var string
     */
    protected $_eventPrefix = 'tejas_form_data_collection';
    /**
     * @var string
     */
    protected $_eventObject = 'feedback_collection';

    /**
     * Define resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Tejas\Grid\Model\Feedback', 'Tejas\Grid\Model\ResourceModel\Feedback');

    }
}
