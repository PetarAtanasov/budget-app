<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Checkbox from '@/Components/Checkbox.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>

    <Head title="Register" />

    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Create Your Account</h1>
            <p class="text-gray-500 mb-6">Fill in your details to start managing your budget</p>

            <form @submit.prevent="submit" class="space-y-4">
                <!-- Name -->
                <div>
                    <InputLabel for="name" value="Name" />
                    <TextInput id="name" type="text"
                        class="mt-1 block w-full border-gray-300 rounded-lg focus:ring-blue-300 focus:border-blue-300"
                        v-model="form.name" required autofocus autocomplete="name" />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <!-- Email -->
                <div>
                    <InputLabel for="email" value="Email" />
                    <TextInput id="email" type="email"
                        class="mt-1 block w-full border-gray-300 rounded-lg focus:ring-blue-300 focus:border-blue-300"
                        v-model="form.email" required autocomplete="username" />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <!-- Password -->
                <div>
                    <InputLabel for="password" value="Password" />
                    <TextInput id="password" type="password"
                        class="mt-1 block w-full border-gray-300 rounded-lg focus:ring-blue-300 focus:border-blue-300"
                        v-model="form.password" required autocomplete="new-password" />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <InputLabel for="password_confirmation" value="Confirm Password" />
                    <TextInput id="password_confirmation" type="password"
                        class="mt-1 block w-full border-gray-300 rounded-lg focus:ring-blue-300 focus:border-blue-300"
                        v-model="form.password_confirmation" required autocomplete="new-password" />
                    <InputError class="mt-2" :message="form.errors.password_confirmation" />
                </div>

                <!-- Buttons / Links -->
                <div class="flex items-center justify-between mt-4">
                    <Link :href="route('login')" class="underline text-sm text-gray-500 hover:text-gray-700">
                        Already registered?
                    </Link>

                    <PrimaryButton class="ml-4 bg-green-400 hover:bg-green-500 text-white w-full py-2 rounded-lg"
                        :class="{ 'opacity-50': form.processing }" :disabled="form.processing">
                        Register
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </div>
</template>

<style scoped>
/* леко допълнителен пастелен фон */
.bg-pink-50 {
    background-color: #fff0f6;
}
</style>