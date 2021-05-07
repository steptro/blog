<template>
    <nav class="border-b-2 w-full fixed z-50 bg-white">
        <div class="max-w-4xl mx-auto">
            <div class="relative flex items-center justify-between h-16 px-4">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
<!--                    <button @click="toggle" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">-->
<!--                        <span class="sr-only">Open main menu</span>-->

<!--                        <svg :class="{hidden: open, block: !open}" class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />-->
<!--                        </svg>-->

<!--                        <svg :class="{hidden: !open, block: open}" class=" h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />-->
<!--                        </svg>-->
<!--                    </button>-->
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/" class="text-2xl">Stephan's DEV blog</a>
                    </div>
                    <div class="hidden sm:block ml-auto">
                        <div class="flex space-x-4">
<!--                            <a href="/home" class="hover:underline px-3 py-2 rounded-md text-sm font-medium">Home</a>-->
<!--                            <a href="/about" class="hover:underline px-3 py-2 rounded-md text-sm font-medium">About</a>-->
<!--                            <a href="/setup" class="hover:underline px-3 py-2 rounded-md text-sm font-medium">My setup</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div :class="{hidden: !open, block: open}" class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1">
<!--                <a href="/home" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Home</a>-->
<!--                <a href="/about" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">About</a>-->
<!--                <a href="/setup" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">My setup</a>-->
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            open: false,
        }
    },
    methods: {
        toggle() {
            this.open = !this.open;
        }
    }
}
</script>
