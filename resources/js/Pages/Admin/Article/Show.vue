<template>
    <Layout title="Article Details">
        <Head :title="article.title" />

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mb-6 flex items-center justify-between">
                            <Link
                                :href="route('admin.articles.index')"
                                class="inline-block text-sm text-indigo-600 hover:underline"
                            >
                                ← Back to articles
                            </Link>

                            <div class="flex space-x-3">
                                <Link
                                    :href="route('admin.articles.edit', article.id)"
                                    class="px-4 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                >
                                    Edit Article
                                </Link>

                                <button
                                    @click="showDeleteModal = true"
                                    class="px-4 py-2 text-sm text-white bg-red-600 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500"
                                >
                                    Delete Article
                                </button>
                            </div>
                        </div>

                        <div v-if="imageUrl" class="mb-6">
                            <img :src="imageUrl" alt="Article image" class="rounded shadow w-full max-w-2xl h-auto"/>
                        </div>

                        <h1 class="text-3xl font-bold mb-4 text-gray-900">{{ article.title }}</h1>

                        <div class="prose max-w-none">
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ article.description }}</p>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-200">
                            <p class="text-sm text-gray-500">
                                Created: {{ new Date(article.created_at).toLocaleDateString() }}
                            </p>
                            <p v-if="article.updated_at !== article.created_at" class="text-sm text-gray-500">
                                Last updated: {{ new Date(article.updated_at).toLocaleDateString() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div
            v-if="showDeleteModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
        >
            <div class="bg-white p-6 rounded-lg shadow-xl max-w-md w-full mx-4">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    Delete Article
                </h3>
                <p class="text-gray-600 mb-6">
                    Are you sure you want to delete "{{ article.title }}"? This action cannot be undone.
                </p>
                <div class="flex justify-end space-x-3">
                    <button
                        @click="showDeleteModal = false"
                        class="px-4 py-2 text-sm text-gray-600 bg-gray-200 rounded-md hover:bg-gray-300"
                    >
                        Cancel
                    </button>
                    <button
                        @click="confirmDelete"
                        class="px-4 py-2 text-sm text-white bg-red-600 rounded-md hover:bg-red-700"
                    >
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { Head, Link, router } from '@inertiajs/vue3'
import Layout from "@/Layouts/Layout.vue";
import { ref } from 'vue'

const props = defineProps({
    article: Object,
    imageUrl: String,
})

const showDeleteModal = ref(false)

const confirmDelete = () => {
    router.delete(route('admin.articles.destroy', props.article.id), {
        onSuccess: () => {
            // Will redirect to index after successful deletion
        }
    })
}
</script>
