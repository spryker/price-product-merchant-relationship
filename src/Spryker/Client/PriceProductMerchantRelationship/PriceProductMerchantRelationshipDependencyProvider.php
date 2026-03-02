<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\PriceProductMerchantRelationship;

use Spryker\Client\Kernel\AbstractDependencyProvider;
use Spryker\Client\Kernel\Container;
use Spryker\Client\PriceProductMerchantRelationship\Dependency\Client\PriceProductMerchantRelationshipToCartClientBridge;

class PriceProductMerchantRelationshipDependencyProvider extends AbstractDependencyProvider
{
    /**
     * @var string
     */
    public const CLIENT_CART = 'CLIENT_CART';

    public function provideServiceLayerDependencies(Container $container): Container
    {
        $container = $this->addCartClient($container);

        return $container;
    }

    private function addCartClient(Container $container): Container
    {
        $container->set(static::CLIENT_CART, function (Container $container) {
            return new PriceProductMerchantRelationshipToCartClientBridge($container->getLocator()->cart()->client());
        });

        return $container;
    }
}
