import QuestionsTable from "./components/resident/QuestionsTable";

require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import QuestionsOptionsForm from "./components/resident/QuestionsOptionsForm";
import OfficerQuestionsTable from "./components/officer/OfficerQuestionsTable";
import OfficerViewQuestionsOptions from "./components/officer/OfficerViewQuestionsOptions";
import ViewResponses from "./components/officer/ViewResponses";
Vue.use(VueRouter);


Vue.component('resident-index', require('./components/resident/index.vue').default);
Vue.component('officer-view-question-table', require('./components/officer/OfficerQuestionsTable.vue').default);
Vue.component('resident-view-question-table', require('./components/resident/QuestionsTable.vue').default)
Vue.component('questions-option-form',require('./components/resident/QuestionsOptionsForm').default)

const routes = [
    {
    path: '/resident/dashboard/questions',
    component:QuestionsTable
    },
    {
        path: '/resident/dashboard/:question_id',
        component:QuestionsOptionsForm
    },
    {
        path: '/officer/dashboard/questions',
        component:OfficerQuestionsTable
    },
    {
        path: '/officer/dashboard/:question_id',
        component:OfficerViewQuestionsOptions
    },
    {
        path: '/officer/dashboard/result/:question_id',
        component:ViewResponses
    },

    ]

const router = new VueRouter({
    routes,
    mode: 'hash'
})

const app = new Vue({
    el: '#app',
    router,

});
