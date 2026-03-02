<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductMerchantRelationship\Business\Model;

use Generated\Shared\Transfer\PriceProductMerchantRelationshipCollectionDeleteCriteriaTransfer;
use Generated\Shared\Transfer\PriceProductMerchantRelationshipCollectionResponseTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;

interface MerchantRelationshipPriceWriterInterface
{
    public function save(PriceProductTransfer $priceProductTransfer): PriceProductTransfer;

    public function deleteByIdMerchantRelationship(int $idMerchantRelationship): void;

    public function deleteAll(): void;

    public function deleteByIdPriceProductStore(int $idPriceProductStore): void;

    public function deleteCollection(
        PriceProductMerchantRelationshipCollectionDeleteCriteriaTransfer $priceProductMerchantRelationshipCollectionDeleteCriteriaTransfer
    ): PriceProductMerchantRelationshipCollectionResponseTransfer;
}
