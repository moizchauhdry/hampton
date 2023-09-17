<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    bookings: Object,
});

const form = useForm({
    booking_id: null,
});

const deleteBooking = (id) => {
    form.booking_id = id;
    if (confirm("Are you sure you want to delete this record?")) {
        form.post(route("booking.destroy"));
    }
};
</script>

<template>
    <Head title="Booking" />

    <AuthenticatedLayout>
        <template #header>
            <div class="pb-5">
                <h2 class="float-left font-semibold text-xl text-gray-800 leading-tight">
                    Booking
                </h2>

                <Link
                    class="float-right focus:outline-none text-white bg-green-500 hover:bg-green-600 focus:ring-2 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-1.5 mr-2 mb-2 dark:focus:ring-green-900"
                    :href="route('booking.create')">Add Booking</Link>
            </div>
        </template>

        <div class="py-6 px-3">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
               
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 light:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
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
                                    <th scope="col" class="px-6 py-3" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-white border-b light:bg-gray-800 light:border-gray-700"
                                    v-for="booking in bookings.data">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white">
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
                                            class="text-white bg-yellow-400 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-100 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-yellow-400 dark:hover:bg-yellow-600 focus:outline-none dark:focus:ring-yellow-600"
                                            :href="route('booking.edit', booking.id)">Edit</Link>

                                        <a :href="route('booking.pdf', booking.id)"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                            target="_blank">Invoice</a>

                                        <a :href="route('booking.sms', booking.id)"
                                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">SMS</a>

                                    </td>
                                    <td>
                                        <a href="#" @click="deleteBooking(booking.id)"
                                            class="text-white bg-blue-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                                            Delete
                                        </a>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="my-3">
                    <template v-for="link in bookings.links">
                        <Link v-if="link.url" :href="link.url" v-html="link.label"
                            class="mr-1 mb-1 px-3 py-2 text-sm leading-4 text-gray-600 rounded"
                            :class="{ 'bg-blue-700 text-white': link.active, 'border hover:bg-white': !link.active }" />
                    </template>
                </div>
            </div>

        </div>


    </AuthenticatedLayout>
</template>
