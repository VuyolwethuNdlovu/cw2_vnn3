<template>
    <div>
        <button type="button" class="btn btn-outline-primary" @click="viewQuestions()">Access Admin Questions</button>


        <router-view :user="user"></router-view>
    </div>
</template>

<script>
export default {
name: "index",
    props : ['user'],
    methods : {
        viewQuestions: function (){


            this.$router.push('/officer/dashboard/questions')
        },
}

}
</script>

<style scoped>

</style>
