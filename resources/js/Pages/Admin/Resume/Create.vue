<script setup>
import { Head, useForm } from '@inertiajs/vue3'
import AdminLayout from '@/Layouts/AuthenticatedLayout.vue'
import FormTextInput from "@/Components/Form/FormTextInput.vue"
import FormCheckboxInput from "@/Components/Form/FormCheckboxInput.vue"
import FormSelectInput from "@/Components/Form/FormSelectInput.vue"
import PrimaryButton from '@/Components/Buttons/PrimaryButton.vue'
import FileInput from "@/Components/Form/Elements/FileInput.vue"

defineProps({ users: Object })

const form = useForm({
    title: null,
    file: null,
    is_active: false,
    user_id: null,
    notify_user: false,
})

function submit() {
    form.post(route('admin.resumes.store'))
}
</script>

<template>
    <Head :title="('Resume create')" />

    <AdminLayout>
        <template #header>
            <h2 class="admin_page_header">{{ ('Resume create') }}</h2>
        </template>
        <div class="admin_form_container">
            <form @submit.prevent="submit">
                <FormTextInput
                    id="title"
                    v-model="form.title"
                    :error-message="form.errors.title"
                    :label="('title')"
                    :required="true"
                />

                <hr class="base-hr">

                <FormSelectInput
                    id="user_id"
                    v-model="form.user_id"
                    :error-message="form.errors.user_id"
                    :label="('User')"
                    :options="users"
                    :required="true"
                />

                <FormCheckboxInput
                    id="notify_user"
                    v-model:checked="form.notify_user"
                    :error-message="form.errors.notify_user"
                    :label="('notify_user')"
                />

                <FileInput
                    :accept-mimes="['pdf', 'doc', 'docx']"
                    class="mt-1"
                    @input="form.file = $event.target.files[0]"
                />

                <hr class="base-hr">

                <div class="flex items-left mt-4">
                    <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        {{ ('button.save') }}
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AdminLayout>
</template>
