
<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    title: String,
    canLogin: Boolean,
    canRegister: Boolean,
    auth: Object,
});
</script>

<template>
    <Head :title="title" />

    <div class="flex flex-col min-h-screen bg-[#fafaf7]">
        <!-- Navbar -->
        <header class="p-4 flex justify-between items-center">
            <Link href="/" class="text-lg font-bold text-white-100 dark:text-white-100">
                GIJS
            </Link>

            <nav>
<!--                to be decided-->
            </nav>
        </header>

        <!-- Main Content -->
        <main class="flex-grow p-6">
            <slot />
        </main>

        <!-- Footer -->
        <footer class="p-4 text-center border-t dark:border-gray-700">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Gijs Barendsen © {{ new Date().getFullYear() }} All rights reserved
            </p>
        </footer>
    </div>
</template>
