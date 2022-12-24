<script setup>
import FlashMessage from '@/Components/FlashMessage.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    vehicles: Array
})
</script>

<template>

    <Head title="車両一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">車両一覧</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <section>
                            <FlashMessage />

                            <div class="relative px-4 py-2 sm:px-6 lg:py-16 lg:px-8">
                                <div class="relative mx-auto max-w-7xl">
                                    <div class="flex w-full pl-4 mx-auto">
                                        <Link as="button" :href="route('vehicles.create')"
                                            class="flex px-6 py-2 ml-auto text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">
                                        車両登録</Link>
                                    </div>

                                    <div class="grid max-w-lg gap-5 mx-auto lg:grid-cols-3 lg:max-w-none">
                                        <div v-for="vehicle in vehicles" :key="vehicle.id"
                                            class="flex flex-col my-4 overflow-hidden rounded-lg shadow-lg hover:bg-neutral-100 hover:shadow-slate-400">
                                            <div class="flex-shrink-0">
                                                <img class="object-cover w-full h-48" src="/images/cat.jpg" alt="">
                                            </div>
                                            <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                                                <div class="flex-1">

                                                    <p class="text-xl font-semibold text-neutral-600">
                                                        <Link
                                                            class="p-2 text-blue-400 bg-gray-100 rounded hover:text-orange-400 hover:bg-purple-200"
                                                            :href="route('vehicles.show', { vehicle: vehicle.id })">
                                                        {{
                                                                vehicle.id
                                                        }}</Link>
                                                    </p>

                                                    <p class="mt-4 text-xl font-semibold text-gray-500">
                                                        {{ vehicle.type }}
                                                    </p>
                                                    <p
                                                        class="mt-4 text-xl font-semibold whitespace-pre-wrap text-neutral-600">
                                                        {{ vehicle.car_number }}
                                                    </p>
                                                    <p class="mt-4 text-xl font-semibold text-neutral-600">
                                                        {{ vehicle.inspection_date }}
                                                    </p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
