<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
    resume: Object,
});
</script>

<template>
    <AuthenticatedLayout>
        <Head :title="`${resume.name}'s Resume`" />
        <div class="max-w-2xl mx-auto mt-10 bg-white shadow rounded-lg p-6">
            <h2 class="text-3xl font-bold mb-2">{{ resume.name }}</h2>
            <div class="text-lg text-gray-700 mb-2">{{ resume.headline }}</div>
            <div class="mb-4">{{ resume.summary }}</div>
            <div class="mb-4 text-sm text-gray-500">
                <div v-if="resume.email"><b>Email:</b> {{ resume.email }}</div>
                <div v-if="resume.phone"><b>Phone:</b> {{ resume.phone }}</div>
                <div v-if="resume.location"><b>Location:</b> {{ resume.location }}</div>
                <div v-if="resume.linkedin"><b>LinkedIn:</b> <a :href="resume.linkedin" class="text-blue-500" target="_blank">{{ resume.linkedin }}</a></div>
            </div>
            <div v-if="resume.experiences?.length" class="mb-4">
                <h3 class="text-xl font-semibold mb-2">Experience</h3>
                <ul>
                    <li v-for="exp in resume.experiences" :key="exp.id" class="mb-2">
                        <div class="font-medium">{{ exp.company }} - {{ exp.role }}</div>
                        <div class="text-sm text-gray-500">{{ exp.start_date }} – {{ exp.is_current ? 'Present' : exp.end_date }}</div>
                        <div class="text-sm">{{ exp.description }}</div>
                    </li>
                </ul>
            </div>
            <div v-if="resume.education?.length" class="mb-4">
                <h3 class="text-xl font-semibold mb-2">Education</h3>
                <ul>
                    <li v-for="ed in resume.education" :key="ed.id" class="mb-2">
                        <div class="font-medium">{{ ed.institution }} - {{ ed.degree }}</div>
                        <div class="text-sm text-gray-500">{{ ed.start_date }} – {{ ed.end_date }}</div>
                        <div class="text-sm">{{ ed.description }}</div>
                    </li>
                </ul>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
