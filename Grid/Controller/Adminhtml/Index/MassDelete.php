<?php

namespace Tejas\Grid\Controller\Adminhtml\Index;

class MassDelete extends \Magento\Backend\App\Action
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

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $selectedIds = $data['selected'];
        try {
            foreach ($selectedIds as $selectedId) {
                $deleteData = $this->_feedbackFactory->create()->load($selectedId);
                $deleteData->delete();
            }
            $this->messageManager->addSuccess(__('Data has been successfully deleted.'));
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