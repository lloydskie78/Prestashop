<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.core.localization.currency.middleware.database' shared service.

$this->services['prestashop.core.localization.currency.middleware.database'] = $instance = new \PrestaShop\PrestaShop\Core\Localization\Currency\DataLayer\CurrencyDatabase(${($_ = isset($this->services['prestashop.adapter.data_provider.currency']) ? $this->services['prestashop.adapter.data_provider.currency'] : $this->getPrestashop_Adapter_DataProvider_CurrencyService()) && false ?: '_'});

$instance->setLowerLayer(${($_ = isset($this->services['prestashop.core.localization.currency.middleware.reference']) ? $this->services['prestashop.core.localization.currency.middleware.reference'] : $this->load('getPrestashop_Core_Localization_Currency_Middleware_ReferenceService.php')) && false ?: '_'});

return $instance;
