<template>
    <v-container>
        <v-form
            @submit.prevent
            @submit="mySubmit">
            <multiselect
                name="advertisement['communicationLanguage']"
                v-model="advertisement['communicationLanguage']"
                :options="languageList"
                :searchable="true"
                :allow-empty="false"
                :multiple="false"
            ></multiselect>
            <v-text-field
                name="advertisement['title']"
                v-model="advertisement['title']"
                :counter="30"
                label="Title"
                required
            ></v-text-field>            
            <v-textarea
                name="advertisement['body']"
                v-model="advertisement['body']"
                :counter="300"
                label="What kind of buddy do you want?"
            ></v-textarea>
            <v-btn
                class="mr-4"
                type="submit"
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
            },
            user: {},
        },
        data () {
            return {
                languageList: languageList,
                languages: [],
                nationalities: [],
                advertisement: {},
            }
        },
        mounted () {
            this.advertisement['user_id']=this.user['id'];
        },        
        methods: {
            mySubmit()
            {
                axios.post('../languages/store',this.advertisement)
                    .then((res) => {
                        this.flash('Advertisement posted...', 'success');
                    }).catch((err) => {
                        console.log(err);
                    });
                

            }
        }
    };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>