<template>
    <transition name="fade">
        <div class="text-white mb-12 rounded max-w-xl absolute top-0 right-0 mr-4 mt-4 cursor-pointer" :class="colors[type]"
             v-if="isOpen && !popstate" @click="isOpen = false">
            <div class="flex container mx-auto py-4 px-6">
                <svg viewBox="0 0 40 40" class="h-6 w-6 fill-current">
                    <path :d="icons[type]"></path>
                </svg>
                <p class="mx-3">
                    <slot></slot>
                </p>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: {
            type: String,
            popstate: Boolean,
        },
        data() {
            return {
                isOpen: true,
                timeout: null,
                colors: {
                    success: 'bg-green-500',
                    info: 'bg-blue-500',
                    warning: 'bg-yellow-500',
                    error: 'bg-red-500',
                }
                ,
                icons: {
                    success: 'M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z',
                    info: 'M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z',
                    warring: 'M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z',
                    error: 'M20 3.36667C10.8167 3.36667 3.3667 10.8167 3.3667 20C3.3667 29.1833 10.8167 36.6333 20 36.6333C29.1834 36.6333 36.6334 29.1833 36.6334 20C36.6334 10.8167 29.1834 3.36667 20 3.36667ZM19.1334 33.3333V22.9H13.3334L21.6667 6.66667V17.1H27.25L19.1334 33.3333Z',
                }
            }
        },
        created() {
            if (this.timeout) {
                clearTimeout(this.time);
            }

            this.timeout = setTimeout(() => this.isOpen = false, 3000);
        },
    }
</script>

<style scoped>
    .fade-enter-active {
        transition: all .3s ease;
    }
    .fade-leave-active {
        transition: all .4s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .fade-enter, .fade-leave-to
        /* .fade-leave-active below version 2.1.8 */ {
        transform: translateX(150px);
        opacity: 0;
    }
</style>
