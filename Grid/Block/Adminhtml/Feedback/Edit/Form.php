<?php

namespace Tejas\Grid\Block\Adminhtml\Feedback\Edit;

class Form extends \Magento\Backend\Block\Widget\Form\Generic
{

    
    protected $_systemStore;

    
    protected $_approved;

    
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Tejas\Grid\Model\Source\Approved $approved,
        array $data = []
    )
    {
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_approved = $approved;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * @return Form
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(['data' => ['id' => 'edit_form', 'enctype' => 'multipart/form-data', 'action' => $this->getData('action'), 'method' => 'post']]);
        $form->setHtmlIdPrefix('tejas_grid_');
        if ($model) {
            $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Review Details'), 'class' => 'fieldset-wide']);
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        } else {
            $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Review Details'), 'class' => 'fieldset-wide']);
        }
        $fieldset->addField(
            'first_name',
            'text',
            [
                'name' => 'first_name',
                'label' => __('First Name'),
                'title' => __('First Name'),
                'class' => 'required-entry',
                'required' => true,
                //'disabled' => $model ? true : false,
            ]
        );
        $fieldset->addField(
            'last_name',
            'text',
            [
                'name' => 'last_name',
                'label' => __('Last Name'),
                'title' => __('Last Name'),
                'class' => 'required-entry',
                'required' => true,
                //'disabled' => $model ? true : false,
            ]
        );
        $fieldset->addField(
          'gender',
          'text',
          [
              'name' => 'gender',
              'label' => __('Gender'),
              'title' => __('Gender'),
              'class' => 'required-entry',
              'required' => true,
              //'disabled' => $model ? true : false,
          ]
        );
       $fieldset->addField(
        'email',
        'text',
         [
            'name' => 'email',
            'label' => __('Email'),
            'title' => __('Email'),
            'class' => 'required-entry',
            'required' => true,
            //'disabled' => $model ? true : false,
         ]
        ); 
        $fieldset->addField(
        'adress1',
        'text',
        [
          'name' => 'adress1',
          'label' => __('Adress 1'),
          'title' => __('Adress 1'),
          'class' => 'required-entry',
          'required' => true,
          //'disabled' => $model ? true : false,
        ]
       );
       $fieldset->addField(
       'adress2',
       'text',
        [
        'name' => 'adress2',
        'label' => __('Adress 2'),
        'title' => __('Adress 2'),
        'class' => 'required-entry',
        'required' => true,
        //'disabled' => $model ? true : false,
        ]
       );
       $fieldset->addField(
       'city',
       'text',
       [
         'name' => 'city',
         'label' => __('City'),
         'title' => __('City'),
         'class' => 'required-entry',
         'required' => true,
         //'disabled' => $model ? true : false,
        ]
       );
       $fieldset->addField(
       'state',
       'text',
       [
         'name' => 'state',
         'label' => __('State'),
         'title' => __('State'),
         'class' => 'required-entry',
         'required' => true,
         //'disabled' => $model ? true : false,
        ]
       );
       $fieldset->addField(
       'zip_code',
       'text',
        [
         'name' => 'zip_code',
         'label' => __('Zip Code'),
         'title' => __('Zip Code'),
         'class' => 'required-entry',
         'required' => true,
         //'disabled' => $model ? true : false,
        ]
       );
       $fieldset->addField(
       'feedback',
       'text',
        [
         'name' => 'feedback',
         'label' => __('Feedback'),
         'title' => __('Feedback'),
         'class' => 'required-entry',
         'required' => true,
         //'disabled' => $model ? true : false,
        ]
       );
        $fieldset->addField(
            'approved',
            'select',
            [
                'name' => 'approved',
                'label' => __('Approved'),
                'id' => 'approved',
                'title' => __('Approved'),
                'class' => 'required-entry approved',
                'values' => $this->_approved->toOptionArray(),
                'required' => true,
            ]
        );
        $form->setValues($model ? $model->getData() : '');
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}