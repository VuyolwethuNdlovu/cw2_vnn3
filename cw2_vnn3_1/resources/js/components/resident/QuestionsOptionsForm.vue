<template :user="user">
    <div>
        <form @submit.prevent="submit">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="qOption in questionsOptions">
                    <td>{{qOption.questions_id}}</td>
                    <td>
                        {{qOption.question_text}}
                    </td>
                    <td>
                        <input type="button" class="btn-outline-primary"  :name="'option-selected'" v-model="qOption.option_text"
                        @click="submit(qOption.questions_id, qOption.option_id)">
                    </td>

                </tr>
                </tbody>
            </table>
        </form>


    </div>


</template>

<script>

export default {
name: "QuestionsOptionsForm",
    data: function (){
    return {
        questionsOptions: [],

    }
    },
    props : ['user'],
    mounted(){
        this.loadQuestionWithOptions();
    },
    methods : {
        loadQuestionWithOptions: function () {
            axios.get('/GetQuestionOptions/' + this.$route.params.question_id )
                .then((response) => {
                    this.questionsOptions = response.data;
                    console.log(this.questionsOptions)
                    console.log(this.user);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        submit(questions_id, option_id) {
            console.log(questions_id, option_id)

            console.log(this.user);
            axios.post('/resident/dashboard/vote',{questionId: questions_id , optionId: option_id, userId: this.user.id}
                ).then(response => {
                console.log('hi')
                this.$router.push('/resident/dashboard/questions')
            }).catch(error => {
                if (error.response.status === 422) {
                    this.errors = error.response.data.errors;
                }
                console.log('Error');
            });



    },
    setup() {
        const route = useRoute()
        const questionOptions = computed(() => {
            return questions.filter(q => q.abbreviation === route.params.questions_id)[0]
        })
        return { questionOptions }
    }



}}
</script>

<style scoped>

</style>
