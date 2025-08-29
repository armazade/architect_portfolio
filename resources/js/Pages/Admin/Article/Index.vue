<template>
    <Layout title="Articles">
        <Head title="Manage Articles" />

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="flex items-center justify-between mb-6">
                            <h1 class="text-2xl font-bold text-gray-900">Manage Articles</h1>
                            <Link
                                :href="route('admin.articles.create')"
                                class="px-4 py-2 text-sm text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            >
                                Create New Article
                            </Link>
                        </div>

                        <!-- Success message -->
                        <div v-if="flash.success" class="mb-4 p-4 text-green-800 bg-green-100 border border-green-200 rounded-md">
                            {{ flash.success }}
                        </div>

                        <!-- Articles list -->
                        <div v-if="articles.length === 0" class="text-center py-8">
                            <p class="text-gray-500">No articles found.</p>
                            <Link
                                :href="route('admin.articles.create')"
                                class="inline-block mt-4 text-indigo-600 hover:underline"
                            >
                                Create your first article
                            </Link>
                        </div>

                        <div v-else class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            <div
                                v-for="article in articles"
                                :key="article.id"
                                class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow"
                            >
                                <div v-if="article.imageUrl" class="mb-4">
                                    <img
                                        :src="article.imageUrl"
                                        :alt="article.title"
                                        class="w-full h-48 object-cover rounded-md"
                                    />
                                </div>

                                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                    {{ article.title }}
                                </h3>

                                <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                    {{ article.description }}
                                </p>

                                <p class="text-xs text-gray-500 mb-4">
                                    Created: {{ article.created_at }}
                                </p>

                                <div class="flex items-center justify-between">
                                    <Link
                                        :href="route('admin.articles.show', article.id)"
                                        class="text-sm text-indigo-600 hover:underline"
                                    >
                                        View
                                    </Link>

                                    <div class="flex space-x-2">
                                        <Link
                                            :href="route('admin.articles.edit', article.id)"
                                            class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded hover:bg-blue-200 transition-colors"
                                        >
                                            Edit
                                        </Link>

                                        <button
                                            @click="deleteArticle(article)"
                                            class="px-3 py-1 text-xs text-red-600 bg-red-100 rounded hover:bg-red-200 transition-colors"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
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
                    Are you sure you want to delete "{{ articleToDelete?.title }}"? This action cannot be undone.
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

defineProps({
    articles: Array,
    flash: Object,
})

const showDeleteModal = ref(false)
const articleToDelete = ref(null)

const deleteArticle = (article) => {
    articleToDelete.value = article
    showDeleteModal.value = true
}

const confirmDelete = () => {
    if (articleToDelete.value) {
        router.delete(route('admin.articles.destroy', articleToDelete.value.id), {
            onSuccess: () => {
                showDeleteModal.value = false
                articleToDelete.value = null
            }
        })
    }
}
</script>

<style>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
