// 必要なモジュールのインポート
import { createApp } from 'vue';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import { createRouter, createWebHistory } from 'vue-router';
import TaskListComponent from './components/TaskListComponent.vue'; // TaskListComponentのインポート
import TaskShowComponent from './components/TaskShowComponent.vue';
import TaskInsertComponent from './components/TaskInsertComponent.vue';
import TaskEditComponent from './components/TaskEditComponent.vue';

import SelectFishComponent from './components/select_fish/SelectFishComponent.vue';
import FishDetailComponent from './components/select_fish/FishDetailComponent.vue';
import AddFishComponent from './components/select_fish/AddFishComponent.vue';
import EditFishComponent from './components/select_fish/EditFishComponent.vue';

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
        name: 'task.show',
        component: TaskShowComponent,
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
    {
        path: '/select_mode',
        name: 'select_top',
        component: SelectFishComponent,
    },
    {
        path: '/select_mode/:fishId',
        name: 'select_mode.detail',
        component: FishDetailComponent,
        props: true
    },
    {
        path: '/select_mode/add_f',
        name: 'select.add_f',
        component: AddFishComponent,
    },
    {
        path: '/select_mode/:fishId',
        name: 'select.fish',
        component: FishDetailComponent,
        props: true
    },
    {
        path: '/select_mode/:fishId/edit',
        name: 'select_mode.update',
        component: EditFishComponent,
        props: true
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
