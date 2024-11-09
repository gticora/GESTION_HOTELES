import { createApp } from 'vue'
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.min.css'; // Importar el CSS de Bootstrap
import 'bootstrap/dist/js/bootstrap.min.js'; 
import 'font-awesome/css/font-awesome.css';  // Si estás usando Font Awesome versión 4
// Importar y usar el router
import router from './router';
const app = createApp(App);

app.use(router);
app.mount('#app');