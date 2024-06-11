import './assets/main.css';

import { createApp } from 'vue';
import mitt from 'mitt';
import App from './App.vue';
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import router from './router/router.js';
import Storage from "./helpers/storage.js";

const emitter = mitt();
const app = createApp(App);

app.config.globalProperties.api_key = "19sdaSSDA2213SAss2SSds";
app.config.globalProperties.api_url = "http://c2c4.project-api.lvh.me/api/v1/";
app.config.globalProperties.emitter = emitter;
app.use(router);
app.mount('#app');
