<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';


defineProps({
    vehicle: Object
})

const deleteVehicle = id => {
    Inertia.delete(route('vehicles.destroy', { vehicle: id }), {
        onBefore: () => confirm('本当に削除しますか？')
    })
}
</script>

<template>

    <Head title="車両詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                車両詳細
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <section class="relative text-gray-600 body-font">
                            <div class="container px-5 py-8 mx-auto">
                                <div class="mx-auto lg:w-1/2 md:w-2/3">
                                    <div class="flex flex-wrap -m-2">

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="name" class="text-sm leading-7 text-gray-600">車両タイプ</label>
                                                <div id="type" name="type"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ vehicle.type }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="car_number"
                                                    class="text-sm leading-7 text-gray-600">車両番号</label>
                                                <div id="car_number" name="car_number"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 whitespace-pre-wrap border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ vehicle.car_number }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="body_type"
                                                    class="text-sm leading-7 text-gray-600">車両型式</label>
                                                <div id="body_type" name="body_type"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ vehicle.body_type }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="registration_date"
                                                    class="text-sm leading-7 text-gray-600">登録年月</label>
                                                <div id="registration_date" name="registration_date"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ vehicle.registration_date }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="inspection_date"
                                                    class="text-sm leading-7 text-gray-600">車検年月</label>
                                                <div id="inspection_date" name="inspection_date"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ vehicle.inspection_date }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="start_milage"
                                                    class="text-sm leading-7 text-gray-600">走行開始距離</label>
                                                <div id="start_milage" name="start_milage"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ vehicle.start_milage }} Km
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex w-full p-2">
                                            <Link as="button" :href="route('vehicles.index')"
                                                class="inline-block px-8 py-2 mx-auto text-lg text-white bg-gray-400 border-0 rounded focus:outline-none hover:bg-gray-500">
                                            戻る
                                            </Link>
                                            <Link as="button" :href="route('vehicles.edit', { vehicle: vehicle.id })"
                                                class="inline-block px-8 py-2 mx-auto text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">
                                            編集
                                            </Link>
                                            <button @click="deleteVehicle(vehicle.id)"
                                                class="inline-block px-8 py-2 mx-auto text-lg text-white bg-red-500 border-0 rounded focus:outline-none hover:bg-red-600">削除</button>
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
