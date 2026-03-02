<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductMerchantRelationship\Persistence;

use Generated\Shared\Transfer\PriceProductMerchantRelationshipCollectionDeleteCriteriaTransfer;
use Generated\Shared\Transfer\SpyPriceProductMerchantRelationshipEntityTransfer;
use Spryker\Shared\Kernel\Transfer\EntityTransferInterface;

interface PriceProductMerchantRelationshipEntityManagerInterface
{
    public function saveEntity(
        SpyPriceProductMerchantRelationshipEntityTransfer $priceProductMerchantRelationshipEntityTransfer
    ): EntityTransferInterface;

    public function deleteByIdPriceProductStoreAndIdMerchantRelationship(
        int $idPriceProductStore,
        int $idMerchantRelationship
    ): void;

    public function deleteByIdMerchantRelationship(int $idMerchantRelationship): void;

    public function deleteByIdPriceProductStore(int $idProductStore): void;

    public function deleteAll(): void;

    public function deleteCollection(
        PriceProductMerchantRelationshipCollectionDeleteCriteriaTransfer $priceProductMerchantRelationshipCollectionDeleteCriteriaTransfer
    ): void;
}
