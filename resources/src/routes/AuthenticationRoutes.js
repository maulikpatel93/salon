import { lazy } from 'react';

// project imports
import Loadable from '../component/Loadable';
import MinimalLayout from '../layout/MinimalLayout';

// login option 3 routing
const Login = Loadable(lazy(() => import('../pages/auth/Login')));

// ==============================|| AUTHENTICATION ROUTING ||============================== //

const AuthenticationRoutes = {
    path: '/',
    element: <MinimalLayout />,
    children: [
        {
            path: '/login',
            element: <Login />
        },
    ]
};

export default AuthenticationRoutes;
