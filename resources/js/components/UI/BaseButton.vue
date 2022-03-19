<template>
    <button
        class="font-medium rounded focus:outline-none focus:shadow-outline"
        :class="[buttonType, buttonSize, buttonDisabled]"
        :disabled="disabled"
        v-on="$listeners"
    >
        <slot></slot>
    </button>
</template>

<script>
    export default {
        props: {
            danger: Boolean,
            primary: Boolean,
            small: Boolean,
            disabled: Boolean,
        },
        computed: {
            buttonType() {
                if (this.danger) return this.buttonDanger;
                if (this.primary) return this.buttonPrimary;
                return this.buttonDefault;
            },
            buttonDanger() {
                return this.disabled
                    ? 'bg-red-400 hover:bg-red-500 text-white tracking-wide'
                    :'bg-red-500 hover:bg-red-600 text-white tracking-wide';
            },
            buttonPrimary() {
                return this.disabled
                    ? 'bg-indigo-400 hover:bg-indigo-500 text-white tracking-wide'
                    :'bg-indigo-500 hover:bg-indigo-600 text-white tracking-wide';
            },
            buttonDefault() {
                return this.disabled
                    ? 'bg-gray-400 hover:bg-gray-500 text-gray-100 tracking-wide'
                    :'bg-gray-500 hover:bg-gray-600 text-gray-100 tracking-wide';
            },
            buttonSize() {
                return this.small ? 'px-2 py-1 text-xs' : 'px-4 py-2';
            },
            buttonDisabled() {
                return this.disabled ? 'cursor-not-allowed' : 'shadow hover:shadow-md'
            }
        }
    }
</script>
