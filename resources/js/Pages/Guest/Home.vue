
<script setup>
import Layout from "@/Layouts/Layout.vue";
import {Link} from "@inertiajs/vue3";

defineProps({
    articles: Object,
    imageUrl: String,
})

</script>

<template>
    <Layout class="bg-white min-h-screen py-16">
        <div class="max-w-7xl mx-auto px-6 space-y-24">
            <div
                v-for="article in articles"
                :key="article.id"
                class="flex flex-col md:flex-row items-center gap-12 md:gap-20 group"
            >
                <!-- IMAGE -->
                <div class="md:w-3/5 w-full h-72 md:h-96 flex-none overflow-hidden shadow-sm">
                    <Link
                        :href="route('guest.article.show', article.id)"
                        class="block md:w-[600px] w-full h-[350px] md:h-[500px] flex-none overflow-hidden shadow-sm"
                        tabindex="0"
                    >
                    <img
                        :src="article.imageUrl"
                        :alt="article.title"
                        class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-105"
                        loading="lazy"
                    />
                    </Link>
                </div>

                <!-- TEXT CONTENT -->
                <div class="md:w-3/5 w-full">
                    <h2 class="font-sans text-3xl md:text-s font-light text-gray-900 mb-3">
                        {{ article.title }}
                    </h2>
                    <p v-if="article.excerpt" class="font-sans text-s md:text-s text-gray-600 leading-relaxed mb-6">
                        {{ article.excerpt }}
                    </p>
                    <div class="text-gray-400 text-sm md:text-base">
                        {{ article.date }}
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>
