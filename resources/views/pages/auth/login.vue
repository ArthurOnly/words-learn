<template>
	<div class="w-screen h-screen bg-slate-200 flex p-4">
		<form class="p-4 m-auto">
			<div class="flex flex-col gap-2">
				<label>Username</label>
				<input name="username" class="px-2 py-2 text-2xl"/>
			</div>
		</form>
	</div>
</template>

<script lang="ts">
import { Link } from "@inertiajs/inertia-vue3";

export default {
	components: {
		Link
	}
};
</script>
