<?php

namespace Tejas\Grid\Model;

class Feedback extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
   
    const CACHE_TAG = 'form_customer_reviews';
    /**
     * @var string
     */
    protected $_cacheTag = 'form_customer_reviews';
    /**
     * @var string
     */
    protected $_eventPrefix = 'form_customer_reviews';

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Tejas\Grid\Model\ResourceModel\Feedback');
    }

    /**
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return array
     */
    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }
}