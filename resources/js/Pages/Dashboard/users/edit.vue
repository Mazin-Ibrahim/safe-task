<template>
    <layout>

        <div class="mt-8">
            <div class="flex">
                <h2 class="text-3xl text-indigo-500 font-bold">Users /<span class="text-gray-700"> Edit</span></h2>
            </div>

            <base-panel class="md:max-w-3xl mt-4">
                <form @submit.prevent="submit">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <base-input label="Name" name="name" v-model="form.name" :error="$page.errors.name" required></base-input>
                        <base-input type="email" label="Email address" name="email" v-model="form.email" :error="$page.errors.email" required></base-input>
                        <base-input label="Password" type="password" v-model="form.password" :error="$page.errors.password"></base-input>
                        <base-input label="Password confirmation" type="password"
                                    v-model="form.password_confirmation"></base-input>
                    </div>
                    <div class="flex justify-end mt-4">
                        <base-button primary>Update user</base-button>
                    </div>
                </form>
            </base-panel>

        </div>

    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";

    export default {
        components: {Layout},
        props: ['user'],
        data() {
            return {
                form: {
                    name: '',
                    email: '',
                    password: '',
                    password_confirmation: '',
                }
            }
        },
        created() {
            this.form = this.user;
        },
        methods: {
            submit() {
                this.$inertia.put(this.$route('users.update', this.user.id), this.form);
            }
        }
    }
</script>
