import { createRouter, createWebHistory } from "vue-router";

import Clients from "./../pages/Clients.vue";
import Credit from "./../pages/Credit.vue";
import Payment from "./../pages/Payment.vue";

const routes = [
  {
    path: "/",
    name: "Clients",
    component: Clients,
    meta: {
      title: "Clients",
    },
  },
  {
    path: "/credit",
    name: "Credit",
    component: Credit,
    meta: {
      title: "Credit",
    },
  },
  {
    path: "/payment",
    name: "Payment",
    component: Payment,
    meta: {
      title: "Payment",
    },
  },
 
];

const router = createRouter({
  history: createWebHistory("/"),
  routes,
});

export default router;

router.beforeEach((toRoute, fromRoute, next) => {
  window.document.title =
    toRoute.meta && toRoute.meta.title ? toRoute.meta.title : "Project";

  next();
});