/**
 * Copyright © 2015 Excellence . All rights reserved.
 */
define(
    [
        'Excellence_Gst/js/view/checkout/summary/tax',
        'Magento_Checkout/js/model/totals'
    ],
    function (Component, totals) {
        'use strict';

        var isFullTaxSummaryDisplayed = window.checkoutConfig.isFullTaxSummaryDisplayed,
            isZeroTaxDisplayed = window.checkoutConfig.isZeroTaxDisplayed;

        return Component.extend({

            /**
             * @override
             */
            ifShowValue: function () {
                if (this.getPureValue() === 0) {
                    return isZeroTaxDisplayed;
                }

                return true;
            },

            /**
             * @override
             */
            ifShowDetails: function () {
                return this.getPureValue() > 0 && isFullTaxSummaryDisplayed;
            },

            /**
             * @override
             */
            isCalculated: function () {
                return this.totals() && totals.getSegment('tax') !== null;
            }
        });
    }
);
