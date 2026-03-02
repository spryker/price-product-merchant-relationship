<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Shared\PriceProductMerchantRelationship\Helper;

use Codeception\Module;
use Generated\Shared\DataBuilder\PriceProductBuilder;
use Generated\Shared\Transfer\CompanyBusinessUnitTransfer;
use Generated\Shared\Transfer\MerchantRelationshipTransfer;
use Generated\Shared\Transfer\PriceProductTransfer;
use Orm\Zed\MerchantRelationship\Persistence\SpyMerchantRelationshipToCompanyBusinessUnit;
use Orm\Zed\PriceProductMerchantRelationship\Persistence\SpyPriceProductMerchantRelationshipQuery;
use Spryker\Zed\PriceProduct\Business\PriceProductFacadeInterface;
use Spryker\Zed\PriceProductMerchantRelationship\Business\PriceProductMerchantRelationshipFacadeInterface;
use SprykerTest\Shared\PriceProduct\Helper\PriceProductDataHelper;
use SprykerTest\Shared\Product\Helper\ProductDataHelper;
use SprykerTest\Shared\Testify\Helper\LocatorHelperTrait;
use SprykerTest\Shared\Testify\Helper\TableRelationsCleanupHelper;
use SprykerTest\Zed\Company\Helper\CompanyHelper;
use SprykerTest\Zed\CompanyBusinessUnit\Helper\CompanyBusinessUnitHelper;
use SprykerTest\Zed\Merchant\Helper\MerchantHelper;
use SprykerTest\Zed\MerchantRelationship\Helper\MerchantRelationshipHelper;

class PriceProductMerchantRelationshipHelper extends Module
{
    use LocatorHelperTrait;

    public function haveMerchantRelationshipToCompanyBusinessUnit(
        int $idCompanyBusinessUnit,
        int $idMerchantRelationship
    ): void {
        (new SpyMerchantRelationshipToCompanyBusinessUnit())
            ->setFkCompanyBusinessUnit($idCompanyBusinessUnit)
            ->setFkMerchantRelationship($idMerchantRelationship)
            ->save();
    }

    public function ensurePriceProductMerchantRelationshipTableIsEmpty(): void
    {
        $this->getTableRelationsCleanupHelper()->ensureDatabaseTableIsEmpty($this->getPriceProductMerchantRelationshipQuery());
    }

    public function haveProductAbstractPriceProductMerchantRelationship(): PriceProductTransfer
    {
        $idProductAbstract = $this->getProductDataHelper()->haveProductAbstract()->getIdProductAbstractOrFail();
        $this->getPriceProductDataHelper()->havePriceProductAbstract($idProductAbstract);

        $priceProductTransfer = (new PriceProductBuilder())
            ->withMoneyValue()
            ->withPriceDimension()
            ->withPriceType()
            ->build();

        $priceProductTransfer->fromArray(
            $this->getPriceProductFacade()->findProductAbstractPrice($idProductAbstract)->modifiedToArray(),
        );

        return $this->havePriceProductMerchantRelationship($priceProductTransfer);
    }

    public function haveProductConcretePriceProductMerchantRelationship(): PriceProductTransfer
    {
        $productConcreteTransfer = $this->getProductDataHelper()->haveProduct();
        $priceProductTransfer = (new PriceProductBuilder())
            ->withMoneyValue()
            ->withPriceDimension()
            ->withPriceType()
            ->build();

        $priceProductTransfer->fromArray(
            $this->getPriceProductDataHelper()->havePriceProduct([
                PriceProductTransfer::ID_PRODUCT => $productConcreteTransfer->getIdProductConcrete(),
                PriceProductTransfer::SKU_PRODUCT_ABSTRACT => $productConcreteTransfer->getAbstractSku(),
            ])->toArray(),
        );

        return $this->havePriceProductMerchantRelationship($priceProductTransfer);
    }

    protected function havePriceProductMerchantRelationship(
        PriceProductTransfer $priceProductTransfer
    ): PriceProductTransfer {
        $merchantRelationshipTransfer = $this->createMerchantRelationship();

        $priceProductTransfer
            ->getPriceDimension()
            ->setIdMerchantRelationship($merchantRelationshipTransfer->getIdMerchantRelationship());

        return $this->getPriceProductMerchantRelationshipFacade()
            ->savePriceProductMerchantRelationship($priceProductTransfer);
    }

    protected function createMerchantRelationship(): MerchantRelationshipTransfer
    {
        $merchantTransfer = $this->getMerchantHelper()->haveMerchant();

        $companyBusinessUnitSeed = [
            CompanyBusinessUnitTransfer::FK_COMPANY => $this->getCompanyHelper()->haveCompany()->getIdCompany(),
        ];

        $companyBusinessUnitTransfer = $this->getCompanyBusinessUnitHelper()
            ->haveCompanyBusinessUnit($companyBusinessUnitSeed);

        $merchantRelationshipTransfer = $this->getMerchantRelationshipHelper()->haveMerchantRelationship([
            MerchantRelationshipTransfer::FK_MERCHANT => $merchantTransfer->getIdMerchant(),
            MerchantRelationshipTransfer::MERCHANT => $merchantTransfer,
            MerchantRelationshipTransfer::FK_COMPANY_BUSINESS_UNIT => $companyBusinessUnitTransfer->getIdCompanyBusinessUnitOrFail(),
            MerchantRelationshipTransfer::OWNER_COMPANY_BUSINESS_UNIT => $companyBusinessUnitTransfer,
        ]);

        $this->haveMerchantRelationshipToCompanyBusinessUnit(
            $companyBusinessUnitTransfer->getIdCompanyBusinessUnitOrFail(),
            $merchantRelationshipTransfer->getIdMerchantRelationshipOrFail(),
        );

        return $merchantRelationshipTransfer;
    }

    protected function getPriceProductFacade(): PriceProductFacadeInterface
    {
        return $this->getLocator()->priceProduct()->facade();
    }

    protected function getPriceProductMerchantRelationshipFacade(): PriceProductMerchantRelationshipFacadeInterface
    {
        return $this->getLocator()->priceProductMerchantRelationship()->facade();
    }

    /**
     * @return \SprykerTest\Zed\Merchant\Helper\MerchantHelper|\Codeception\Module
     */
    protected function getMerchantHelper(): MerchantHelper
    {
        return $this->getModule('\\' . MerchantHelper::class);
    }

    /**
     * @return \SprykerTest\Zed\Company\Helper\CompanyHelper|\Codeception\Module
     */
    protected function getCompanyHelper(): CompanyHelper
    {
        return $this->getModule('\\' . CompanyHelper::class);
    }

    /**
     * @return \SprykerTest\Zed\CompanyBusinessUnit\Helper\CompanyBusinessUnitHelper|\Codeception\Module
     */
    protected function getCompanyBusinessUnitHelper(): CompanyBusinessUnitHelper
    {
        return $this->getModule('\\' . CompanyBusinessUnitHelper::class);
    }

    /**
     * @return \SprykerTest\Zed\MerchantRelationship\Helper\MerchantRelationshipHelper|\Codeception\Module
     */
    protected function getMerchantRelationshipHelper(): MerchantRelationshipHelper
    {
        return $this->getModule('\\' . MerchantRelationshipHelper::class);
    }

    /**
     * @return \SprykerTest\Shared\Product\Helper\ProductDataHelper|\Codeception\Module
     */
    protected function getProductDataHelper(): ProductDataHelper
    {
        return $this->getModule('\\' . ProductDataHelper::class);
    }

    /**
     * @return \SprykerTest\Shared\PriceProduct\Helper\PriceProductDataHelper|\Codeception\Module
     */
    protected function getPriceProductDataHelper(): PriceProductDataHelper
    {
        return $this->getModule('\\' . PriceProductDataHelper::class);
    }

    /**
     * @return \SprykerTest\Shared\Testify\Helper\TableRelationsCleanupHelper|\Codeception\Module
     */
    protected function getTableRelationsCleanupHelper(): TableRelationsCleanupHelper
    {
        return $this->getModule('\\' . TableRelationsCleanupHelper::class);
    }

    protected function getPriceProductMerchantRelationshipQuery(): SpyPriceProductMerchantRelationshipQuery
    {
        return SpyPriceProductMerchantRelationshipQuery::create();
    }
}
