<template>
     <div>
    <h1>Lista de Hoteles</h1>
    <!-- Contenedor con d-flex para alinear el botón a la izquierda -->
    <div class="d-flex justify-content-end mb-3">
      <button class="btn btn-success me-3" @click="irANuevoHotel">Nuevo Hotel</button>
    </div>
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
            <button class="btn btn-info me-3" @click="verHabitaciones(hotel.id)" title="Ver Habitaciones">
              <i class="fas fa-bed"></i>
            </button>
            <button class="btn btn-primary" @click="crearHabitacion(hotel.id)" title="Crear Habitación">
             <i class="fas fa-plus-circle"></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>
    <!-- Modal para mostrar las habitaciones -->
    <div class="modal fade" id="habitacionesModal" tabindex="-1" aria-labelledby="habitacionesModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="habitacionesModalLabel">Habitaciones del Hotel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
             <!-- Aquí se muestra el mensaje de error si ocurre uno -->
            <div v-if="error" class="alert alert-danger">
              {{ error }}
            </div>
            <table class="table" v-if="habitaciones.length > 0">
              <thead>
                <tr>
                  <th>Tipo de Habitación</th>
                  <th>Acomodación</th>
                  <th>Cantidad</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="habitacion in habitaciones" :key="habitacion.id">
                  <td>{{ habitacion.tipo_habitacion.nombre }}</td>
                  <td>{{ habitacion.acomodacion.nombre }}</td>
                  <td>{{ habitacion.cantidad }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
<script>
import apiClient from '../axios';
import HotelService from '@/services/HotelService';

  export default {
    data() {
      return {
        hoteles: [],
        habitaciones: [], 
        error: null,
      };
    },
    methods: {
      irANuevoHotel() {
        this.$router.push('/hoteles/nuevo');  // Redirige a la ruta de nuevo hotel
      },
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

      async verHabitaciones(hotelId) {
        this.habitaciones = [];
        this.error = '';
        try {
          const response = await apiClient.get(`/habitaciones/hotel/${hotelId}`);
          this.habitaciones = response.data;
          const modalElement = document.getElementById('habitacionesModal');
          const modal = new window.bootstrap.Modal(modalElement);
          modal.show();  // Asegúrate de que se muestra correctamente
        } catch (error) {
          if (error.response && error.response.status === 404) {
            // Si el código de error es 404, muestra el mensaje de la API
            this.error = error.response.data.message || 'No se pudieron encontrar habitaciones.';
          } else {
            // En otros casos, muestra un mensaje genérico
            this.error = 'No se pudo obtener las habitaciones del hotel.';
          }
          //console.error(error);
          
          // Mostrar el modal con el mensaje de error
          const modalElement = document.getElementById('habitacionesModal');
          const modal = new window.bootstrap.Modal(modalElement);
          modal.show();
        }
      },
      crearHabitacion(hotelId) {
        // Redirige al componente de creación de habitaciones, pasando el ID del hotel como parámetro
        this.$router.push({ name: 'CrearHabitacion', params: { hotelId } });
      }
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
  