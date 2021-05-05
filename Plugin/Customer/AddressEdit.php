<?php
namespace Excellence\Gst\Plugin\Customer;

use Magento\Framework\View\LayoutInterface;

class AddressEdit
{
    /**
     * @var LayoutInterface
     */
    private $layout;
    function __construct(
        LayoutInterface $layout
    )
    {
        $this->layout = $layout;
    }

    /**
     * @param \Magento\Customer\Block\Address\Edit $edit
     * @param $result
     * @return mixed
     */
	public function afterGetNameBlockHtml(
		\Magento\Customer\Block\Address\Edit $edit,
		$result)
	{
	    $customBlock =  $this->layout->createBlock(
	        'Excellence\Gst\Block\Customer\AddressEdit',
            'Excellence_Gst_address_edit_gst');
		return $result.$customBlock->toHtml();
	}
}