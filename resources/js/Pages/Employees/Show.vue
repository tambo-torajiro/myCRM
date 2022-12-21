<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';


defineProps({
    employee: Object
})

const deleteEmployee = id => {
    Inertia.delete(route('employees.destroy', { employee: id }), {
        onBefore: () => confirm('本当に削除しますか？')
    })
}
</script>

<template>

    <Head title="従業員詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                従業員詳細
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
                                                <label for="name" class="text-sm leading-7 text-gray-600">従業員名</label>
                                                <div id="name" name="name"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ employee.name }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="tel" class="text-sm leading-7 text-gray-600">電話番号</label>
                                                <div id="tel" name="tel"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ employee.tel }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="employee_status"
                                                    class="text-sm leading-7 text-gray-600">雇用形態</label>
                                                <div id="employee_status" name="employee_status"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    <span v-if="employee.employee_status === '1'">正社員</span>
                                                    <span v-if="employee.employee_status === '2'">派遣</span>
                                                    <span v-if="employee.employee_status === '3'">アルバイト</span>
                                                    <span v-if="employee.employee_status === '4'">請負</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="emergency_name"
                                                    class="text-sm leading-7 text-gray-600">緊急連絡先氏名</label>
                                                <div id="emergency_name" name="emergency_name"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ employee.emergency_name }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="emergency_contact"
                                                    class="text-sm leading-7 text-gray-600">緊急連絡先電話番号</label>
                                                <div id="emergency_contact" name="emergency_contact"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ employee.emergency_contact }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="	emergency_relation"
                                                    class="text-sm leading-7 text-gray-600">続柄</label>
                                                <div id="emergency_relation" name="emergency_relation"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ employee.emergency_relation }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex w-full p-2">
                                            <Link as="button" :href="route('employees.index')"
                                                class="inline-block px-8 py-2 mx-auto text-lg text-white bg-gray-400 border-0 rounded focus:outline-none hover:bg-gray-500">
                                            戻る
                                            </Link>
                                            <Link as="button" :href="route('employees.edit', { employee: employee.id })"
                                                class="inline-block px-8 py-2 mx-auto text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">
                                            編集
                                            </Link>
                                            <button @click="deleteEmployee(employee.id)"
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
