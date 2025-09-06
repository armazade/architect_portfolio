<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import InputError from '@/Components/InputError.vue'
import InputLabel from '@/Components/InputLabel.vue'
import PrimaryButton from '@/Components/PrimaryButton.vue'
import TextInput from '@/Components/TextInput.vue'
import { Head, useForm } from '@inertiajs/vue3'

const form = useForm({
    name: '',
    headline: '',
    summary: '',
    email: '',
    phone: '',
    location: '',
    linkedin: '',
    avatar: null,
})

const submit = () => {
    form.post(route('admin.resumes.store'), {
        forceFormData: true,
    })
}
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Create Resume" />
        <form @submit.prevent="submit" class="max-w-xl mx-auto space-y-6 mt-10">
            <div>
                <InputLabel for="name" value="Full Name" />
                <TextInput id="name" class="mt-1 block w-full" v-model="form.name" required autofocus autocomplete="off" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>
            <div>
                <InputLabel for="headline" value="Headline" />
                <TextInput id="headline" class="mt-1 block w-full" v-model="form.headline" autocomplete="off" />
                <InputError class="mt-2" :message="form.errors.headline" />
            </div>
            <div>
                <InputLabel for="summary" value="Summary" />
                <textarea id="summary" v-model="form.summary" class="mt-1 block w-full rounded-md border-gray-300" rows="4"></textarea>
                <InputError class="mt-2" :message="form.errors.summary" />
            </div>
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput id="email" type="email" class="mt-1 block w-full" v-model="form.email" autocomplete="off" />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>
            <div>
                <InputLabel for="phone" value="Phone" />
                <TextInput id="phone" class="mt-1 block w-full" v-model="form.phone" autocomplete="off" />
                <InputError class="mt-2" :message="form.errors.phone" />
            </div>
            <div>
                <InputLabel for="location" value="Location" />
                <TextInput id="location" class="mt-1 block w-full" v-model="form.location" autocomplete="off" />
                <InputError class="mt-2" :message="form.errors.location" />
            </div>
            <div>
                <InputLabel for="linkedin" value="LinkedIn" />
                <TextInput id="linkedin" class="mt-1 block w-full" v-model="form.linkedin" autocomplete="off" />
                <InputError class="mt-2" :message="form.errors.linkedin" />
            </div>
            <div>
                <InputLabel for="avatar" value="Avatar" />
                <input id="avatar" type="file" @change="e => form.avatar = e.target.files[0]" />
                <InputError :message="form.errors.avatar" class="mt-2" />
            </div>
            <div class="flex justify-end">
                <PrimaryButton class="ml-4" :disabled="form.processing">Create Resume</PrimaryButton>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
