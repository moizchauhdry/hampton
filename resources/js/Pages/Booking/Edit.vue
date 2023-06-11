<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm, usePage } from "@inertiajs/vue3";
import VueDatePicker from "@vuepic/vue-datepicker";
import "@vuepic/vue-datepicker/dist/main.css";
import Multiselect from "@vueform/multiselect";
import moment from "moment";

const props = defineProps({
    edit_mode: Boolean,
    booking: Object,
});

const booking = usePage().props.booking;

var vehicles = [
    { value: "Black Car Service", label: "Black Car Service" },
    {
        value: "Executive Black Car Service",
        label: "Executive Black Car Service",
    },
    { value: "Black SUV Service", label: "Black SUV Service" },
    { value: "Strech limo", label: "Strech limo" },
    { value: "Van", label: "Van" },
    { value: "Bus", label: "Bus" },
    { value: "Sprinter", label: "Sprinter" },
];

var booking_plans = [
    { value: "Airport Pick up", label: "Airport Pick up" },
    { value: "Airport Drop off", label: "Airport Drop off" },
    { value: "Sight Seeing", label: "Sight Seeing" },
    { value: "Nightout", label: "Nightout" },
    { value: "Wedding", label: "Wedding" },
    { value: "Bachelor Party", label: "Bachelor Party" },
    { value: "Others (As Directed)", label: "Others (As Directed)" },
];

var payment_types = [
    { value: "Credit Card", label: "Credit Card" },
    { value: "Cash Payment", label: "Cash Payment" },
];

const form = useForm({
    booking_id: booking?.id,

    user_name: booking?.user_name,
    user_email: booking?.user_email,
    user_phone: booking?.user_phone,

    pickup: booking?.pickup,
    destination: booking?.destination,

    passengers_no: booking?.passengers_no,
    lugages_no: booking?.lugages_no,
    vehicles_no: booking?.vehicles_no,
    flight_no: booking?.flight_no,

    price: booking?.price,
    tip: booking?.tip,
    toll: booking?.toll,
    process_fee: booking?.process_fee,
    discount: booking?.discount,

    booking_date: booking?.booking_date,
    vehicle_name: booking?.vehicle_name,
    booking_plan: booking?.booking_plan,
    payment_type: booking?.payment_type,

    additional_msg: booking?.additional_msg,
});

const handleDate = (date) => {
    form.booking_date = moment(date).format("YYYY-MM-DD HH:mm");
};

const submit = () => {
    form.post(route("booking.update"));
};
</script>

<style src="@vueform/multiselect/themes/default.css"></style>

<template>
    <Head :title="edit_mode ? 'Edit Booking' : 'Create Booking'" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ edit_mode ? "Edit" : "Create" }} Booking
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form @submit.prevent="submit()" class="mt-6 space-y-6">
                            <div
                                class="grid gap-4 lg:grid-cols-3 md:grid-cols-2 grid-rows-1"
                            >
                                <div>
                                    <InputLabel for="user_name" value="Name" />

                                    <TextInput
                                        id="user_name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.user_name"
                                        required
                                        autofocus
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.user_name"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="user_email"
                                        value="Email"
                                    />

                                    <TextInput
                                        id="user_email"
                                        type="email"
                                        class="mt-1 block w-full"
                                        v-model="form.user_email"
                                        required
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.user_email"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="user_phone"
                                        value="Phone"
                                    />

                                    <TextInput
                                        id="user_phone"
                                        type="tel"
                                        class="mt-1 block w-full"
                                        v-model="form.user_phone"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.user_phone"
                                    />
                                </div>
                            </div>

                            <div
                                class="grid gap-4 lg:grid-cols-2 md:grid-cols-2 grid-rows-1"
                            >
                                <div>
                                    <InputLabel for="pickup" value="Pickup" />

                                    <TextInput
                                        id="pickup"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.pickup"
                                        required
                                        autofocus
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.pickup"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="destination"
                                        value="Destination"
                                    />

                                    <TextInput
                                        id="destination"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.destination"
                                        required
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.destination"
                                    />
                                </div>
                            </div>

                            <div
                                class="grid gap-4 lg:grid-cols-4 md:grid-cols-2 grid-rows-1"
                            >
                                <div>
                                    <InputLabel
                                        for="passengers_no"
                                        value="No. of Passengers"
                                    />

                                    <TextInput
                                        id="passengers_no"
                                        type="number"
                                        class="mt-1 block w-full"
                                        v-model="form.passengers_no"
                                        required
                                        autofocus
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.passengers_no"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="lugages_no"
                                        value="No. of Lugages"
                                    />

                                    <TextInput
                                        id="lugages_no"
                                        type="number"
                                        class="mt-1 block w-full"
                                        v-model="form.lugages_no"
                                        required
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.lugages_no"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="vehicles_no"
                                        value="No. of Vehicles"
                                    />

                                    <TextInput
                                        id="vehicles_no"
                                        type="number"
                                        class="mt-1 block w-full"
                                        v-model="form.vehicles_no"
                                        required
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.vehicles_no"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="flight_no"
                                        value="Flight No."
                                    />

                                    <TextInput
                                        id="flight_no"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.flight_no"
                                        required
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.flight_no"
                                    />
                                </div>
                            </div>

                            <div
                                class="grid gap-4 lg:grid-cols-5 md:grid-cols-2 grid-rows-1"
                            >
                                <div>
                                    <InputLabel for="price" value="Price" />

                                    <TextInput
                                        id="price"
                                        type="number"
                                        class="mt-1 block w-full"
                                        v-model="form.price"
                                        required
                                        autofocus
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.price"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="tip" value="Tip" />

                                    <TextInput
                                        id="tip"
                                        type="number"
                                        class="mt-1 block w-full"
                                        v-model="form.tip"
                                        required
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.tip"
                                    />
                                </div>

                                <div>
                                    <InputLabel for="toll" value="Toll" />

                                    <TextInput
                                        id="toll"
                                        type="number"
                                        class="mt-1 block w-full"
                                        v-model="form.toll"
                                        required
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.toll"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="process_fee"
                                        value="Processing Fee"
                                    />

                                    <TextInput
                                        id="process_fee"
                                        type="number"
                                        class="mt-1 block w-full"
                                        v-model="form.process_fee"
                                        required
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.process_fee"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="discount"
                                        value="Discount"
                                    />

                                    <TextInput
                                        id="discount"
                                        type="number"
                                        class="mt-1 block w-full"
                                        v-model="form.discount"
                                        required
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.discount"
                                    />
                                </div>
                            </div>

                            <div
                                class="grid gap-4 lg:grid-cols-4 md:grid-cols-2 grid-rows-1"
                            >
                                <div>
                                    <InputLabel
                                        for="booking_date"
                                        value=" Booking Date"
                                        class="mb-1"
                                    />

                                    <VueDatePicker
                                        v-model="form.booking_date"
                                        :teleport="true"
                                        :is-24="false"
                                        @update:model-value="handleDate"
                                    ></VueDatePicker>

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.booking_date"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="vehicle_name"
                                        value="Vehicle"
                                        class="mb-1"
                                    />

                                    <Multiselect
                                        v-model="form.vehicle_name"
                                        :options="vehicles"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.vehicle_name"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="booking_plan"
                                        value="Plan"
                                        class="mb-1"
                                    />

                                    <Multiselect
                                        v-model="form.booking_plan"
                                        :options="booking_plans"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.booking_plan"
                                    />
                                </div>

                                <div>
                                    <InputLabel
                                        for="payment_type"
                                        value="Payment Type"
                                        class="mb-1"
                                    />

                                    <Multiselect
                                        v-model="form.payment_type"
                                        :options="payment_types"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.payment_type"
                                    />
                                </div>
                            </div>

                            <div
                                class="grid gap-4 lg:grid-cols-1 md:grid-cols-2 grid-rows-1"
                            >
                                <div>
                                    <InputLabel
                                        for="additional_msg"
                                        value="Additional Message"
                                    />

                                    <textarea
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                        v-model="form.additional_msg"
                                        rows="7"
                                    ></textarea>

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.additional_msg"
                                    />
                                </div>
                            </div>

                            <div class="flex items-center gap-2">
                                <PrimaryButton :disabled="form.processing">
                                    {{ edit_mode ? "Update" : "Save" }}
                                </PrimaryButton>

                                <Link
                                    :href="route('booking.index')"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                                >
                                    Cancel
                                </Link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
