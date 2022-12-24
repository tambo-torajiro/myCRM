<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue';
import VallidationErrors from '@/Components/VallidationErrors.vue';
import { Core as YubinBangoCore } from "yubinbango-core2"

const form = reactive({
    name: null,
    work_category: null,
    tel: null,
    email: null,
    postcode: null,
    address: null,
    person_in_charge1: null,
    person_in_charge2: null,
    person_in_charge3: null,
    request_date: null,
    memo: null,
})

const fetchAddress = () => {
    new YubinBangoCore(String(form.postcode), (value) => {
        // console.log(value)
        form.address = value.region + value.locality + value.street
    })

    const storeCustomer = () => {
        Inertia.post('/customers', form)
    }


}
</script>

<template>

    <Head title="顧客登録" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                顧客登録
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <VallidationErrors class="mb-4" />
                        <section class="relative text-gray-600 body-font">
                            <form @submit.prevent="storeCustomer">
                                <div class="container px-5 py-8 mx-auto">
                                    <div class="mx-auto lg:w-1/2 md:w-2/3">
                                        <div class="flex flex-wrap -m-2">

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="name" class="text-sm leading-7 text-gray-600">顧客名<span
                                                            class="ml-2 text-sm text-blue-300">(必須)</span></label>
                                                    <input type="text" id="name" name="name" v-model="form.name"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="work_category"
                                                        class="text-sm leading-7 text-gray-600">業務カテゴリ<span
                                                            class="ml-2 text-sm text-blue-300">(必須)</span></label>
                                                    <input type="text" id="work_category" name="work_category"
                                                        v-model="form.work_category"
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
                                                    <label for="email"
                                                        class="text-sm leading-7 text-gray-600">メールアドレス</label>
                                                    <input type="email" id="email" name="email" v-model="form.email"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="postcode"
                                                        class="text-sm leading-7 text-gray-600">郵便番号<span
                                                            class="ml-2 text-sm text-blue-300">(必須)</span></label>
                                                    <input type="number" id="postcode" name="postcode"
                                                        v-model="form.postcode" @change="fetchAddress"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="address"
                                                        class="text-sm leading-7 text-gray-600">住所</label>
                                                    <input type="text" id="address" name="address"
                                                        v-model="form.address"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="person_in_charge1"
                                                        class="text-sm leading-7 text-gray-600">担当者01<span
                                                            class="ml-2 text-sm text-blue-300">(必須)</span></label>
                                                    <input type="text" id="person_in_charge1" name="person_in_charge1"
                                                        v-model="form.person_in_charge1"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="person_in_charge2"
                                                        class="text-sm leading-7 text-gray-600">担当者02</label>
                                                    <input type="text" id="person_in_charge2" name="person_in_charge2"
                                                        v-model="form.person_in_charge2"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="person_in_charge3"
                                                        class="text-sm leading-7 text-gray-600">担当者03</label>
                                                    <input type="text" id="person_in_charge3" name="person_in_charge3"
                                                        v-model="form.person_in_charge3"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="request_date"
                                                        class="text-sm leading-7 text-gray-600">依頼日<span
                                                            class="ml-2 text-sm text-blue-300">(必須)</span></label>
                                                    <input type="date" id="request_date" name="request_date"
                                                        v-model="form.request_date"
                                                        class="w-full px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200" />
                                                </div>
                                            </div>

                                            <div class="w-full p-2">
                                                <div class="relative">
                                                    <label for="memo" class="text-sm leading-7 text-gray-600">メモ</label>
                                                    <textarea id="memo" name="memo" v-model="form.memo"
                                                        class="w-full h-32 px-3 py-1 text-base leading-8 text-gray-700 transition-colors duration-200 ease-in-out bg-gray-100 bg-opacity-50 border border-gray-300 rounded outline-none focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200">
                                                        </textarea>
                                                </div>
                                            </div>

                                            <div class="flex w-full p-2">
                                                <Link as="button" :href="route('customers.index')"
                                                    class="inline-block px-8 py-2 mx-auto text-lg text-white bg-gray-400 border-0 rounded focus:outline-none hover:bg-gray-500">
                                                戻る
                                                </Link>
                                                <button
                                                    class="px-8 py-2 mx-auto text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">
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
