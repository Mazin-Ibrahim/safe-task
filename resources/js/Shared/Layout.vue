<template>
    <div class="flex flex-col md:flex-row relative overflow-hidden">

        <base-sidebar></base-sidebar>

        <div class="w-full md:flex-1">
            <nav class="hidden md:flex justify-between items-center bg-white p-4 shadow-md h-16">
                <div>
                    <input class="px-4 py-2 bg-gray-200 border border-gray-300 rounded focus:outline-none" type="text"
                           placeholder="Search.."/>
                </div>
                <div>
                    <button class="mx-2 text-gray-700 focus:outline-none" @click="logout">
                        <svg class="h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                    </button>
                </div>
            </nav>
            <main>
                <!-- Replace with your content -->
                <div class="px-8 py-6">
                    <slot></slot>
                </div>
                <!-- /End replace -->
            </main>
        </div>

        <flash v-if="$page.flash" :type="$page.flash.type" :popstate="$page.popstate">{{ $page.flash.message}}</flash>
    </div>
</template>

<script>
    import Flash from "../components/UI/Flash";
    export default {
        components: {Flash},
        methods: {
            logout() {
                axios.post('/logout')
                    .then(() => location.reload());
            }
        }
    }
</script>
