<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductMerchantRelationship\Persistence;

use Generated\Shared\Transfer\PriceProductCriteriaTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Generated\Shared\Transfer\QueryCriteriaTransfer;

interface PriceProductMerchantRelationshipRepositoryInterface
{
    public function buildMerchantRelationshipPriceDimensionQueryCriteria(PriceProductCriteriaTransfer $priceProductCriteriaTransfer): ?QueryCriteriaTransfer;

    public function buildUnconditionalMerchantRelationshipPriceDimensionQueryCriteria(): QueryCriteriaTransfer;

    public function findIdByPriceProductTransfer(PriceProductTransfer $priceProductTransfer): ?string;
}
