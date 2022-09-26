<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { ref, watch, watchEffect } from "vue";
let users = ref([]);

// watch(users, async (newUsers) => {
//     console.log("new users: ", newUsers);
//     users.value = newUsers;
// });

const getUsers = async () => {
    const response = await fetch("/api/users");
    users.value = await response.json();
};

getUsers();
console.log(users.value);

// watchEffect(async () => {
//     getUsers();
// });

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ users }}
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
