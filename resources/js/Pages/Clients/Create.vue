<script setup>
import { Link, Head, useForm } from '@inertiajs/inertia-vue3';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';

const props = defineProps({
    errors: Object,
})
const form = useForm({
    name: null,
    website: null,
    monday: null,
    tuesday: null,
    wednesday: null,
    thursday: null,
    friday: null,
})

function submit() {
    form.post('/clients')
}
</script>
<template>
    <Head title="Clients Create" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <div class="flex mx-auto space-x-4">
                <div class="flex-1">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        Clients > Create
                    </h2>
                </div>
                <div>
                    <Link :href="route('clients.index')" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><i class="fa-solid fa-chevron-left"></i> Back</Link>
                </div>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 max-w-sm mx-auto bg-white rounded-lg border border-gray-200 shadow-md">
                    <form @submit.prevent="submit">
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                            <input type="text" v-model="form.name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="name@flowbite.com" required="">
                            <div v-if="errors.name"><p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ errors.name }}</p></div>
                        </div>
                        <div class="mb-6">
                            <label for="website" class="block mb-2 text-sm font-medium text-gray-900">Website</label>
                            <input type="text" v-model="form.website" id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required="">
                            <div v-if="errors.website"><p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ errors.website }}</p></div>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900">Schedule</label>
                            <div class="flex items-center mb-4">
                                <input id="monday" v-model="form.monday" aria-describedby="monday" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2" checked>
                                <label for="monday" class="ml-3 text-sm font-medium text-gray-900">Monday</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="tuesday" v-model="form.tuesday" aria-describedby="tuesday" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="tuesday" class="ml-3 text-sm font-medium text-gray-900">Tuesday</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="wednesday" v-model="form.wednesday" aria-describedby="wednesday" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="wednesday" class="ml-3 text-sm font-medium text-gray-900">Wednesday</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="thursday" v-model="form.thursday" aria-describedby="thursday" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="thursday" class="ml-3 text-sm font-medium text-gray-900">Thursday</label>
                            </div>
                            <div class="flex items-center mb-4">
                                <input id="friday" v-model="form.friday" aria-describedby="friday"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
                                <label for="friday" class="ml-3 text-sm font-medium text-gray-900">Friday</label>
                            </div>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>