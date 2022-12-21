<script setup>
import FlashMessage from '@/Components/FlashMessage.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    employees: Array
})
</script>

<template>

    <Head title="従業員一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">従業員一覧</h2>
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
                                        <Link as="button" :href="route('employees.create')"
                                            class="flex px-6 py-2 ml-auto text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">
                                        商品登録</Link>
                                    </div>

                                    <div class="grid max-w-lg gap-5 mx-auto lg:grid-cols-3 lg:max-w-none">
                                        <div v-for="employee in employees" :key="employee.id"
                                            class="flex flex-col my-4 overflow-hidden rounded-lg shadow-lg hover:bg-neutral-100 hover:shadow-slate-400">
                                            <div class="flex-shrink-0">
                                                <img class="object-cover w-full h-48" src="/images/yatagarasu.png"
                                                    alt="">
                                            </div>
                                            <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                                                <div class="flex-1">

                                                    <p class="text-xl font-semibold text-neutral-600">
                                                        <Link
                                                            class="p-2 text-blue-400 bg-gray-100 rounded hover:text-orange-400 hover:bg-purple-200"
                                                            :href="route('employees.show', { employee: employee.id })">
                                                        {{
                                                                employee.id
                                                        }}</Link>
                                                    </p>

                                                    <p class="mt-4 text-xl font-semibold text-gray-500">
                                                        {{ employee.name }}
                                                    </p>
                                                    <p class="mt-4 text-xl font-semibold text-neutral-600">
                                                        {{ employee.tel }}
                                                    </p>
                                                    <p class="mt-4 text-neutral-600">
                                                        <span class="p-2 bg-blue-100 rounded"
                                                            v-if="employee.employee_status === '1'">正社員</span>
                                                        <span class="p-2 bg-green-100 rounded"
                                                            v-if="employee.employee_status === '2'">派遣</span>
                                                        <span class="p-2 bg-red-100 rounded"
                                                            v-if="employee.employee_status === '3'">アルバイト</span>
                                                        <span class="p-2 bg-yellow-100 rounded"
                                                            v-if="employee.employee_status === '4'">請負</span>
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
