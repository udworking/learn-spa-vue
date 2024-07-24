// 必要なモジュールのインポート
import { createApp } from 'vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import { createRouter, createWebHistory } from 'vue-router';
import TaskListComponent from './components/TaskListComponent.vue'; // TaskListComponentのインポート
import TaskDetailComponent from './components/TaskDetailComponent.vue';
import TaskInsertComponent from './components/TaskInsertComponent.vue';
import TaskEditComponent from './components/TaskEditComponent.vue';
// Vue Routerのセットアップ
const routes = [
    {
        path: '/',
        name: 'home',
        component: ExampleComponent
    },
    {
        path: '/tasks',
        name: 'task.list',
        component: TaskListComponent
    },
    {
        path: '/tasks/:taskId',
        name: 'task.detail',
        component: TaskDetailComponent,
        props: true
    },
    {
        path: '/tasks/:taskId/edit',
        name: 'task.edit',
        component: TaskEditComponent,
        props: true
    },
    {
        path: '/tasks/insert',
        name: 'task.insert',
        component: TaskInsertComponent
    },

];

const router = createRouter({
    history: createWebHistory(),
    routes
});

// Vueアプリケーションの作成
const app = createApp({});

// コンポーネントの登録
import ExampleComponent from './components/ExampleComponent.vue';
import HeaderComponent from './components/HeaderComponent.vue';

app.component('example-component', ExampleComponent);
app.component('header-component', HeaderComponent);

// Vue Routerの使用
app.use(router);

// アプリケーションのマウント
app.mount('#app');
