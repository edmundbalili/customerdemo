import Index from "./components/Index";
import List from "./components/List";
import Edit from "./components/Edit";
import NotFound from "./components/NotFound";

export default {
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Index,
            name: 'index'
        },
        {
            path: '/customers',
            component: List,
            name: 'list'
        },
        {
            path: '/customers/:id/edit',
            component: Edit,
            name: 'edit',
        },
        {
            path: '/404',
            component: NotFound
        },
        {
            path: '*',
            redirect: '/404'
        },
    ]
}
