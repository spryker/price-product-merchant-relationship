<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductMerchantRelationship\Business;

use Generated\Shared\Transfer\MoneyValueTransfer;
use Generated\Shared\Transfer\PriceProductCriteriaTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;

/**
 * @method \Spryker\Zed\PriceProductMerchantRelationship\Business\PriceProductMerchantRelationshipBusinessFactory getFactory()
 */
interface PriceProductMerchantRelationshipFacadeInterface
{
    /**
     * Specification:
     *  - Saves price for given product price configuration
     *  - Creates spy_price_product_store entry if does not exist,
     *  - Creates connection between spy_price_product_store and spy_price_product_business_unit
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
     *  - Deletes all connections between spy_price_product_store and spy_price_product_business_unit
     *
     * @api
     *
     * @return void
     */
    public function deleteAllPriceProductMerchantRelationship(): void;
}
