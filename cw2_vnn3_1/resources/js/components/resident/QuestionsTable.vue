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
                    <button type="button" class="btn btn-outline-primary" @click="ViewCompleteQuestion(question.questions_id)">Answer</button>
                </td>
            </tr>
            </tbody>
        </table>



    </div>
</template>

<script>
export default {
name: "QuestionsTable.vue",
    data: function (){
        return{
            questions: [],
            notAnswered: '',

        }
    },
    props : ['user'],
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
        checkAnswered: function(questions_id){

            axios.get('/resident/dashboard/result/'+ questions_id +'/'+this.user.id)
                .then((response)=>{
                    this.check = response.data
                    console.log(this.check)
                })
                .catch(function(error){
                    console.log(error);
                });

        },
        ViewCompleteQuestion: function (questions_id){
            this.checkAnswered(questions_id);
            if (this.check === true){
                this.$router.push('/resident/dashboard/' + questions_id).catch(err => {
                    // Ignore the vuex err regarding  navigating to the page they are already on.
                    if (
                        err.name !== 'NavigationDuplicated' &&
                        !err.message.includes('Avoided redundant navigation to current location')
                    ) {
                        // But print any other errors to the console
                        logError(err);
                    }
                })
            }



            }


        },


}
</script>

<style scoped>

</style>
