<template>
  <div class="container">
    <h2 class="text-start">Nuevo Hotel</h2>

    <form @submit.prevent="crearHotel">
      <div class="row">
        <!-- Campo NIT -->
        <div class="col-md-6 mb-3">
          <label for="nit" class="form-label">NIT</label>
          <input type="text" class="form-control" id="nit" v-model="hotel.nit" required />
          <div v-if="errors && errors.nit" class="text-danger">{{ errors.nit[0] }}</div>
        </div>

        <!-- Campo Nombre -->
        <div class="col-md-6 mb-3">
          <label for="nombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="nombre" v-model="hotel.nombre" required />
          <div v-if="errors && errors.nombre" class="text-danger">{{ errors.nombre[0] }}</div>
        </div>

        <!-- Campo Dirección -->
        <div class="col-md-6 mb-3">
          <label for="direccion" class="form-label">Dirección</label>
          <input type="text" class="form-control" id="direccion" v-model="hotel.direccion" required />
          <div v-if="errors && errors.direccion" class="text-danger">{{ errors.direccion[0] }}</div>
        </div>

        <!-- Campo Ciudad -->
        <div class="col-md-6 mb-3">
          <label for="ciudad" class="form-label">Ciudad</label>
          <input type="text" class="form-control" id="ciudad" v-model="hotel.ciudad" required />
          <div v-if="errors && errors.ciudad" class="text-danger">{{ errors.ciudad[0] }}</div>
        </div>

        <!-- Campo Número de Habitaciones -->
        <div class="col-md-6 mb-3">
          <label for="numero_habitaciones" class="form-label">Número de Habitaciones</label>
          <input type="number" class="form-control" id="numero_habitaciones" v-model="hotel.numero_habitaciones" required />
          <div v-if="errors && errors.numero_habitaciones" class="text-danger">{{ errors.numero_habitaciones[0] }}</div>
        </div>
      </div>
      <div class="d-flex justify-content-center mt-4">
        <button type="submit" class="btn btn-primary me-3">Crear Hotel</button>
        <button type="button" class="btn btn-secondary" @click="regresarAlListado">Regresar</button>
      </div>
    </form>
  </div>
</template>

<script>
import HotelService from '@/services/HotelService';

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
      errors: {} // Asegura que `errors` esté definido como un objeto vacío
    };
  },
  methods: {
    async crearHotel() {
      try {
        const token = localStorage.getItem('authToken');
        if (token) {
          const response = await HotelService.createHotel(this.hotel);
          if (response) {
            this.$router.push('/hoteles');
          }
        } else {
          this.errors.general = 'No hay token de autenticación.';
        }
      } catch (error) {
        if (error.response && error.response.data && error.response.data.errors) {
          // Asigna los mensajes de error específicos a cada campo
          this.errors = error.response.data.errors;
        } else {
          console.error(error);
          this.errors.general = 'Error al crear el hotel.';
        }
      }
    },
    regresarAlListado() {
      this.$router.push('/hoteles');
    }
  }
};
</script>

<style scoped>
.container {
  margin-top: 20px;
}
.text-danger {
  font-size: 0.875rem;
}
</style>
