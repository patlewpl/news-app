import { createRouter, createWebHistory } from "vue-router";

import NewsList from "./components/NewsList.vue";

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: "/",
      name: "home",
      component: NewsList,
    },
  ],
});

export default router;
