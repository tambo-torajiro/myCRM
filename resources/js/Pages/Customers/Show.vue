<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';


defineProps({
    customer: Object
})

const deleteCustomer = id => {
    Inertia.delete(route('customers.destroy', { customer: id }), {
        onBefore: () => confirm('本当に削除しますか？')
    })
}
</script>

<template>

    <Head title="顧客詳細" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                顧客詳細
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
                                                <label for="name" class="text-sm leading-7 text-gray-600">顧客名</label>
                                                <div id="name" name="name"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ customer.name }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="work_category"
                                                    class="text-sm leading-7 text-gray-600">業務カテゴリ</label>
                                                <div id="work_category" name="work_category"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 whitespace-pre-wrap border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ customer.work_category }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="tel" class="text-sm leading-7 text-gray-600">電話番号</label>
                                                <div id="tel" name="tel"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ customer.tel }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="email"
                                                    class="text-sm leading-7 text-gray-600">メールアドレス</label>
                                                <div id="email" name="email"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ customer.email }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="postcode"
                                                    class="text-sm leading-7 text-gray-600">郵便番号</label>
                                                <div id="postcode" name="postcode"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ customer.postcode }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="address" class="text-sm leading-7 text-gray-600">住所</label>
                                                <div id="address" name="address"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ customer.address }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="person_in_charge1"
                                                    class="text-sm leading-7 text-gray-600">担当者01</label>
                                                <div id="person_in_charge1" name="person_in_charge1"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ customer.person_in_charge1 }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="person_in_charge2"
                                                    class="text-sm leading-7 text-gray-600">担当者02</label>
                                                <div id="person_in_charge2" name="person_in_charge2"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ customer.person_in_charge2 }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="person_in_charge3"
                                                    class="text-sm leading-7 text-gray-600">担当者03</label>
                                                <div id="person_in_charge3" name="person_in_charge3"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ customer.person_in_charge3 }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="request_date"
                                                    class="text-sm leading-7 text-gray-600">依頼日</label>
                                                <div id="request_date" name="request_date"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ customer.request_date }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="w-full p-2">
                                            <div class="relative">
                                                <label for="memo" class="text-sm leading-7 text-gray-600">メモ</label>
                                                <div id="memo" name="memo"
                                                    class="w-full px-3 py-1 text-base leading-8 text-gray-700 border border-gray-300 rounded outline-none bg-gray-50">
                                                    {{ customer.memo }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex w-full p-2">
                                            <Link as="button" :href="route('customers.index')"
                                                class="inline-block px-8 py-2 mx-auto text-lg text-white bg-gray-400 border-0 rounded focus:outline-none hover:bg-gray-500">
                                            戻る
                                            </Link>
                                            <Link as="button" :href="route('customers.edit', { customer: customer.id })"
                                                class="inline-block px-8 py-2 mx-auto text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">
                                            編集
                                            </Link>
                                            <button @click="deleteCustomer(customer.id)"
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
