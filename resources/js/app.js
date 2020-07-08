/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
import "es6-promise/auto";
import Vue from "vue";
import "vue-toast-notification/dist/theme-default.css";

window.Vue = require("vue");

Vue.config.performance = true;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component(
  "manage-api-tokens",
  require("./components/tokens/ManageToken.vue").default
);

Vue.component(
  "billing-payments",
  require("./components/billing/BillingPayments.vue").default
);

Vue.component(
  "billing-status",
  require("./components/billing/BillingStatus.vue").default
);

Vue.component("usage", require("./components/activity/Usage.vue").default);

Vue.component(
  "chart-usage",
  require("./components/activity/ChartUsage.vue").default
);

Vue.component(
  "slide-input",
  require("./components/common/SlideInput.vue").default
);

Vue.component(
  "option-list",
  require("./components/common/OptionList.vue").default
);

Vue.component(
  "peroid-switcher",
  require("./components/activity/PeroidSwitcher.vue").default
);

Vue.component(
  "data-table",
  require("./components/common/DataTable.vue").default
);

Vue.component(
  "error-message",
  require("./components/common/ErrorMessage.vue").default
);

Vue.use(window.VueToast, {
  position: "top-right",
  duration: 8000
});

Vue.use(window.VueClipboard);

Vue.use(window.VueApexCharts);

Vue.component("apexchart", window.VueApexCharts);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
  el: "#app"
});
