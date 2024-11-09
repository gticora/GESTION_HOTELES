<template>
    <div class="container">
        <!-- Título alineado a la izquierda -->
        <h2 class="text-start">Nuevo Hotel</h2>

        <form @submit.prevent="crearHotel">
            <div class="row">
            <!-- Columna izquierda -->
            <div class="col-md-6 mb-3">
                <label for="nit" class="form-label">NIT</label>
                <input type="text" class="form-control" id="nit" v-model="hotel.nit" required />
            </div>

            <div class="col-md-6 mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" v-model="hotel.nombre" required />
            </div>
            

            <!-- Columna derecha -->
            <div class="col-md-6 mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" v-model="hotel.direccion" required />
            </div>
            <div class="col-md-6 mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" v-model="hotel.ciudad" required />
            </div>

            <div class="col-md-6 mb-3">
                <label for="numero_habitaciones" class="form-label">Número de Habitaciones</label>
                <input type="number" class="form-control" id="numero_habitaciones" v-model="hotel.numero_habitaciones" required />
            </div>
            </div>

            <!-- Contenedor de botones alineados en el centro con espacio entre ellos -->
            <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-primary me-3">Crear Hotel</button>
            <button type="button" class="btn btn-secondary" @click="regresarAlListado">Regresar</button>
            </div>
        </form>
    </div>
  </template>
  
  <script>
import HotelService from '@/services/HotelService'; // Importa el servicio

export default {
  data() {
    return {
      hotel: {
        nombre: '',
        direccion: '',
        nit: '',
        ciudad: '',
        numero_habitaciones: 0,
      },
      error: null
    };
  },
  methods: {
    // Crear un nuevo hotel
    async crearHotel() {
      try {
        // Verificar si hay un token en localStorage
        const token = localStorage.getItem('authToken');
        if (token) {
          // Llamar a la función createHotel que está en HotelService.js
          const response = await HotelService.createHotel(this.hotel);
          if (response) {
            this.$router.push('/hoteles'); // Redirige a la lista de hoteles después de la creación
          }
        } else {
          this.error = 'No hay token de autenticación.';
        }
      } catch (error) {
        this.error = 'Error al crear el hotel.';
        console.error(error);
      }
    },
    // Método para regresar al listado de hoteles
    regresarAlListado() {
      this.$router.push('/hoteles');
    }
  },
};
  </script>
  
  <style scoped>
  .container {
    margin-top: 20px;
  }
  </style>  