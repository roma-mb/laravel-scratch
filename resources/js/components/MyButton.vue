<template>
    <div>
        <button :type="type" class="my-btn" v-text="buttonName">Default name</button>
    </div>
</template>

<script>
    export default {
        mounted() {
            axios.post('api/vue', {})
            .then(response => {
                this.buttonName = response.data.buttonName;
            })
        },
        data: function() {
            return {
                buttonName: null
            }
        },
        props: [
            'text',
            'type'
        ]
    }
</script>

<style>
    .my-btn {
        background-color: #333;
        color: #FFFFFF;
        padding: 10px 20px;
        font-weight: bold;
    }
</style>
