<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductMerchantRelationship\Business;

use Generated\Shared\Transfer\PriceProductDimensionTransfer;
use Generated\Shared\Transfer\PriceProductMerchantRelationshipCollectionDeleteCriteriaTransfer;
use Generated\Shared\Transfer\PriceProductMerchantRelationshipCollectionResponseTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;

/**
 * @method \Spryker\Zed\PriceProductMerchantRelationship\Business\PriceProductMerchantRelationshipBusinessFactory getFactory()
 */
interface PriceProductMerchantRelationshipFacadeInterface
{
    /**
     * Specification:
     *  - For BC reasons: Creates spy_price_product_store entry if does not exist.
     *  - Saves connection between spy_price_product_store and spy_price_product_merchant_relationship.
     *  - Creates connection between spy_price_product_store and spy_price_product_business_unit.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductTransfer $priceProductTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductTransfer
     */
    public function savePriceProductMerchantRelationship(PriceProductTransfer $priceProductTransfer): PriceProductTransfer;

    /**
     * Specification:
     *  - Deletes connection records between spy_price_product_store and spy_price_product_business_unit by idMerchantRelationship
     *
     * @api
     *
     * @param int $idMerchantRelationship
     *
     * @return void
     */
    public function deletePriceProductMerchantRelationshipByIdMerchantRelationship(int $idMerchantRelationship): void;

    /**
     * Specification:
     *  - Deletes connection records between spy_price_product_store and spy_price_product_business_unit by idPriceProductStore
     *
     * @api
     *
     * @deprecated will be removed without replacement.
     *
     * @param int $idPriceProductStore
     *
     * @return void
     */
    public function deletePriceProductMerchantRelationshipByIdPriceProductStore(int $idPriceProductStore): void;

    /**
     * Specification:
     *  - Deletes all connections between spy_price_product_store and spy_price_product_business_unit
     *
     * @api
     *
     * @return void
     */
    public function deleteAllPriceProductMerchantRelationship(): void;

    /**
     * Specification:
     * - Removes price product merchant relationships by provided criteria transfer.
     * - In the case if `PriceProductCollectionDeleteCriteriaTransfer.priceProductStoreIds` or `PriceProductCollectionDeleteCriteriaTransfer.merchantRelationshipIds` is empty, nothing will be deleted.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductMerchantRelationshipCollectionDeleteCriteriaTransfer $priceProductMerchantRelationshipCollectionDeleteCriteriaTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductMerchantRelationshipCollectionResponseTransfer
     */
    public function deletePriceProductMerchantRelationshipCollection(
        PriceProductMerchantRelationshipCollectionDeleteCriteriaTransfer $priceProductMerchantRelationshipCollectionDeleteCriteriaTransfer
    ): PriceProductMerchantRelationshipCollectionResponseTransfer;

    /**
     * Specification:
     *  - Sets price dimension type as merchant relationship.
     *  - Sets price dimension name using the merchant relationship name.
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PriceProductDimensionTransfer $priceProductDimensionTransfer
     *
     * @return \Generated\Shared\Transfer\PriceProductDimensionTransfer
     */
    public function expandPriceProductDimension(PriceProductDimensionTransfer $priceProductDimensionTransfer): PriceProductDimensionTransfer;
}
