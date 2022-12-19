<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { Inertia } from "@inertiajs/inertia";

const submit = () => {
    Inertia.post(route("jobs.store"));
};
</script>

<template>

    <Head title="Jobs" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Jobs</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-10">
                    <div class="form-control w-full mb-5">
                        <label class="label">
                            <span class="label-text">Events Diagram</span>
                        </label>
                        <img src="/images/rwosfraplff3jbd7wa08.png" alt="event-diagram">
                    </div>

                    <div class="form-control mb-5">
                        <p>Jobs are triggered anytime. (perform long tasks)</p>
                    </div>

                    <div v-if="$page.props.flash.message" class="alert alert-success shadow-lg mb-5">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $page.props.flash.message }}</span>
                        </div>
                    </div>

                    <div class="form-control w-full max-w-xs">
                        <label class="label">
                            <span class="label-text">Press button to trigger job. (simulation)</span>
                        </label>
                        <button @click="submit" class="btn btn-primary btn-lg">Upload Youtube Video</button>
                        <label class="label">
                            <span class="label-text-alt">Job will trigger immediately or at specified time.</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
