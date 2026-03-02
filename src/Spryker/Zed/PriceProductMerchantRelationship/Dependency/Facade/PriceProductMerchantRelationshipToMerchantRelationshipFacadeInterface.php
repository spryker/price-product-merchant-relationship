<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductMerchantRelationship\Dependency\Facade;

use Generated\Shared\Transfer\MerchantRelationshipTransfer;

interface PriceProductMerchantRelationshipToMerchantRelationshipFacadeInterface
{
    public function getMerchantRelationshipById(MerchantRelationshipTransfer $merchantRelationshipTransfer): MerchantRelationshipTransfer;
}
