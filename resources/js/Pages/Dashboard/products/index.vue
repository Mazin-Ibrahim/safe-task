<template>
    <layout>
        <div class="mt-8">
            <div class="flex justify-between">
                <h2 class="text-3xl text-gray-700 font-bold">Products</h2>
                <div>
                    <inertia-link
                        href="/products/create"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded"
                    >
                        Create Product
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
                                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                            style="text-align: start"
                                        >
                                            Category
                                        </th>

                                        <th
                                            class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                            style="text-align: start"
                                        >
                                            Price
                                        </th>

                                        <th
                                            class="px-6 py-3 border-b border-gray-200 bg-gray-50"
                                        ></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white text-gray-700">
                                    <tr
                                        v-for="product in products"
                                        :key="product.id"
                                    >
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                        >
                                            {{ product.name }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                        >
                                            {{ product.categories[0].name }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                                        >
                                            {{ product.price }}
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium"
                                        >
                                            <inertia-link
                                                :href="
                                                    `/products/${product.id}/edit`
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
    props: ["products"]
};
</script>
