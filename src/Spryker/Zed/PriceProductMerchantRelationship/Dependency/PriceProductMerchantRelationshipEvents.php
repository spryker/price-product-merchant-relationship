<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PriceProductMerchantRelationship\Dependency;

interface PriceProductMerchantRelationshipEvents
{
    /**
     * Specification:
     * - This event will be used for spy_price_product_merchant_relationship entity creation
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_MERCHANT_RELATIONSHIP_CREATE = 'Entity.spy_price_product_merchant_relationship.create';

    /**
     * Specification:
     * - This event will be used for spy_price_product_merchant_relationship entity update
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_MERCHANT_RELATIONSHIP_UPDATE = 'Entity.spy_price_product_merchant_relationship.update';

    /**
     * Specification:
     * - This event will be used for spy_price_product_merchant_relationship entity delete
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_MERCHANT_RELATIONSHIP_DELETE = 'Entity.spy_price_product_merchant_relationship.delete';

    /**
     * Specification:
     * - This event will be used for price_abstract publishing
     *
     * @api
     *
     * @var string
     */
    public const PRICE_ABSTRACT_PUBLISH = 'Price.price_abstract.publish';

    /**
     * Specification:
     * - This event will be used for price_abstract un-publishing
     *
     * @api
     *
     * @var string
     */
    public const PRICE_ABSTRACT_UNPUBLISH = 'Price.price_abstract.unpublish';

    /**
     * Specification:
     * - This event will be used for price_concrete publishing
     *
     * @api
     *
     * @var string
     */
    public const PRICE_CONCRETE_PUBLISH = 'Price.price_concrete.publish';

    /**
     * Specification:
     * - This event will be used for price_concrete un-publishing
     *
     * @api
     *
     * @var string
     */
    public const PRICE_CONCRETE_UNPUBLISH = 'Price.price_concrete.unpublish';

    /**
     * Specification:
     * - This event will be used for spy_price_product entity creation
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_CREATE = 'Entity.spy_price_product.create';

    /**
     * Specification:
     * - This event will be used for spy_price_product entity changes
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_UPDATE = 'Entity.spy_price_product.update';

    /**
     * Specification:
     * - This event will be used for spy_price_product entity deletion
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_DELETE = 'Entity.spy_price_product.delete';

    /**
     * Specification:
     * - This event will be use:d for spy_price_product_store entity creation
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_STORE_CREATE = 'Entity.spy_price_product_store.create';

    /**
     * Specification:
     * - This event will be used for spy_price_product_store entity changes
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_STORE_UPDATE = 'Entity.spy_price_product_store.update';

    /**
     * Specification:
     * - This event will be used for spy_price_product_store entity deletion
     *
     * @api
     *
     * @var string
     */
    public const ENTITY_SPY_PRICE_PRODUCT_STORE_DELETE = 'Entity.spy_price_product_store.delete';
}
