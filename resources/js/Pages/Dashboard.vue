<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

const page = usePage();
const user = page.props.auth?.user || { name: 'Guest' };
</script>

<template>
    <Head title="My Budget" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">My Budget</h2>
        </template>

        <div class="py-12 bg-blue-50 min-h-screen">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-2">
                        Welcome back, {{ user.name }}!
                    </h3>
                    <p class="text-gray-500">Here's a quick overview of your budget:</p>
                </div>

                <!-- Budget summary cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
                        <h4 class="text-gray-500">Total Income</h4>
                        <p class="mt-2 text-3xl font-bold text-green-500">$0.00</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
                        <h4 class="text-gray-500">Total Expenses</h4>
                        <p class="mt-2 text-3xl font-bold text-red-500">$0.00</p>
                    </div>
                    <div class="bg-white rounded-2xl shadow-lg p-6 text-center">
                        <h4 class="text-gray-500">Balance</h4>
                        <p class="mt-2 text-3xl font-bold text-blue-500">$0.00</p>
                    </div>
                </div>

                <!-- Action button -->
                <div class="flex justify-center mt-6">
                    <Link
                        href="#"
                        class="bg-blue-400 hover:bg-blue-500 text-white px-6 py-3 rounded-xl font-semibold shadow-md"
                    >
                        Add Transaction
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<style scoped>
.bg-blue-50 {
    background-color: #eff6ff;
}
</style>
