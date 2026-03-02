<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductMerchantRelationship\Persistence;

use Generated\Shared\Transfer\PriceProductCriteriaTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\QueryCriteriaTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

/**
 * @method \Spryker\Zed\PriceProductMerchantRelationship\Persistence\PriceProductMerchantRelationshipPersistenceFactory getFactory()
 */
class PriceProductMerchantRelationshipRepository extends AbstractRepository implements PriceProductMerchantRelationshipRepositoryInterface
{
    public function buildMerchantRelationshipPriceDimensionQueryCriteria(
        PriceProductCriteriaTransfer $priceProductCriteriaTransfer
    ): ?QueryCriteriaTransfer {
        return $this->getFactory()
            ->createMerchantRelationshipPriceQueryExpander()
            ->buildMerchantRelationshipPriceDimensionQueryCriteria($priceProductCriteriaTransfer);
    }

    public function buildUnconditionalMerchantRelationshipPriceDimensionQueryCriteria(): QueryCriteriaTransfer
    {
        return $this->getFactory()
            ->createMerchantRelationshipPriceQueryExpander()
            ->buildUnconditionalMerchantRelationshipPriceDimensionQueryCriteria();
    }

    public function findIdByPriceProductTransfer(PriceProductTransfer $priceProductTransfer): ?string
    {
        $query = $this->getFactory()
            ->createPriceProductMerchantRelationshipQuery()
            ->usePriceProductStoreQuery()
                ->filterByFkStore($priceProductTransfer->getMoneyValue()->getFkStore())
                ->filterByFkCurrency($priceProductTransfer->getMoneyValue()->getFkCurrency())
                ->filterByFkPriceProduct($priceProductTransfer->getIdPriceProduct())
            ->endUse()
            ->filterByFkMerchantRelationship($priceProductTransfer->getPriceDimension()->getIdMerchantRelationship());

        if ($priceProductTransfer->getIdProduct()) {
            $query->filterByFkProduct($priceProductTransfer->getIdProduct());
        } else {
            $query->filterByFkProductAbstract($priceProductTransfer->getIdProductAbstract());
        }

        $entity = $query->findOne();

        if ($entity === null) {
            return null;
        }

        return $entity->getIdPriceProductMerchantRelationship();
    }
}
