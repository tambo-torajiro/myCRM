<script setup>
import FlashMessage from '@/Components/FlashMessage.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import { onMounted, ref } from 'vue';
import Pagination from '@/Components/Pagination.vue';
import { Inertia } from '@inertiajs/inertia';

const props = defineProps({
    customers: Object
})

const search = ref('')

onMounted(() => {
    console.log(props.customers)
})

const searchCustomers = () => {
    Inertia.get(route('customers.index', { search: search.value }))
}
</script>

<template>

    <Head title="顧客一覧" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">顧客一覧</h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <section>
                            <FlashMessage />

                            <div class="relative px-4 py-2 sm:px-6 lg:py-16 lg:px-8">
                                <div class="relative mx-auto max-w-7xl">
                                    <div class="my-4">
                                        <label for="search"
                                            class="p-2 mr-4 text-white bg-pink-500 rounded">顧客名・電話番号検索</label>
                                        <input type="text" name="search" v-model="search"
                                            class="border-gray-400 rounded-sm">
                                        <button class="px-2 py-2 ml-4 text-white bg-blue-300 rounded hover:bg-blue-500"
                                            @click="searchCustomers">GO</button>
                                    </div>
                                    <div class="flex w-full pl-4 mx-auto">
                                        <Link as="button" :href="route('customers.create')"
                                            class="flex px-6 py-2 ml-auto text-lg text-white bg-indigo-500 border-0 rounded focus:outline-none hover:bg-indigo-600">
                                        顧客登録</Link>
                                    </div>

                                    <div class="flex flex-wrap justify-between w-full pl-4 mx-auto my-4">
                                        <div>
                                            全<span class="px-2 font-bold">{{
                                                    customers.total
                                            }}</span>件のデータ
                                        </div>
                                        <div>
                                            <span class="px-2 ml-8 font-bold">{{
                                                    customers.last_page
                                            }}</span>ページ中<span class="px-2 font-bold">
                                                {{ customers.current_page }}</span>ページ目を表示中
                                        </div>
                                    </div>
                                    <div class="flex justify-end">
                                        <Pagination class="mt-2" :links="customers.links"></Pagination>
                                    </div>
                                    <div class="grid max-w-lg gap-5 mx-auto lg:grid-cols-3 lg:max-w-none">
                                        <div v-for="customer in customers.data" :key="customer.id"
                                            class="flex flex-col my-4 overflow-hidden rounded-lg shadow-lg hover:bg-neutral-100 hover:shadow-slate-400">
                                            <div class="flex-shrink-0">
                                                <img class="object-cover w-full h-48" src="/images/rabbit.jpg" alt="">
                                            </div>
                                            <div class="flex flex-col justify-between flex-1 p-6 bg-white">
                                                <div class="flex-1">

                                                    <p class="text-xl font-semibold text-neutral-600">
                                                        <Link
                                                            class="p-2 text-blue-400 bg-gray-100 rounded hover:text-orange-400 hover:bg-purple-200"
                                                            :href="route('customers.show', { customer: customer.id })">
                                                        {{ customer.id }}
                                                        </Link>

                                                    </p>

                                                    <p class="mt-4 text-xl font-semibold text-gray-500">
                                                        {{ customer.name }}
                                                    </p>
                                                    <p
                                                        class="mt-4 text-xl font-semibold whitespace-pre-wrap text-neutral-600">
                                                        {{ customer.work_category }}
                                                    </p>
                                                    <p class="mt-4 text-xl font-semibold text-neutral-600">
                                                        {{ customer.tel }}
                                                    </p>
                                                    <p class="mt-4 text-xl font-semibold text-neutral-600">
                                                        {{ customer.request_date }}
                                                    </p>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <Pagination class="mt-6" :links="customers.links"></Pagination>
                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
