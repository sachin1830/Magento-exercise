define([
    'uiComponent',
    'Magento_Customer/js/customer-data'
], function (Component, customData) {
    'use strict';

    return Component.extend({
        initialize: function () {
            this._super();
            this.customsection = customData.get('customer_custom_data');
        }
    });
});
