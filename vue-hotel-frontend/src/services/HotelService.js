// src/services/HotelService.js
import apiClient from '../axios';

export default {
  // Obtener todos los hoteles
  getHotels() {
    return apiClient.get('/hoteles');
  },

  // Crear un nuevo hotel
  createHotel(hotelData) {
    return apiClient.post('/hoteles', hotelData);
  },

  // Actualizar un hotel existente
  updateHotel(id, hotelData) {
    return apiClient.put(`/hoteles/${id}`, hotelData);
  },

  // Eliminar un hotel
  deleteHotel(id) {
    return apiClient.delete(`/hoteles/${id}`);
  }
};
