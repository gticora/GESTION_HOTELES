<template>
    <div class="container">
      <h2>Crear Habitación</h2>
      <!-- Muestra el error si existe -->
      <div v-if="error.general" class="alert alert-danger">{{ error.general }}</div>
      <form @submit.prevent="crearHabitacion">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="tipo" class="form-label">Tipo de Habitación</label>
                <select class="form-select" id="tipo" v-model="habitacion.tipo_habitacion_id" required>
                    <option value="" disabled>Selecciona un tipo</option>
                    <option v-for="tipo in tiposHabitacion" :key="tipo.id" :value="tipo.id">
                        {{ tipo.nombre }}
                    </option>
                </select>
                <!-- Mensaje de error específico para tipo_habitacion_id -->
                <div v-if="error.tipo_habitacion_id" class="text-danger">
                    {{ error.tipo_habitacion_id[0] }}
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="acomodacion" class="form-label">Acomodación</label>
                <select class="form-select" id="acomodacion" v-model="habitacion.acomodacion_id" required>
                    <option value="" disabled>Selecciona una acomodación</option>
                    <option v-for="acomodacion in tiposAcomodacion" :key="acomodacion.id" :value="acomodacion.id">
                        {{ acomodacion.nombre }}
                    </option>
                </select>
                <!-- Mensaje de error específico para acomodacion_id -->
                <div v-if="error.acomodacion_id" class="text-danger">
                    {{ error.acomodacion_id[0] }}
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="numero_habitaciones" class="form-label">Número de Habitaciones</label>
                <input type="number" class="form-control" id="numero_habitaciones" v-model="habitacion.cantidad" required />
            </div>
            <!-- Mensaje de error específico para cantidad -->
            <div v-if="error.cantidad" class="text-danger">
                {{ error.cantidad[0] }}
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <button type="submit" class="btn btn-success me-3">Crear Habitación</button>
            <button type="button" class="btn btn-secondary" @click="regresarAlListado">Regresar</button>
        </div>
        
      </form>
    </div>
  </template>
  
  <script>
  import HabitacionService from '@/services/HabitacionService'; // Importa el servicio para crear habitaciones
  
  export default {
    props: {
      hotelId: {
        type: Number,
        required: true
      }
    },
    data() {
      return {
        habitacion: {
          tipo_habitacion_id: '',
          acomodacion_id: '',
          hotel_id: this.hotelId,
          cantidad: 0
        },
        tiposHabitacion: [],
        tiposAcomodacion: [],
        error: {} // Almacena errores específicos de los campos
      };
    },
    methods: {
        async cargarTipos() {
            try {
                // Cargar tipos de habitación
                const responseTipos = await HabitacionService.getTipoHabitacion();
                this.tiposHabitacion = responseTipos.data;

                // Cargar tipos de acomodación
                const responseAcomodaciones = await HabitacionService.getTipoAcomodacion();
                this.tiposAcomodacion = responseAcomodaciones.data;
            } catch (error) {
                console.error('Error al cargar los tipos de habitación o acomodación:', error);
            }
        },
        async crearHabitacion() {
            try {
                const response = await HabitacionService.createHabitacion(this.habitacion);
                if (response) {
                    this.$router.push('/hoteles');
                }
            } catch (error) {
                if (error.response && error.response.data && error.response.data.errors) {
                    // Verifica si los errores son un objeto (para errores específicos) o una cadena de texto (para un mensaje general)
                    if (typeof error.response.data.errors === 'object' && Object.keys(error.response.data.errors).length > 0) {
                        this.error = error.response.data.errors;
                    } else if (typeof error.response.data.errors === 'string') {
                        this.error.general = error.response.data.errors;
                    }
                } else {
                    this.error.general = 'Error al crear la habitación.';
                }
            }
        },
        regresarAlListado() {
            this.$router.push('/hoteles');
        }
    },
    mounted() {
        this.cargarTipos(); // Carga las listas desplegables al montar el componente
    }
  };
  </script>
  