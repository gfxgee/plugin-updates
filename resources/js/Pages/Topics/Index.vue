<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

const porps = defineProps({
    topics: Array
})
</script>

<template>
    <Head title="Topics" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Topics Index
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex justify-end m-2 p-2">
                    <Link :href="route('topics.create')" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded">Create</Link>
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Image
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b" v-for="topic in topics" :key="topic.id">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900whitespace-nowrap">
                                    {{ topic.name }}
                                </th>
                                <td class="px-6 py-4">
                                    <img :src="topic.image" alt="Image"/>
                                </td>
                                <td class="px-6 py-4">
                                    <Link :href="`/topics/${topic.id}/edit`">Edit</Link>
                                    <Link :href="`/topics/${topic.id}`" method="delete" as="button" type="button">Delete</Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
