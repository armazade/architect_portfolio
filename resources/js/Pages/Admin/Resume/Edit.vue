<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    resume: Object,
});

const form = useForm({
    name: props.resume.name ?? '',
    headline: props.resume.headline ?? '',
    summary: props.resume.summary ?? '',
    email: props.resume.email ?? '',
    phone: props.resume.phone ?? '',
    location: props.resume.location ?? '',
    linkedin: props.resume.linkedin ?? '',
});

const submit = () => {
    form.put(route('admin.resumes.update', props.resume.id));
};
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Edit Resume" />
        <div class="max-w-2xl mx-auto mt-10">
            <h2 class="text-2xl font-bold mb-4">Edit Resume</h2>
            <form @submit.prevent="submit" class="space-y-4">
                <div>
                    <InputLabel for="name" value="Name" />
                    <TextInput id="name" v-model="form.name" class="w-full" required autofocus />
                    <InputError :message="form.errors.name" class="mt-1" />
                </div>

                <div>
                    <InputLabel for="headline" value="Headline" />
                    <TextInput id="headline" v-model="form.headline" class="w-full" />
                    <InputError :message="form.errors.headline" class="mt-1" />
                </div>

                <div>
                    <InputLabel for="summary" value="Summary" />
                    <textarea id="summary" v-model="form.summary" class="w-full rounded-md border-gray-300"></textarea>
                    <InputError :message="form.errors.summary" class="mt-1" />
                </div>

                <div>
                    <InputLabel for="email" value="Email" />
                    <TextInput id="email" v-model="form.email" type="email" class="w-full" />
                    <InputError :message="form.errors.email" class="mt-1" />
                </div>

                <div>
                    <InputLabel for="phone" value="Phone" />
                    <TextInput id="phone" v-model="form.phone" class="w-full" />
                    <InputError :message="form.errors.phone" class="mt-1" />
                </div>

                <div>
                    <InputLabel for="location" value="Location" />
                    <TextInput id="location" v-model="form.location" class="w-full" />
                    <InputError :message="form.errors.location" class="mt-1" />
                </div>

                <div>
                    <InputLabel for="linkedin" value="LinkedIn" />
                    <TextInput id="linkedin" v-model="form.linkedin" class="w-full" />
                    <InputError :message="form.errors.linkedin" class="mt-1" />
                </div>

                <div class="flex justify-end">
                    <PrimaryButton :disabled="form.processing">Update Resume</PrimaryButton>
                </div>
            </form>
        </div>
        <!-- Optionally display experiences/education summary -->
        <div v-if="resume.experiences?.length || resume.education?.length" class="max-w-2xl mx-auto mt-10">
            <h3 class="text-xl font-semibold mb-2">Experiences</h3>
            <ul v-if="resume.experiences?.length">
                <li v-for="exp in resume.experiences" :key="exp.id" class="mb-2">
                    <div class="font-medium">{{ exp.company }} - {{ exp.role }}</div>
                    <div class="text-sm text-gray-500">{{ exp.start_date }} – {{ exp.is_current ? 'Present' : exp.end_date }}</div>
                    <div class="text-sm">{{ exp.description }}</div>
                </li>
            </ul>
            <h3 class="text-xl font-semibold mb-2 mt-4">Education</h3>
            <ul v-if="resume.education?.length">
                <li v-for="ed in resume.education" :key="ed.id" class="mb-2">
                    <div class="font-medium">{{ ed.institution }} - {{ ed.degree }}</div>
                    <div class="text-sm text-gray-500">{{ ed.start_date }} – {{ ed.end_date }}</div>
                    <div class="text-sm">{{ ed.description }}</div>
                </li>
            </ul>
        </div>
    </AuthenticatedLayout>
</template>
