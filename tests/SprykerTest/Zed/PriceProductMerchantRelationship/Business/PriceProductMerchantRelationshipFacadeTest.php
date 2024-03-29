<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Zed\PriceProductMerchantRelationship\Business;

use Codeception\Test\Unit;
use Orm\Zed\PriceProductMerchantRelationship\Persistence\SpyPriceProductMerchantRelationshipQuery;

/**
 * Auto-generated group annotations
 *
 * @group SprykerTest
 * @group Zed
 * @group PriceProductMerchantRelationship
 * @group Business
 * @group Facade
 * @group PriceProductMerchantRelationshipFacadeTest
 * Add your own group annotations below this line
 */
class PriceProductMerchantRelationshipFacadeTest extends Unit
{
    /**
     * @var \SprykerTest\Zed\PriceProductMerchantRelationship\PriceProductMerchantRelationshipBusinessTester
     */
    protected $tester;

    /**
     * @deprecated will be removed without replacement.
     *
     * @return void
     */
    public function testDeletePriceProductMerchantRelationshipByIdPriceProductStore(): void
    {
        if ($this->tester->isDynamicStoreEnabled()) {
            $this->markTestSkipped('The helper is not compatible with Dynamic Store, because it`s using deprecated method that was not updated. Tech Debt ticket registered');
        }
        $idPriceProductStore = $this
            ->tester
            ->haveProductAbstractPriceProductMerchantRelationship()
            ->getMoneyValue()
            ->getIdEntity();

        $this->tester->getFacade()
            ->deletePriceProductMerchantRelationshipByIdPriceProductStore($idPriceProductStore);

        $priceProductMerchantRelationshipQuery = $this->getPriceProductMerchantRelationshipQuery()
            ->filterByFkPriceProductStore($idPriceProductStore);

        $this->assertSame(0, $priceProductMerchantRelationshipQuery->count());
    }

    /**
     * @return \Orm\Zed\PriceProductMerchantRelationship\Persistence\SpyPriceProductMerchantRelationshipQuery
     */
    protected function getPriceProductMerchantRelationshipQuery(): SpyPriceProductMerchantRelationshipQuery
    {
        return SpyPriceProductMerchantRelationshipQuery::create();
    }
}
