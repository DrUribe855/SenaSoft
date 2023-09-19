import './bootstrap';
import Vue from 'vue';


// Importaciones

//Modulo productos
import createProduct from './components/Products/Create.vue';
import editProduct from './components/Products/Edit.vue';
import indexProduct from './components/Products/Index.vue';

//Modulo proveedores
import createSupplier from './components/Suppliers/Create.vue';
import editSupplier from './components/Suppliers/Edit.vue';
import indexSupplier from './components/Suppliers/Index.vue';
import createModal from './components/Suppliers/ModalCrear.vue';


Vue.component('create-product', createProduct );
Vue.component( 'edit-product', editProduct);
Vue.component( 'index-product', indexProduct);
Vue.component( 'create-supplier', createSupplier);
Vue.component( 'edit-supplier', editSupplier);
Vue.component( 'index-supplier', indexSupplier);
Vue.component( 'create-modal', createModal);

const app = new Vue({
	el: '#app';
});
