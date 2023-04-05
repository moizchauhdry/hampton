<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
defineProps({
    total_bookings: Object,
    new_customers: Object,
    repeat_customers: Object,
    card_payments: Object,
    cash_payments: Object,
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <!-- <div class="p-6 text-gray-900">You're logged in!</div> -->
                    <div
                        class="p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800"
                        id="stats"
                        role="tabpanel"
                        aria-labelledby="stats-tab"
                    >
                        <dl
                            class="grid max-w-screen-xl grid-cols-2 gap-8 p-4 mx-auto text-gray-900 sm:grid-cols-2 xl:grid-cols-5 dark:text-white sm:p-8"
                        >
                            <div
                                class="flex flex-col items-center justify-center"
                            >
                                <dt class="mb-2 text-3xl font-extrabold">
                                    {{ total_bookings }}
                                </dt>
                                <dd class="text-gray-500 dark:text-gray-400">
                                    Bookings
                                </dd>
                            </div>

                            <div
                                class="flex flex-col items-center justify-center"
                            >
                                <dt class="mb-2 text-3xl font-extrabold">
                                    {{ new_customers }}
                                </dt>
                                <dd class="text-gray-500 dark:text-gray-400">
                                    New Customers
                                </dd>
                            </div>

                            <div
                                class="flex flex-col items-center justify-center"
                            >
                                <dt class="mb-2 text-3xl font-extrabold">
                                    {{ repeat_customers }}
                                </dt>
                                <dd class="text-gray-500 dark:text-gray-400">
                                    Repeat Customers
                                </dd>
                            </div>

                            <div
                                class="flex flex-col items-center justify-center"
                            >
                                <dt class="mb-2 text-3xl font-extrabold">
                                    ${{ card_payments }}
                                </dt>
                                <dd class="text-gray-500 dark:text-gray-400">
                                    Card Payments
                                </dd>
                            </div>

                            <div
                                class="flex flex-col items-center justify-center"
                            >
                                <dt class="mb-2 text-3xl font-extrabold">
                                    ${{ cash_payments }}
                                </dt>
                                <dd class="text-gray-500 dark:text-gray-400">
                                    Cash Payments
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
