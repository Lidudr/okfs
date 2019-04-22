<template>
  <div class="chat-app">
    <Conversation :contact="selectedContact" :messages="messages"/>
    <ContactList :contacts="contacts"/>
  </div>
</template>

<script>
import Axios from "axios";
import Conversation from "./Conversation";
import ContactList from "./ContactList";
export default {
  components: { Conversation, ContactList },
  props: {
    user: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      selectedContact: null,
      messages: [],
      contacts: []
    };
  },
  mounted() {
    console.log(this.user);
    Axios.get("/api/contacts").then(res => {
      this.contacts = res.data;
      console.log(res.data);
    });
  }
};
</script>
