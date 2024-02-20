<?php

namespace Tejas\Grid\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
{
   
    protected $_feedbackFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Tejas\Grid\Model\FeedbackFactory $feedbackFactory
    )
    {
        $this->_feedbackFactory = $feedbackFactory;
        parent::__construct($context);
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $reviewId = isset($data['id']) ? $data['id'] : '';
        if (!$data) {
            $this->_redirect('tejas_grid/index/index');
        }
        try {
            $rowData = $this->_feedbackFactory->create()->load($reviewId);
            if (!$rowData->getId() && $reviewId) {
                $this->messageManager->addError(__('Data no longer exist.'));
                $this->_redirect('tejas_grid/index/index');
            }
            $rowData->setData($data);
            $rowData->save();
            $this->messageManager->addSuccess(__('Data has been successfully edited and saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('tejas_grid/index/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Tejas_Grid::home');
    }
}