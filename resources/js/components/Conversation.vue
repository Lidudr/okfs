<template>
    <div class="conversation">
        <h1>{{ contact? contact.name : 'select a contact' }}</h1>
        <MessageFeed :contact="contact" :messages="messages"/>
        <MessageComposer @send="sendMessage"/>
    </div>
</template>

<script>
import MessageComposer from './MessageComposer';
import MessageFeed from './MessageFeed';
export default {
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
            console.log(text);
        }
    }
}
</script>
