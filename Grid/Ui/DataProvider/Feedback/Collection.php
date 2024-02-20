<?php

namespace Tejas\Grid\Ui\DataProvider\Feedback;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{
    /**
     * Override _initSelect to add custom columns
     *
     * @return void
     */
    protected function _initSelect()
    {
        $this->addFilterToMap('id', 'main_table.id');
        $this->addFilterToMap('first_name', 'main_table.first_name');
        parent::_initSelect();
    }
}
