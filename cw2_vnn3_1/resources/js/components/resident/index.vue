<template>
    <div>
        <button type="button" class="btn btn-outline-primary" @click="viewQuestions()">View Questions</button>



        <router-view :user="user"></router-view>
    </div>


</template>

<script>
export default {
name: "index.vue",
    props : ['user'],
    methods : {
        viewQuestions: function (){


            this.$router.push('/resident/dashboard/questions')
    }
}
}
</script>

<style scoped>

</style>
