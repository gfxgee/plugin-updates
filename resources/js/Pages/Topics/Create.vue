<script setup>
import { Link, Head, useForm } from '@inertiajs/inertia-vue3';
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';

const props = defineProps({
    errors: Object,
})
const form = useForm({
    name: null,
    image: null,
})

function submit() {
    form.post('/topics')
}
</script>
<template>
    <Head title="Topics Create" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Topics Index > Create
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex m-2 p-2">
                    <Link :href="route('topics.index')" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Back</Link>
                </div>
                <div class="">
                    <div class="grid place-content-center mt-10">
                        <form @submit.prevent="submit" class="bg-white shadow-md m-2 p-2 rounded">
                            <div class="sm:col-span-6">
                                <label for="title" class="block text-sm font-medium text-gray-700"> Name </label>
                                <div class="mt-1">
                                    <input type="text" v-model="form.name" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    <div v-if="errors.name">{{ errors.name }}</div>
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label for="title" class="block text-sm font-medium text-gray-700"> Image </label>
                                <div class="mt-1">
                                    <input type="file" @input="form.image = $event.target.files[0]" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                    <div v-if="errors.image">{{ errors.image }}</div>
                                </div>
                            </div>
                            <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                                {{ form.progress.percentage }}%
                            </progress>
                            <div class="m-2 p-2">
                                <button type="submit" class="px-4 py-2 bg-green-400 hover:bg-green-600 rounded-lg text-white">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>