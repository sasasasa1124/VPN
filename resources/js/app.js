require('./bootstrap');
require('vue-flash-message/dist/vue-flash-message.min.css');

window.Vue = require('vue');


import ExampleComponent from './components/ExampleComponent.vue';
import ChatForm from './components/ChatForm.vue';
import ChatMessages from './components/ChatMessages.vue';
import LanguageSelector from './components/LanguageSelector.vue';
import ProfileEdit from './components/ProfileEdit.vue';
import ProfileCreate from './components/ProfileCreate.vue';
import CreateButton from './components/CreateButton.vue';
import AdvertisementCreate from './components/AdvertisementCreate.vue';
import AdvertisementIndex from './components/AdvertisementIndex.vue';

import Vue from 'vue';
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import VueFlashMessage from 'vue-flash-message';

Vue.use(VueFlashMessage);
Vue.use(Vuetify);


Vue.component('example-component', ExampleComponent);
Vue.component('chat-messages', ChatMessages);
Vue.component('chat-form', ChatForm);
Vue.component('language-selector', LanguageSelector);
Vue.component('profile-edit', ProfileEdit);
Vue.component('profile-create', ProfileCreate);
Vue.component('create-button', CreateButton);
Vue.component('advertisement-create', AdvertisementCreate);
Vue.component('advertisement-index', AdvertisementIndex);


const app = new Vue({
    el: '#app',
    data: {
        messages: []
    },

    created() {
        this.fetchMessages();
    },

    methods: {
        fetchMessages() {
            axios.get('/messages').then(response => {
                this.messages = response.data;
            });
        },

        addMessage(message) {
            this.messages.push(message);

            axios.post('/messages', message).then(response => {
              console.log(response.data);
            });
        }
    }
});

Echo.private('chat')
  .listen('MessageSent', (e) => {
    this.messages.push({
      message: e.message.message,
      user: e.user
    });
  });