<script setup>
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>

    <Head title="Log in" />

    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Budget App Login</h1>
            <p class="text-gray-500 mb-6">Enter your email and password to access your dashboard</p>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>

            <form @submit.prevent="submit" class="space-y-4">
                <!-- Email -->
                <div>
                    <InputLabel for="email" value="Email" />
                    <TextInput id="email" type="email"
                        class="mt-1 block w-full border-gray-300 rounded-lg focus:ring-blue-300 focus:border-blue-300"
                        v-model="form.email" required autofocus autocomplete="username" />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <!-- Password -->
                <div>
                    <InputLabel for="password" value="Password" />
                    <TextInput id="password" type="password"
                        class="mt-1 block w-full border-gray-300 rounded-lg focus:ring-blue-300 focus:border-blue-300"
                        v-model="form.password" required autocomplete="current-password" />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </div>

                <!-- Buttons / Links -->
                <div class="flex items-center justify-between mt-4">
                    <Link v-if="canResetPassword" :href="route('password.request')"
                        class="underline text-sm text-gray-500 hover:text-gray-700">
                        Forgot your password?
                    </Link>

                    <PrimaryButton class="ml-4 bg-blue-400 hover:bg-blue-500 text-white w-full py-2 rounded-lg"
                        :class="{ 'opacity-50': form.processing }" :disabled="form.processing">
                        Log in
                    </PrimaryButton>
                </div>
            </form>

            <p class="mt-6 text-center text-gray-700 text-sm">
                Don't have an account?
                <Link :href="route('register')" class="text-green-600 hover:text-green-800 font-medium">Register</Link>
            </p>
        </div>
    </div>
</template>

<style scoped>
/* леко допълнителен пастелен фон */
.bg-blue-50 {
    background-color: #fff0f6;
}
</style>