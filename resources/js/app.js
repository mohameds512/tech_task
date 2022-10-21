import './bootstrap';
import {createApp} from 'vue';
import App from './vue/app.vue';

import router from './router/index'

import Swal, { swal } from 'sweetalert2/dist/sweetalert2';
import 'sweetalert2/dist/sweetalert2.css'

window.Swal = swal;
const toast = Swal.mixin({
    toast:true,
    position:'top-end',
    showConfirmButton:false,
    timer:3000,
    timerProgressBar:true,
});
window.toast = toast;

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core'

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

/* import specific icons */
import { faChevronLeft, faChevronRight, faAnglesLeft ,faAnglesRight} from '@fortawesome/free-solid-svg-icons'

/* add icons to the library */
library.add(faChevronLeft, faChevronRight , faAnglesLeft ,faAnglesRight)

const app = createApp(App);
app.component('font-awesome-icon',FontAwesomeIcon);
app.use(router);
app.mount('#app');
