<script setup>
import modalCrear from './ModalCrear.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link} from '@inertiajs/vue3';
import { defineComponent, ref } from 'vue';
import { useForm} from '@inertiajs/vue3'
import axios from 'axios';




const components = defineComponent({
    'modal-crear': modalCrear,
});

const props = defineProps({
    suppliers: Array,
});



const modalVisible = ref(false);

const form = useForm({
    name: '',
})

const crearElemento = () => {
    try{
        axios.post('/suppliers', form);
        console.log("Elemento creado con exito");

        form.nombre = '',
        modalVisible.value = false;

    }catch(error){
        console.log("Error al crear el elemento: ", error);
    }
}

const openModelCrear = () => {
    console.log("Abriendo modal");
    modalVisible.value = true;
}

const closeModelCrear = () => {
    console.log("Cerrando Modal");
    modalVisible.value = false;

}

const agregarSuppliers = (dato) => {
    suppliers.push(dato);
}

// const destroy = () => {
//     const id = props.products.id;
//     axios.delete(`/products/${id}`).then(respuesta=>{
//         console.log(respuesta.data);
//         if(respuesta.data.status){
//             console.log(props.products);
//         }
//     }).catch(error=>{
//         console.log(error.response);
//         console.log(error);
//     });
// }

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
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo de Proveedores 
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Listado de Proveedores</h3>
                            <p class="text-sm text-gray-600">Aqui se muestra el listado actualizado de los proveedores que se encuentran registrados en la base de datos</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <button @click="openModelCrear()" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md" type="button">Crear</button>
                        <div class="shadow bg-white md:rounded-md p-4">
                            <table>
                                <thead>
                                    <th>Nombre</th>
                                </thead>
                                <tbody>
                                    <tr v-for="supplier in suppliers">
                                        <td class="border px-4 py-2">
                                            {{ supplier.name }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            <Link :href="route('suppliers.edit', {supplier: supplier.id})">Editar</Link>
                                        </td>
                                        <td class="border px-4 py-2">
                                            <Link @click.prevent="destroy">Eliminar</Link>
                                            <!-- <a href="#" @click.prevent="destroy">Eliminar</a> -->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </AppLayout>

    <modal-crear @closeModelCrear="closeModelCrear" @agregarSuppliers="agregarSuppliers" v-if="modalVisible" :suppliers="suppliers" ></modal-crear>
<!-- <transition
    enter-active-class="ease-out duration-300"
    enter-class="opacity-0"
    enter-to-class="opacity-100"
    leave-active-class="ease-in duration-200"
    leave-class="opacity-100"
    leave-to-class="opacity-0">
<div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" v-show="modalVisible">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <transition name="fade">
            <div v-show="modalVisible" class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
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
                                <form @submit.prevent="submit">
                                    <label class="block font-medium text-sm text-gray-700">Nombre del proveedor</label>
                                    <input type="text" 
                                    class="form-input w-full rounded-md shadow-sm"
                                    v-model="form.name">
                                    <button type="button" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:w-auto mt-4">Registrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">

                    <button @click="modalVisible = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cerrar</button>
                </div>
            </div>
        </transition>
        </div>
    </div>
</div>
</transition> -->


    

    

</template>
