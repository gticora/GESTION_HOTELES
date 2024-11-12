// src/router/index.js
import { createRouter, createWebHistory } from 'vue-router';
import HotelList from '../components/HotelList.vue';
import NuevoHotel from '../components/NuevoHotel.vue';
import CrearHabitacion from '../components/CrearHabitacion.vue';

const routes = [
  { path: '/', redirect: '/hoteles' },
  { path: '/hoteles', component: HotelList },
  { path: '/hoteles/nuevo', component: NuevoHotel },
  { path: '/hoteles/:hotelId/crear-habitacion', name: 'CrearHabitacion', component: CrearHabitacion, props: true} ,
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
