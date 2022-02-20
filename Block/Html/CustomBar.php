<?php
declare(strict_types=1);

namespace Wdevs\CustomBar\Block\Html;

use Magento\Customer\Api\GroupRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Http\Context as HttpContext;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Wdevs\CustomBar\Helper\Data;

class CustomBar extends Template
{
    /**  @var Session */
    protected $customerSession;

    /**  @var GroupRepositoryInterface */
    protected $groupRepository;

    /** @var HttpContext */
    protected $httpContext;

    /** @var Data */
    protected $helperData;

    /**
     * Constructor
     *
     * @param Context $context
     * @param Session $customerSession
     * @param GroupRepositoryInterface $groupRepository
     * @param HttpContext $httpContext
     * @param Data $helperData
     * @param array $data
     */
    public function __construct(
        Context $context,
        Session $customerSession,
        GroupRepositoryInterface $groupRepository,
        HttpContext $httpContext,
        Data $helperData,
        array $data = []
    ) {
        $this->customerSession = $customerSession;
        $this->groupRepository = $groupRepository;
        $this->httpContext = $httpContext;
        $this->helperData = $helperData;
        parent::__construct($context, $data);
    }

    /**
     * @return string|null
     * @throws LocalizedException
     */
    public function getGroupName(): ?string
    {
        $groupId = $this->helperData->getCustomerGroupId();
        try {
            $group = $this->groupRepository->getById($groupId);

            return $group->getCode();
        } catch (NoSuchEntityException $e) {
            return null;
        }
    }

    /**
     * Check is customer logged in
     *
     * @return bool
     */
    public function isCustomerLoggedIn(): bool
    {
        return $this->helperData->isCustomerLoggedIn();
    }
    /**
     * Check is module enabled
     *
     * @return bool
     */
    public function isModuleEnabled(): bool
    {
        return $this->helperData->isModuleEnabled();
    }
}
