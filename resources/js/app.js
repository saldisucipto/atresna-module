import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./module/store";
import createPersistedState from "vuex-persistedstate";
import CKEditor from "@ckeditor/ckeditor5-vue";
// font awesome
import "@fortawesome/fontawesome-free/css/all.css";
import "@fortawesome/fontawesome-free/js/all.js";

const app = createApp(App);
app.use(router);
app.use(store);
app.use(CKEditor);
app.use(createPersistedState);

app.mount("#app");
