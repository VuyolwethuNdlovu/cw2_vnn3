<template :user="user">
<div>

        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Question</th>
                <th>Answer</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="question in questions">
                <td>{{question.questions_id}}</td>
                <td>
                    {{question.question_text}}
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="action">
                        <button type="button" class="btn btn-outline-primary" style="color: darkorchid" @click="ViewCompleteQuestion(question.questions_id)">View Answer Options</button>
                        <button type="button" class="btn btn-outline-primary" @click="editQuestion(question.questions_id)">Edit</button>
                        <button type="button" class="btn btn-outline-danger" @click="deleteQuestion(question.questions_id)">Delete</button>
                        <button type="button" class="btn btn-outline-success" @click="viewResults(question.questions_id)">See Responses</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
</div>
</template>

<script>

export default {



  data: function (){
    return{
        questions: [],

    }
    },
    prop:['user'],
    mounted(){
        this.loadQuestions();
    },
    methods: {
        loadQuestions: function(){
            axios.get('/GetAllQuestions')
            .then((response)=>{
                this.questions= response.data.data;
            })
            .catch(function(error){
                console.log(error);
            });
        },
        ViewCompleteQuestion: function (questions_id){
                this.$router.push('/officer/dashboard/' + questions_id).catch(err => {
                    // Ignore the vuex err regarding  navigating to the page they are already on.
                    if (
                        err.name !== 'NavigationDuplicated' &&
                        !err.message.includes('Avoided redundant navigation to current location')
                    ) {
                        // But print any other errors to the console
                        logError(err);
                    }
                })
            },

        viewResults: function (questions_id){
            this.$router.push('/officer/dashboard/result/' + questions_id).catch(err => {
                // Ignore the vuex err regarding  navigating to the page they are already on.
                if (
                    err.name !== 'NavigationDuplicated' &&
                    !err.message.includes('Avoided redundant navigation to current location')
                ) {
                    // But print any other errors to the console
                    logError(err);
                }
            })
        },
    }
}
</script>

<style scoped>

</style>
