<template>
    <div>
        <v-container fluid>    
            <v-fab-transition>         
                <v-btn
                color="#29B6F6"
                absolute
                fixed
                bottom
                right
                fab
                elevation="3"
                @click="link"
                >
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
            </v-fab-transition>
        </v-container>
    </div>
</template>
<script>

export default {
    methods: {
        link() {
            const currentLink = window.location.toString();
            if (!currentLink.includes('create')) {
                console.log('true');
                window.location.assign(window.location.href + "/create");
            }
        }
    }
}
</script>
