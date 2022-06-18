<?php

namespace Stripe;

/**
 * Class InvoiceItem
 *
 * @property string $id Unique identifier for the object.
 * @property string $object String representing the object's type. Objects of the same type share the same value.
 * @property int $amount Amount (in the <code>currency</code> specified) of the invoice item. This should always be equal to <code>unit_amount * quantity</code>.
 * @property string $currency Three-letter <a href="https://www.iso.org/iso-4217-currency-codes.html">ISO currency code</a>, in lowercase. Must be a <a href="https://stripe.com/docs/currencies">supported currency</a>.
 * @property string|\Stripe\Customer $customer The ID of the customer who will be billed when this invoice item is billed.
 * @property int $date Time at which the object was created. Measured in seconds since the Unix epoch.
 * @property string|null $description An arbitrary string attached to the object. Often useful for displaying to users.
 * @property bool $discountable If true, discounts will apply to this invoice item. Always false for prorations.
 * @property string|\Stripe\Invoice|null $invoice The ID of the invoice this invoice item belongs to.
 * @property bool $livemode Has the value <code>true</code> if the object exists in live mode or the value <code>false</code> if the object exists in test mode.
 * @property \Stripe\StripeObject $metadata Set of key-value pairs that you can attach to an object. This can be useful for storing additional information about the object in a structured format.
 * @property \Stripe\StripeObject $period
 * @property \Stripe\Plan|null $plan If the invoice item is a proration, the plan of the subscription that the proration was computed for.
 * @property bool $proration Whether the invoice item was created automatically as a proration adjustment when the customer switched plans.
 * @property int $quantity Quantity of units for the invoice item. If the invoice item is a proration, the quantity of the subscription that the proration was computed for.
 * @property string|\Stripe\Subscription|null $subscription The subscription that this invoice item has been created for, if any.
 * @property string $subscription_item The subscription item that this invoice item has been created for, if any.
 * @property \Stripe\TaxRate[]|null $tax_rates The tax rates which apply to the invoice item. When set, the <code>default_tax_rates</code> on the invoice do not apply to this invoice item.
 * @property bool $unified_proration For prorations this indicates whether Stripe automatically grouped multiple related debit and credit line items into a single combined line item.
 * @property int|null $unit_amount Unit Amount (in the <code>currency</code> specified) of the invoice item.
 * @property string|null $unit_amount_decimal Same as <code>unit_amount</code>, but contains a decimal value with at most 12 decimal places.
 *
 * @package Stripe
 */
class InvoiceItem extends ApiResource
{
    const OBJECT_NAME = 'invoiceitem';

    use ApiOperations\All;
    use ApiOperations\Create;
    use ApiOperations\Delete;
    use ApiOperations\Retrieve;
    use ApiOperations\Update;
}
