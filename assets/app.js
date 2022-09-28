/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/app.scss";

import { createApp } from "vue";
import App from "./App.vue";

import router from "./router.js";

import BaseSpinner from "./components/BaseSpinner.vue";

const app = createApp(App);

app.use(router);

app.component("base-spinner", BaseSpinner);

app.mount("#app");
