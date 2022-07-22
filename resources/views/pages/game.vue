<template>
    <div class="w-screen h-screen bg-blue-200 flex p-4">
        <form @submit.prevent="submit" class="p-4 m-auto flex flex-col gap-8">
            <label
                class="text-5xl font-bold text-blue-800 text-center"
                >{{ word }}</label
            >
            <label class="text-center">means</label>
            <input type="hidden" name="word" :value="word">
            <div class="flex flex-col gap-2">
                <input
                    name="answer"
                    v-model="form.answer"
                    :class="{ 'px-2 py-2 text-2xl text-center bg-blue-300' : 1, 'bg-red-100': !this.success }"
                />
                <p> {{ translated }} </p>
            </div>
                <button
                    type="submit"
                    class="px-2 py-2 text-2xl text-center bg-blue-300 hidden"
                >
                    Submit
                </button>
        </form>
    </div>
</template>

<script lang="ts">
import { Inertia } from "@inertiajs/inertia";
import { Link, useForm } from "@inertiajs/inertia-vue3";
import { onUnmounted } from "vue";

export default {
    components: {
        Link,
    },
	props: {
		success: {
			type: Boolean,
			default: true,
		},
        word: {
            type: String,
            default: '',
        },
        translated: {
            type: String,
            default: '',
        },
	},
    setup(props){
		const form = useForm({answer: props.answer, word: props.word, translated: props.translated});
        return {form};
	},
    mounted() {
        window.addEventListener('keydown', (e) => {
            if (e.code === 'ShiftRight') {
                this.$inertia.get('/game');
            }
        });
        //focus input
        this.$refs.answer.focus();
    },
    onUnmounted() {
        window.removeEventListener('keydown', (e) => {
            if (e.code === 'ShiftRight') {
                this.$inertia.get('/game');
            }
        });
    },
    methods: {
        async submit() {
            await this.form.post('/game');
        },

    },
};
</script>
