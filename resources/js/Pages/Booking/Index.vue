<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    bookings: Object,
});
</script>

<template>
    <Head title="Booking" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Booking
            </h2>
        </template>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-4">
                <Link
                    class="focus:outline-none text-white bg-green-600 hover:bg-green-500 focus:ring-2 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-green-900"
                    :href="route('booking.create')"
                    >Add Booking</Link
                >
            </div>
        </div>
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto">
                        <table
                            class="w-full text-sm text-left text-gray-500 light:text-gray-400"
                        >
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400"
                            >
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Customer name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Pickup
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Destination
                                    </th>
                                    <th scope="col" class="px-6 py-3">Price</th>
                                    <th scope="col" class="px-6 py-3">Date</th>
                                    <th scope="col" class="px-6 py-3"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    class="bg-white border-b light:bg-gray-800 light:border-gray-700"
                                    v-for="booking in bookings.data"
                                >
                                    <th
                                        scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white"
                                    >
                                        {{ booking.user_name }} <br />
                                        {{ booking.user_email }} <br />
                                        {{ booking.user_phone }} <br />
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ booking.pickup }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ booking.destination }}
                                    </td>
                                    <td class="px-6 py-4">
                                        ${{ booking.price }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ booking.booking_date }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <Link
                                            class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-2 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900"
                                            :href="
                                                route(
                                                    'booking.edit',
                                                    booking.id
                                                )
                                            "
                                            >Edit</Link
                                        >
                                        <a
                                            :href="
                                                route('booking.pdf', booking.id)
                                            "
                                            class="btn btn-primary btn-sm m-1"
                                            target="_blank"
                                            >Print Invoice</a
                                        >
                                        <!-- <Link
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                            :href="
                                                route(
                                                    'booking.edit',
                                                    booking.id
                                                )
                                            "
                                            >Detail</Link
                                        >

                                        <button
                                            type="button"
                                            class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                        >
                                            Delete
                                        </button>

                                        <button
                                            type="button"
                                            class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"
                                        >
                                            Invoice
                                        </button> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
