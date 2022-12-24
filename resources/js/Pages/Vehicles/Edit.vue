<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue';
import VallidationErrors from '@/Components/VallidationErrors.vue';

const props = defineProps({
    vehicle: Object
})

const form = reactive({
    id: props.vehicle.id,
    type: props.vehicle.type,
    car_number: props.vehicle.car_number,
    body_type: props.vehicle.body_type,
    registration_date: props.vehicle.registration_date,
    inspection_date: props.vehicle.inspection_date,
    start_milage: props.vehicle.start_milage,
    deleted_at: props.vehicle.deleted_at
})

const updateVehicle = id => {
    Inertia.put(route('vehicles.update', { vehicle: id }), form);
}

</script>

<template>

    <Head title="車両編集" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                車両編集
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <VallidationErrors class="mb-4" />
                        <section class="relative text-gray-600 body-font">
                            <form @submit.prevent="updateVehicle(form.id)">
                                <div class="container px-5 py-8 mx-auto">
                                    <div class="mx-auto lg:w-1/2 md:w-2/3">
                                        <div class="flex flex-wrap -m-2">

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="type" class="text-sm leading-7 text-gray-600">車両タイプ<span
                                                            class="ml-2 text-sm text-blue-300">(必須)</span></label>
                                                    <input type="text" id="type" name="type" v-model="form.type"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="car_number"
                                                        class="text-sm leading-7 text-gray-600">車両番号<span
                                                            class="ml-2 text-sm text-blue-300">(必須)</span></label>
                                                    <input type="text" id="car_number" name="car_number"
                                                        v-model="form.car_number"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="body_type"
                                                        class="text-sm leading-7 text-gray-600">車両型式</label>
                                                    <input type="text" id="body_type" name="body_type"
                                                        v-model="form.body_type"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="registration_date"
                                                        class="text-sm leading-7 text-gray-600">登録年月<span>（入力形式：〇〇〇〇-△△)</span></label>
                                                    <input type="text" id="registration_date" name="registration_date"
                                                        v-model="form.registration_date"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="inspection_date"
                                                        class="text-sm leading-7 text-gray-600">車検年月<span>（入力形式：〇〇〇〇-△△)</span><span
                                                            class="ml-2 text-sm text-blue-300">(必須)</span></label>
                                                    <input type="text" id="inspection_date" name="inspection_date"
                                                        v-model="form.inspection_date"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="start_milage"
                                                        class="text-sm leading-7 text-gray-600">走行開始距離(Km)</label>
                                                    <input type="number" id="start_milage" name="start_milage"
                                                        v-model="form.start_milage"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <button
                                                    class="flex px-8 py-2 mx-auto text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">
                                                    更新
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
