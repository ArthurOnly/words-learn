<template>
    <div class="w-screen h-screen bg-blue-200 flex p-4">
        <form @submit.prevent="" class="p-4 m-auto flex flex-col gap-8">
            <label
                class="text-5xl font-bold text-blue-800 text-center"
                >{{randomWord}}</label
            >
            <label class="text-center">means</label>
            <div class="flex flex-col gap-2">
                <input
                    name="word"
                    class="px-2 py-2 text-2xl text-center bg-blue-300"
                />
            </div>
        </form>
    </div>
</template>

<script lang="ts">
import { Link, useForm } from "@inertiajs/inertia-vue3";
import RandomWords from "random-words";

export default {
    components: {
        Link,
    },

	props: {
		success: {
			type: Boolean,
			default: false,
		},
	},

    setup()	{
		const randomWord = RandomWords();
		const form = useForm({
			word: ''
		});
		return {
			randomWord,
			form,
		};
	}
};
</script>
