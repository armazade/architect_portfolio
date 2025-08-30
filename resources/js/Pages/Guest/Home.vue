
<script setup>
import Layout from "@/Layouts/Layout.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    articles: Object,
    imageUrl: String,
})

</script>

<template>
    <Layout title="Home">
        <div class="py-2">
            <div class="w-full max-w-6xl mx-auto space-y-12">
                <!-- Articles -->
                <article
                    v-for="article in articles"
                    :key="article.id"
                    class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start"
                >
                    <Link :href="route('guest.article.show', article.id)" class="block">
                        <!-- Image -->
                        <div class="w-full">
                            <img
                                v-if="article.imageUrl"
                                :src="article.imageUrl"
                                :alt="article.title"
                                class="w-full h-auto object-contain"
                            />
                            <div
                                v-else
                                class="w-full aspect-[4/3] bg-gray-100 flex items-center justify-center text-gray-400"
                            >
                                No Image
                            </div>
                        </div>
                    </Link>

                    <!-- Content -->
                    <div class="space-y-4">
                        <Link :href="route('guest.article.show', article.id)">
                            <h2 class="text-2xl font-medium text-gray-900 hover:text-gray-600 transition-colors">
                                {{ article.title }}
                            </h2>
                        </Link>
                        <p v-if="article.excerpt" class="text-gray-600 leading-relaxed">
                            {{ article.excerpt }}
                        </p>
                        <p v-if="article.date" class="text-sm text-gray-400">
                            {{ article.date }}
                        </p>
                    </div>
                </article>

                <!-- Empty State -->
                <div v-if="!articles.length" class="text-center py-12">
                    <p class="text-gray-500">No articles found.</p>
                </div>
            </div>
        </div>
    </Layout>
</template>
