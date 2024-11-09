// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import HotelList from '../components/HotelList.vue';
import NuevoHotel from '../components/NuevoHotel.vue';

const routes = [
  { path: '/', redirect: '/hoteles' },
  { path: '/hoteles', component: HotelList },
  { path: '/hoteles/nuevo', component: NuevoHotel },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
