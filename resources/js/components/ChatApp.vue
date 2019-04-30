<template>
  <div class="chat-app">
    <Conversation :messages="messages" :contact="selectedContact" @new="saveNewMessage"/>
    <!-- <ContactList :contacts="contacts" @selected="startConversationWith"/> -->
  </div>
</template>

<script>
import Axios from "axios";
import Conversation from "./Conversation";
// import ContactList from "./ContactList";
export default {
  components: { Conversation },
  props: {
    user_id: {
      default: 0
    }
  },
  data() {
    return {
      selectedContact: null,
      messages: []
    };
  },
  mounted() {
    Axios.get("/api/user/" + this.user_id).then(res => {
      this.startConversationWith(res.data);
      console.log(res.data);

      Echo.private("message" + res.data.id).listen("newMessage", e => {
        this.handleImcomingMessage(e.message);
      });
    });
  },
  methods: {
    startConversationWith(contact) {
      Axios.get("/app/conversation/" + contact.id).then(res => {
        this.messages = res.data;
        this.selectedContact = contact;
      });
    },
    saveNewMessage(message) {
      this.messages.push(message);
    },
    handleImcomingMessage(message) {
      if (this.selectedContact && message.from == this.selectedContact.id) {
        this.saveNewMessage(message);
        return;
      }
      alert(message.text);
    }
  }
};
</script>

<style lang="scss" scoped>
.chat-app {
  display: flex;
}
</style>
