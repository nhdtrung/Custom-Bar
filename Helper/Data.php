<?php

namespace Wdevs\CustomBar\Helper;

use Magento\Customer\Model\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Http\Context as HttpContext;

class Data
{
    /** Custom bar config status */
    const CUSTOM_BAR_STATUS = 'wdevs/custombar/status';

    /** @var ScopeConfigInterface */
    protected $scopeConfig;

    /** @var HttpContext */
    private $httpContext;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param HttpContext $httpContext
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        HttpContext $httpContext
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->httpContext = $httpContext;
    }

    /**
     * Get config value
     *
     * @return bool
     */
    public function isModuleEnabled(): bool
    {
        return (bool)$this->scopeConfig->getValue(self::CUSTOM_BAR_STATUS);
    }

    /**
     * @return bool
     */
    public function isCustomerLoggedIn(): bool
    {
        return (bool)$this->httpContext->getValue(Context::CONTEXT_AUTH);
    }

    /**
     * @return mixed|null
     */
    public function getCustomerGroupId()
    {
        return $this->httpContext->getValue('group_id');
    }
}
