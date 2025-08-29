<template>
    <Layout title="Edit Article">
        <Head title="Edit Article" />

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="mb-6">
                            <h1 class="text-2xl font-bold text-gray-900">Edit Article</h1>
                        </div>

                        <form @submit.prevent="updateArticle" enctype="multipart/form-data">
                            <div class="mb-4">
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                    Title
                                </label>
                                <input
                                    id="title"
                                    v-model="form.title"
                                    type="text"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    :class="{ 'border-red-500': errors.title }"
                                    required
                                />
                                <p v-if="errors.title" class="mt-1 text-sm text-red-600">
                                    {{ errors.title }}
                                </p>
                            </div>

                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                    Description
                                </label>
                                <textarea
                                    id="description"
                                    v-model="form.description"
                                    rows="6"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    :class="{ 'border-red-500': errors.description }"
                                    required
                                />
                                <p v-if="errors.description" class="mt-1 text-sm text-red-600">
                                    {{ errors.description }}
                                </p>
                            </div>

                            <div class="mb-4">
                                <label for="date" class="block text-sm font-medium text-gray-700 mb-2">
                                    Date
                                </label>
                                <input
                                    id="date"
                                    v-model="form.date"
                                    type="date"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    :class="{ 'border-red-500': errors.date }"
                                    required
                                />
                                <p v-if="errors.date" class="mt-1 text-sm text-red-600">
                                    {{ errors.date }}
                                </p>
                            </div>

                            <div class="mb-4">
                                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                    Image
                                </label>
                                <input
                                    id="image"
                                    ref="imageInput"
                                    type="file"
                                    accept="image/*"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                    :class="{ 'border-red-500': errors.image }"
                                    @change="handleImageChange"
                                />
                                <p v-if="errors.image" class="mt-1 text-sm text-red-600">
                                    {{ errors.image }}
                                </p>

                                <!-- Show current image if exists -->
                                <div v-if="imageUrl && !newImagePreview" class="mt-4">
                                    <p class="text-sm text-gray-600 mb-2">Current image:</p>
                                    <img :src="imageUrl" alt="Current article image" class="rounded shadow w-32 h-auto"/>
                                </div>

                                <!-- Show preview of new image -->
                                <div v-if="newImagePreview" class="mt-4">
                                    <p class="text-sm text-gray-600 mb-2">New image preview:</p>
                                    <img :src="newImagePreview" alt="New article image preview" class="rounded shadow w-32 h-auto"/>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <Link
                                    :href="route('admin.articles.index')"
                                    class="inline-block px-4 py-2 text-sm text-gray-600 hover:text-gray-800 hover:underline"
                                >
                                    ← Back to articles
                                </Link>

                                <div class="flex space-x-3">
                                    <button
                                        type="button"
                                        @click="$inertia.visit(route('admin.articles.show', article.id))"
                                        class="px-4 py-2 text-sm text-gray-600 bg-gray-200 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500"
                                    >
                                        Cancel
                                    </button>
                                    <button
                                        type="submit"
                                        :disabled="processing"
                                        class="px-4 py-2 text-sm text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 disabled:opacity-50"
                                    >
                                        {{ processing ? 'Updating...' : 'Update Article' }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import Layout from "@/Layouts/Layout.vue";
import { ref } from 'vue'

const props = defineProps({
    article: Object,
    imageUrl: String,
    errors: Object,
})

const form = useForm({
    title: props.article.title,
    description: props.article.description,
    date: props.article.date,
    image: null,
    _method: 'PUT'
})

const newImagePreview = ref(null)

const handleImageChange = (event) => {
    const file = event.target.files[0]
    if (file) {
        form.image = file

        // Create preview
        const reader = new FileReader()
        reader.onload = (e) => {
            newImagePreview.value = e.target.result
        }
        reader.readAsDataURL(file)
    } else {
        form.image = null
        newImagePreview.value = null
    }
}

const updateArticle = () => {
    form.post(route('admin.articles.update', props.article.id), {
        forceFormData: true,
        preserveScroll: true
    })
}
</script>
