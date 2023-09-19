<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link} from '@inertiajs/vue3';
import { ref } from 'vue';
import { useForm} from '@inertiajs/vue3'
import axios from 'axios';
import {defineEmits} from 'vue';

const props = defineProps({
        suppliers: Array,
        products: Array,
});

const form = useForm({
    name: '',
});

const {emit} = defineEmits();

const enviarDatos = (dato) => {
    emit('agregarSuppliers', dato); //borrar
}

const crearElemento = () => {
    console.log("Probando registrar");
    try{
        axios.post('/createSuppliers', form).then(resp => {
            console.log("Elemento creado con exito");
            console.log(resp);
            enviarDatos(resp.data.suppliers);
            

        });

        // modalVisible.value = false;

    }catch(error){
        console.log("Error al crear el elemento: ", error);
    }
}

</script>

<style scoped>
/* Clases de transición para el modal */
.fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s;
}
.fade-enter-from, .fade-leave-to {
  opacity: 0;
}
</style>

<template>
<transition
    enter-active-class="ease-out duration-300"
    enter-class="opacity-0"
    enter-to-class="opacity-100"
    leave-active-class="ease-in duration-200"
    leave-class="opacity-100"
    leave-to-class="opacity-0">
<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" v-show="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <transition name="fade">
            <div v-show="true" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                        <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                        </svg>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                        <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Registrar proveedor</h3>
                            <div class="mt-2">
                                <form @submit.prevent="crearElemento">
                                    <label class="block font-medium text-sm text-gray-700">Nombre del proveedor</label>
                                    <input type="text" 
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.name">
                                    <button type="submit" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:w-auto mt-4">Registrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">

                    <button @click="$emit('closeModelCrear')" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cerrar</button>
                </div>
            </div>
        </transition>
        </div>
    </div>
</div>
</transition>

</template>