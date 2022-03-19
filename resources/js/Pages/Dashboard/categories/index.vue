<template>
    <layout>
        <div class="mt-8">
            <div class="flex justify-between">
                <h2 class="text-3xl text-gray-700 font-bold">Categories</h2>
                <div>
                    <inertia-link
                        href="/categories/create"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded"
                    >
                        Create Category
                    </inertia-link>
                </div>
            </div>
            <div class="mt-4">
                <div class="flex flex-col">
                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                        <div
                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
                        >
                            <table class="min-w-full">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th
                                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                            style="text-align: start"
                                        >
                                            Name
                                        </th>
                                        <th
                                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                            style="text-align: start"
                                        >
                                            Parent Category
                                        </th>
                                        <th
                                            class="px-6 py-3 border-b border-gray-200 bg-gray-50"
                                        ></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white text-gray-700">
                                    <tr
                                        v-for="category in categories"
                                        :key="category.id"
                                    >
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                        >
                                            {{ category.name }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                        >
                                            <span
                                                v-if="category.parent != null"
                                            >
                                                {{ category.parent.name }}
                                            </span>

                                            <span v-else></span>
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium"
                                        >
                                            <inertia-link
                                                :href="
                                                    `/categories/${category.id}/edit`
                                                "
                                                class="text-indigo-600 hover:text-indigo-900"
                                                >Edit</inertia-link
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </layout>
</template>

<script>
import Layout from "../../../Shared/Layout";

export default {
    components: { Layout },
    props: ["categories"]
};
</script>
