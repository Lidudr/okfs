<template>
    <div class="contacts-list">
        <ul>
            <li v-for="(contact, i) in contacts" :key="i">
                <div class="avatar">
                    <img src="" alt="">
                </div>
                <div class="contact">
                    <p class="name">
                        {{contact.first_name}}
                    </p>
                    <p class="email">
                        {{contact.email}}
                    </p>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        contacts: {
            type: Array,
            defaults: []
        }
    }
}
</script>
