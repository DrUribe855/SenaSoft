<script setup>
import modalCrear from '../Suppliers/ModalCrear.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import {Link} from '@inertiajs/vue3';
import {defineComponent, ref} from 'vue';

const components = defineComponent({
    'modal-crear' : modalCrear,
})

const props = defineProps({
        products: Array,
});

const modalVisible = ref(false);

const openModelCrear = () => {
    console.log("Abriendo modal");
    modalVisible.value = true;
}

const closeModelCrear = () => {
    console.log("Cerrando Modal");
    modalVisible.value = false;

}

const agregarProducts = (dato) => {
    products.push(dato);
}

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo de productos 
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Listado de productos</h3>
                            <p class="text-sm text-gray-600">Aqui se muestra el listado actualizado de los productos que se encuentran registrados en la base de datos</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <button @click="openModelCrear()" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md" type="button">Crear</button>
                        <div class="shadow bg-white md:rounded-md p-4">
                            <table>
                                <thead>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                </thead>
                                <tbody>
                                    <tr v-for="product in products">
                                        <td class="border px-4 py-2">
                                            {{ product.name }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            {{ product.price }}
                                        </td>
                                        <td class="border px-4 py-2">
                                            {{ product.quantity }}
                                        </td>
                                         <td class="border px-4 py-2">
                                            <Link :href="route('products.edit', product.id)">Editar</Link>
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
    <modal-crear @closeModelCrear="closeModelCrear" @agregarProducts="agregarProducts" v-if="modalVisible" :products="products" ></modal-crear>

</template>

<script>
    
</script>