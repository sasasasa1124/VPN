<template>
    <v-container>
        <v-form>
            <multiselect
                name="search['language']"
                v-model="search['language']"
                :options="languageList"
                :searchable="true"
                :allow-empty="true"
                :multiple="false"
            ></multiselect>
            <v-textarea
                name="search['freeword']"
                v-model="search['freeword']"
                :counter="30"
            ></v-textarea>            
            <v-select
                name="search['gender']"
                v-model="search['gender']"
                label="Gender"
            ></v-select>
            <v-btn
                class="mr-4"
                type="search"
            >submit</v-btn>
        </v-form>
        <flash-message></flash-message>

    </v-container>
    
</template>

<script>
    import { Multiselect } from 'vue-multiselect';
    import { languageList } from '../languages';
    import { VueFlashMessage } from 'vue-flash-message';

    export default {
        components: { Multiselect, VueFlashMessage },
        props: {
            csrf: {
                type: String,
                required: true,
            }
        },
        data () {
            return {
                search: {},
                results: {},
            }
        },
        mounted () {
            this.search['_token'] = this.csrf;
            axios.post('./languages/get', this.search)
                .then((res) => {
                    console.log(res);
                    this.results = res.data;
                }).catch((err) => {
                    console.log(err);
                })
        },        
        methods: {

        },
    };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>