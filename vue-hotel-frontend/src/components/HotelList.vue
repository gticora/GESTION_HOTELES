<template>
     <div>
    <h1>Lista de Hoteles</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Id</th>
          <th>Nit</th>
          <th>Nombre</th>
          <th>Ciudad</th> <!-- Agrega otros campos según sea necesario -->
          <th>Número de habitaciones</th>
          <th>Direccion</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="hotel in hoteles" :key="hotel.id">
          <td>{{ hotel.id }}</td>
          <td>{{ hotel.nit }}</td>
          <td>{{ hotel.nombre }}</td>
          <td>{{ hotel.ciudad }}</td> <!-- Muestra la ciudad del hotel -->
          <td>{{ hotel.numero_habitaciones }}</td> <!-- Muestra el número de habitaciones -->
          <td>{{ hotel.direccion }}</td> <!-- Muestra el número de habitaciones -->
          <td>
            <button @click="deleteHotel(hotel.id)">Eliminar</button>
          </td>
        </tr>
      </tbody>
    </table>
    <div v-if="error" class="error">{{ error }}</div>
  </div>
</template>
  
<script>
import apiClient from '../axios';
import HotelService from '@/services/HotelService';

  export default {
    data() {
      return {
        hoteles: [],
        error: null,
      };
    },
    methods: {
      // Método para realizar el login
      async iniciarSesion() {
        try {
          // Llamar a la API de login
          const response = await apiClient.post('/login', {
            email: 'gerente@hotel.com',
            password: 'password123',
          });
  
          // Guardar el token en localStorage
          localStorage.setItem('authToken', response.data.token);
  
          // Después de hacer login, obtener la lista de hoteles
          this.obtenerHoteles();
        } catch (error) {
          this.error = 'No se pudo iniciar sesión.';
          console.error(error);
        }
      },
  
      // Obtener la lista de hoteles
      async obtenerHoteles() {
        try {
          // Verificar si hay un token en localStorage
          const token = localStorage.getItem('authToken');
          if (token) {
            // Establecer el token en los headers de la solicitud
            apiClient.defaults.headers.common['Authorization'] = `Bearer ${token}`;
  
            // Obtener la lista de hoteles
            const response = await HotelService.getHotels();
            this.hoteles = response.data;
          } else {
            this.error = 'No hay token de autenticación.';
          }
        } catch (error) {
          this.error = 'No se pudo obtener la lista de hoteles.';
          console.error(error);
        }
      },
  
      // Eliminar un hotel
      async deleteHotel(id) {
        try {
          await HotelService.deleteHotel(id);
          this.hoteles = this.hoteles.filter(hotel => hotel.id !== id); // Actualizar la lista
        } catch (error) {
          this.error = 'No se pudo eliminar el hotel.';
          console.error(error);
        }
      },
    },
  
    mounted() {
      // Si ya hay un token, obtener los hoteles
      if (localStorage.getItem('authToken')) {
        this.obtenerHoteles();
      } else {
        this.iniciarSesion(); // Si no hay token, realizar login primero
      }
    },
  };
  </script>
  
  <style scoped>
  .error {
    color: red;
    margin-top: 20px;
  }
  </style>
  