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
                        {{qOption.option_text}}
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="action">
                            <button type="button" class="btn btn-outline-primary">Edit</button>
                            <button type="button" class="btn btn-outline-danger" >Delete</button>
                        </div>
                    </td>

                </tr>
                </tbody>
            </table>
        </form>


    </div>


</template>


<script>

export default {
name: "ViewQuestionsAndOptions",
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
            axios.get('/GetQuestionOptions/' + this.$route.params.question_id)
                .then((response) => {
                    this.questionsOptions = response.data;
                    console.log(this.questionsOptions)
                    console.log(this.user);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },
}
</script>

<style scoped>

</style>
