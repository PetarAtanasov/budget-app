<script setup>
import { ref } from 'vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import { Link } from '@inertiajs/vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
  <div class="min-h-screen bg-blue-50">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm">
      <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
          <!-- Logo as coin -->
          <Link :href="route('dashboard')" class="flex items-center">
            <div class="h-9 w-9 bg-yellow-400 rounded-full flex items-center justify-center text-white font-bold text-lg">
              ₿
            </div>
            <span class="ml-2 font-semibold text-blue-700 text-lg">BudgetApp</span>
          </Link>

          <!-- Dropdown -->
          <div class="hidden sm:flex sm:items-center">
            <Dropdown align="right" width="48">
              <template #trigger>
                <button
                  type="button"
                  class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-blue-600 bg-white hover:text-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-300 transition"
                >
                  {{ $page.props.auth?.user?.name || 'User' }}
                  <svg class="ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
              </template>

              <template #content>
                <DropdownLink :href="route('profile.edit')">Profile</DropdownLink>
                <DropdownLink :href="route('logout')" method="post" as="button">Log Out</DropdownLink>
              </template>
            </Dropdown>
          </div>

          <!-- Hamburger -->
          <div class="-mr-2 flex items-center sm:hidden">
            <button
              @click="showingNavigationDropdown = !showingNavigationDropdown"
              class="inline-flex items-center justify-center p-2 rounded-md text-blue-500 hover:text-blue-700 hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-300 transition"
            >
              <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path
                  :class="{ hidden: showingNavigationDropdown, 'inline-flex': !showingNavigationDropdown }"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16M4 18h16"
                />
                <path
                  :class="{ hidden: !showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M6 18L18 6M6 6l12 12"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Responsive Menu -->
      <div :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }" class="sm:hidden bg-white border-t border-blue-100">
        <div class="pt-2 pb-3 space-y-1">
          <Link :href="route('dashboard')" class="block px-4 py-2 text-blue-700 font-medium rounded hover:bg-blue-100">Dashboard</Link>
        </div>
        <div class="pt-4 pb-1 border-t border-blue-100">
          <div class="px-4">
            <div class="font-medium text-base text-blue-700">{{ $page.props.auth?.user?.name || 'User' }}</div>
            <div class="font-medium text-sm text-blue-500">{{ $page.props.auth?.user?.email || '' }}</div>
          </div>
          <div class="mt-3 space-y-1">
            <Link :href="route('profile.edit')" class="block px-4 py-2 text-blue-700 rounded hover:bg-blue-100">Profile</Link>
            <Link :href="route('logout')" method="post" as="button" class="block px-4 py-2 text-blue-700 rounded hover:bg-blue-100">Log Out</Link>
          </div>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="bg-blue-100 py-4 px-6 rounded-b-lg" v-if="$slots.header">
      <slot name="header" />
    </header>

    <!-- Page Content -->
    <main class="px-4 sm:px-6 lg:px-8 py-6">
      <slot />
    </main>
  </div>
</template>

<style scoped>
/* Pastel light blue */
.bg-blue-50 { background-color: #e6f0ff; }
.bg-blue-100 { background-color: #cce0ff; }
</style>