<template>
    <div class="msger-inputarea">
        <input id="btn-input" type="text" name="message" class="msger-input" placeholder="Enter your message..."  v-model="newMessage" @keyup.enter="sendMessage">
        <button @click="sendMessage" id="btn-chat" type="submit" class="msger-send-btn">Send</button>
    </div>
</template>

<script>
    export default {
        name:"chat-form",
        props: ['user'],

        data() {
            return {
                newMessage: ''
            }
        },

        methods: {
            sendMessage() {
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                today = yyyy + '/' + mm + '/' + dd;
                this.$emit('messagesent', {
                    user: this.user,
                    message: this.newMessage,
                    created_at:today
                });

                this.newMessage = ''
            }
        }
    }
</script>
