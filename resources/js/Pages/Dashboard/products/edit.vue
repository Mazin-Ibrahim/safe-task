<template>
    <layout>
        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-indigo-500 font-bold">
                    Product /<span class="text-gray-700"> Create</span>
                </h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div>
                            <label class="block">
                                <span class="text-gray-700">Product Name</span>
                                <input
                                    type="text"
                                    class="form-input border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                                    v-model="form.name"
                                />
                                <span v-if="errors.name">
                                    <p
                                        class="mt-2 text-sm text-green-600 dark:text-green-500"
                                    >
                                        <span class="font-medium"
                                            >Alright!</span
                                        >
                                        {{ errors.name[0] }}
                                    </p>
                                </span>
                            </label>
                        </div>

                        <div>
                            <label class="block">
                                <span class="text-gray-700">Price</span>
                                <input
                                    type="number"
                                    class="form-input border-gray-300 focus:border-indigo-400 focus:shadow-none focus:bg-white mt-1 block w-full"
                                    v-model="form.price"
                                />
                                <span v-if="errors.price">
                                    <p
                                        class="mt-2 text-sm text-green-600 dark:text-green-500"
                                    >
                                        <span class="font-medium"
                                            >Alright!</span
                                        >
                                        {{ errors.price[0] }}
                                    </p>
                                </span>
                            </label>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-1 gap-6 mt-4">
                        <div>
                            <label class="block">
                                <span class="text-gray-700">Category</span>
                                <v-Multiselect
                                    :close-on-select="true"
                                    placeholder="Type to search"
                                    v-model="form.selectcategories"
                                    :multiple="true"
                                    label="name"
                                    :options="categories"
                                    track-by="name"
                                ></v-Multiselect>
                            </label>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-1 gap-6 mt-4">
                        <div>
                            <label class="block">
                                <span class="text-gray-700">Company</span>
                                <v-Multiselect
                                    :close-on-select="true"
                                    placeholder=""
                                    v-model="form.company"
                                    label="name"
                                    :options="companies"
                                ></v-Multiselect>
                            </label>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-1 gap-6 mt-4">
                        <div>
                            <label class="block">
                                <span class="text-gray-700">Description</span>
                                <textarea
                                    v-model="form.description"
                                    class="w-full px-3 py-2 text-gray-700 border rounded-lg focus:outline-none mt-2"
                                    rows="4"
                                ></textarea>
                            </label>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-1 gap-6 mt-4">
                        <div>
                            <label class="block">
                                <span class="text-gray-700">Upload Images</span>
                                <UploadImages @changed="handleImages" />
                            </label>
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button primary>Update Product</base-button>
                    </div>
                </form>
            </base-panel>
        </div>
    </layout>
</template>

<script>
import Layout from "../../../Shared/Layout";
import UploadImages from "vue-upload-drop-images";

export default {
    components: { Layout, UploadImages },
    props: ["errors", "categories", "companies", "product"],
    created() {
        // console.log(this.product.categories);
        this.form.name = this.product.name;
        this.form.price = this.product.price;
        this.form.company = this.product.company;
        this.form.description = this.product.description;
        this.form.selectcategories = this.product.categories;
    },
    data() {
        return {
            form: {
                name: "",
                selectcategories: [],
                price: "",
                company: "",
                description: "",
                images: []
            }
        };
    },
    methods: {
        submit() {
            var data = new FormData();

            for (let i = 0; i < this.form.images.length; i++) {
                let file = this.form.images[i];
                data.append("images[" + i + "]", file);
            }

            for (let i = 0; i < this.form.selectcategories.length; i++) {
                for (let key of Object.keys(this.form.selectcategories[i])) {
                    data.append(
                        `selectcategories[${i}][${key}]`,
                        this.form.selectcategories[i][key]
                    );
                }
            }

            data.append("images", this.form.images);
            data.append("name", this.form.name);
            data.append("price", this.form.price);
            data.append("description", this.form.description);
            data.append("company_id", this.form.company.id);
            data.append("_method", "PUT");

            this.$inertia.post(
                this.$route("products.update", this.product.id),
                data
            );
        },

        handleImages(files) {
            // this.form.images = files;
            console.log(files);
            for (let i = 0; i < files.length; i++) {
                this.form.images.push(files[i]);
            }
        },

        removeCategory(value) {
            this.form.selectcategories.filter(
                category => category.id != value.id
            );
        }
    }
};
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
