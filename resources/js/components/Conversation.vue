<template>
    <div class="conversation">
        <h1>{{ contact? contact.first_name + ' ' + contact.middle_name : 'select a contact' }}</h1>
        <MessageFeed :messages="messages" :contact="contact"/>
        <MessageComposer @send="sendMessage"/>
    </div>
</template>

<script>
import MessageComposer from './MessageComposer';
import MessageFeed from './MessageFeed';
import Axios from 'axios';
export default {
    components: {MessageComposer, MessageFeed},
    props: {
        contact: {
            type: Object,
            default: null
        },
        messages: {
            type: Array,
            default: []
        }
    },
    methods: {
        sendMessage(text) {
            if(!this.contact) {
                return;
            }

            Axios.post('/app/conversation/send', {
                to: this.contact.id,
                text: text
            }).then(
                res => {
                    this.$emit('new', res.data);
                }
            )
        }
    }
}
</script>

<style lang="scss" scoped>
    .conversation {
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        h1 {
            font-size: 20px;
            padding: 10px;
            margin: 0;
            border-bottom: 1px dashed lightgray;
        }
    }
</style>
