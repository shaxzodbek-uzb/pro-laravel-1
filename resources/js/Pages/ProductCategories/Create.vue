

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <div class="flex items-center">

                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Product categories
                </h2>
                <Link
                    :href="route('products.create')"
                    class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-2 py-1 m-1 ml-4 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline"
                >
                    Create
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Product Information</h3>
                        <p class="mt-1 text-sm text-gray-600">Use a permanent address where you can receive mail.</p>
                    </div>
                    </div>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                    <form @submit.prevent="submit" method="POST">
                        <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-12 sm:col-span-12">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                    <input type="text" v-model="form.name" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Link } from '@inertiajs/inertia-vue3'

import { Inertia } from '@inertiajs/inertia'

export default {
    components: {
        AppLayout,
        Welcome,
        Link,
    },
    data() {
        return {
            form: {
                name: null,
            },
        };
    },
    methods: {
        submit(){
            Inertia.post(route('product-categories.store'), this.form)
        }
    }
}
</script>
