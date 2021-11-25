<template>
    <div class="dropdown">
        <multiselect
            v-model="selected"
            :options="options"
            :searchable="true"
            :allow-empty="false"
            :multiple="true"
        ></multiselect>
    </div>
</template>

<script>
    import { Multiselect } from 'vue-multiselect';
    export default {
        components: { Multiselect },

        props: {
            options: [],
        },
        data () {
            return {
                selected: []
            }
        }
    };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>