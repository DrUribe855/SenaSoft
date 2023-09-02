<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { useForm} from '@inertiajs/vue3'



const form = useForm({
    name: '',
})

const submit = () => {
    form.post(route('suppliers.store'), form);
}





</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo de proveedores
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="px-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Registrar proveedor</h3>
                            <p class="text-sm text-gray-600">Aqui pueden registrar nuevos proveedores</p>
                        </div>
                    </div>
                    <div class="md:col-span-1 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <form @submit.prevent="submit">
                                <label class="block font-medium text-sm text-gray-700">Nombre del proveedor</label>
                                <input type="text" 
                                class="form-input w-full rounded-md shadow-sm"
                                v-model="form.name">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">Crear</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>