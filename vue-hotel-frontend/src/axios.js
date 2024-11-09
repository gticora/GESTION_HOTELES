// src/plugins/axios.js
import axios from 'axios';

const apiClient = axios.create({
  baseURL: 'http://localhost:8000/api', // Asegúrate de usar la URL de tu API Laravel
  headers: {
    'Content-Type': 'application/json',
    // Puedes agregar más encabezados aquí, como el token de autorización si es necesario.
  }
});

// Función para iniciar sesión y almacenar el token
export const login = async (email, password) => {
    try {
      const response = await apiClient.post('/login', { email, password });
      const token = response.data.token;
      
      // Guarda el token en el localStorage para usarlo en futuras solicitudes
      localStorage.setItem('authToken', token);
      
      // Configura el token en los encabezados de Axios
      apiClient.defaults.headers.common['Authorization'] = `Bearer ${token}`;
      
      return token;
    } catch (error) {
      console.error('Error de autenticación:', error);
      throw error;
    }
  };
  
  // Configura el token si ya está en el localStorage (para futuras sesiones)
  const token = localStorage.getItem('authToken');
  if (token) {
    apiClient.defaults.headers.common['Authorization'] = `Bearer ${token}`;
  }
  


export default apiClient;