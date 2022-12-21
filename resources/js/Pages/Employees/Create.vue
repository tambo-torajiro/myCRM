<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue';
import VallidationErrors from '@/Components/VallidationErrors.vue';

const form = reactive({
    name: null,
    tel: null,
    employee_status: null,
    emergency_name: null,
    emergency_contact: null,
    emergency_relation: null,
    deleted_at: null,
})

const storeEmployee = () => {
    Inertia.post('/employees', form)
}
</script>

<template>

    <Head title="従業員登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                従業員登録
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <VallidationErrors class="mb-4" />
                        <section class="relative text-gray-600 body-font">
                            <form @submit.prevent="storeEmployee">
                                <div class="container px-5 py-8 mx-auto">
                                    <div class="mx-auto lg:w-1/2 md:w-2/3">
                                        <div class="flex flex-wrap -m-2">

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="name" class="text-sm leading-7 text-gray-600">従業員名<span
                                                            class="ml-2 text-sm text-blue-300">(必須)</span></label>
                                                    <input type="text" id="name" name="name" v-model="form.name"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="tel" class="text-sm leading-7 text-gray-600">電話番号<span
                                                            class="ml-2 text-sm text-blue-300">(必須)</span></label>
                                                    <input type="tel" id="tel" name="tel" v-model="form.tel"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="employee_status"
                                                        class="text-sm leading-7 text-gray-600">雇用形態</label>
                                                    <select id="employee_status" v-model="form.employee_status"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                                                        <option value="1" selected>正社員</option>
                                                        <option value="2">派遣</option>
                                                        <option value="3">アルバイト</option>
                                                        <option value="4">請負</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="emergency_name"
                                                        class="text-sm leading-7 text-gray-600">緊急連絡先氏名</label>
                                                    <input type="text" id="emergency_name" name="emergency_name"
                                                        v-model="form.emergency_name"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="emergency_contact"
                                                        class="text-sm leading-7 text-gray-600">緊急連絡先電話番号<span
                                                            class="ml-2 text-sm text-blue-300">(必須)</span></label>
                                                    <input type="tel" id="emergency_contact" name="emergency_contact"
                                                        v-model="form.emergency_contact"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="	emergency_relation"
                                                        class="text-sm leading-7 text-gray-600">続柄</label>
                                                    <input type="text" id="	emergency_relation"
                                                        name="	emergency_relation" v-model="form.emergency_relation"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <button
                                                    class="flex px-8 py-2 mx-auto text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">
                                                    登録
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
