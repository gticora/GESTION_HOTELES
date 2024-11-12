// src/services/HabitacionService.js
import apiClient from '../axios';

export default {

  createHabitacion(habitacionData) {
    return apiClient.post(`/habitaciones`, habitacionData);
  },

  // Obtener todas las habitaciones configuradas para un hotel
  getHabitacionHotelId(hotelId) {
    return apiClient.get(`/habitaciones/hotel/${hotelId}`);
  },

  // Obtener todos los tipos habitaciones
  getTipoHabitacion() {
    return apiClient.get(`/tipos-habitacion`);
  },

  // Obtener todos los tipos acomodaciones
  getTipoAcomodacion() {
    return apiClient.get(`/acomodaciones`);
  },

  // Actualizar una habitacion existente
  updateHabitacion(id, hotelData) {
    return apiClient.put(`/habitaciones/${id}`, hotelData);
  },

  // Eliminar una habitacion
  deleteHabitacion(id) {
    return apiClient.delete(`/habitaciones/${id}`);
  }
};
