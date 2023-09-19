<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm} from '@inertiajs/vue3'
import axios from 'axios';

const props = defineProps({ product: Object })

const form = useForm({
    name: props.product.name,
    price: props.product.price,
    quantity: props.product.quantity,
})

const submit = () => {
    form.put(route('products.update', props.product.id), form);
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
                            <h3 class="text-lg text-gray-900">Editar producto</h3>
                            <p class="text-sm text-gray-600">Aqui se muestra el listado actualizado de los productos que se encuentran registrados en la base de datos</p>
                        </div>
                    </div>
                    <div class="md:col-span-1 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <form @submit.prevent="submit">
                                <label class="block font-medium text-sm text-gray-700">Nombre del producto</label>
                                <input type="text" 
                                class="form-input w-full rounded-md shadow-sm"
                                v-model="form.name">
                                <label class="block font-medium text-sm text-gray-700">Precio</label>
                                <input type="text" 
                                class="form-input w-full rounded-md shadow-sm"
                                v-model="form.price">
                                <label class="block font-medium text-sm text-gray-700">Cantidad</label>
                                <input type="text" 
                                class="form-input w-full rounded-md shadow-sm"
                                v-model="form.quantity">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">Editar</button>
                            </form>
                            <hr class="my-6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
    
</script>