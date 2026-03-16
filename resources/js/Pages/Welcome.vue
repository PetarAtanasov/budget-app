<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>

<template>
    <Head title="Budget App" />

    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-budget-light selection:bg-coral selection:text-white">
        
        <!-- Login / Register -->
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-blue-700 hover:text-blue-900"
                >Dashboard</Link
            >
            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-blue-700 hover:text-blue-900"
                    >Log in</Link
                >
                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ms-4 font-semibold text-green-600 hover:text-green-800"
                    >Register</Link
                >
            </template>
        </div>

        <!-- Main Content -->
        <div class="max-w-7xl mx-auto p-6 lg:p-8 text-center">
            <h1 class="text-5xl font-bold text-blue-600">Welcome to Budget App</h1>
            <p class="mt-4 text-gray-600 text-lg">
                Track your expenses, manage your money, and stay on top of your budget.
            </p>

            <!-- Features -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <div class="p-6 bg-blue-50 rounded-lg shadow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold mb-2 text-blue-700">Add Expenses</h2>
                    <p class="text-gray-700 text-sm">
                        Quickly add your daily expenses and keep track of where your money goes.
                    </p>
                </div>
                <div class="p-6 bg-green-50 rounded-lg shadow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold mb-2 text-green-700">View Reports</h2>
                    <p class="text-gray-700 text-sm">
                        See monthly or yearly summaries to understand your spending habits.
                    </p>
                </div>
                <div class="p-6 bg-yellow-50 rounded-lg shadow hover:shadow-lg transition">
                    <h2 class="text-xl font-semibold mb-2 text-yellow-700">Set Budgets</h2>
                    <p class="text-gray-700 text-sm">
                        Set monthly budgets and get alerts when you’re approaching your limits.
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-16 text-gray-500 text-sm">
                &copy; 2026 Budget App
            </div>
        </div>
    </div>
</template>

<style>
.bg-budget-light {
    background: linear-gradient(to bottom right, #d0f0fd, #fef9d7);
}
.selection\:bg-coral::selection {
    background-color: #ff7f50;
}
</style>