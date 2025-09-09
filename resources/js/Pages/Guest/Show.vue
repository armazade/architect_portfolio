<template>
    <Layout title="Home">
        <Head :title="article.title" />

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
                        <!-- Image -->
                        <div v-if="imageUrl" class="flex justify-center">
                            <img
                                :src="imageUrl"
                                alt="Article image"
                                class="rounded shadow max-w-screen-xl w-full h-auto object-contain"
                            />
                        </div>

                        <!-- Content -->
                        <div>
                            <h1 class="text-3xl font-bold mb-4">{{ article.title }}</h1>
                            <div class="prose max-w-none">
                                <p class="text-gray-700 leading-relaxed">{{ article.description }}</p>
                            </div>
                            <Link
                                :href="route('guest.index')"
                                class="inline-block mt-6 text-sm text-indigo-600 hover:underline"
                            >
                                ← Back to articles
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3'
import Layout from "@/Layouts/Layout.vue";

defineProps({
    article: Object,
    imageUrl: String,
})
</script>

