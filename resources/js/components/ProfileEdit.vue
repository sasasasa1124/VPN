<template>
    <v-container>
        <v-form
            @submit.prevent
            @submit="mySubmit">
            <v-file-input
                v-model="image"
                accept="image/*"
                label="File input"
            ></v-file-input>            
            <v-select
                :items="['Male','Female','Other','Not Prefer To Say']"
                v-model="profile['gender']"
                label="Gender"
                required
            ></v-select>
            <multiselect
                name="nationality"
                v-model="nationalities"
                :options="countryList"
                :searchable="true"
                :allow-empty="false"
                :multiple="true"
            ></multiselect>
            <multiselect
                name="language"
                v-model="languages"
                :options="languageList"
                :searchable="true"
                :allow-empty="false"
                :multiple="true"
            ></multiselect>
            <v-textarea
                name="profile['self_introduction']"
                v-model="profile['self_introduction']"
                :counter="300"
                label="Self Introduction"
                dense
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
    import { countryList } from '../countries';
    import { VueFlashMessage } from 'vue-flash-message';

    export default {
        components: { Multiselect, VueFlashMessage },

        props: {
            proprofile: {},
            proplang: [],
            propnation: [],
            csrf: {
                type: String,
                required: true,
            }
        },
        data () {
            return {
                languageList: languageList,
                countryList: countryList,
                profile: {},
                languages: [],
                nationalities: [],
                image: null,
            }
        },
        mounted () {
            this.profile=this.proprofile;
            this.proplang.map(obj => this.languages.push(obj['language']));
            this.propnation.map(obj => this.nationalities.push(obj['nationality']));
        },
        methods: {
            mySubmit()
            {
                
                let formData = new FormData();
                formData.append("image");
                
                axios.post('/profiles/edit',
                    {
                        '_token': this.csrf,
                        'profile': this.profile,
                        'language': this.languages,
                        'nationality': this.nationalities,
                        'image': formData,
                    })
                    .then((res) => {
                        this.flash('Profile updated...', 'success');
                        console.log(res);
                    }).catch((err) => {
                        console.log(err);
                    });
                

            }
        }
    };
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>