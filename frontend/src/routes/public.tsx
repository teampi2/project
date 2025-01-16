import Home from '@/pages/Home'
import Login from '@/pages/Login'

const routes: IRoute[] = [
  {
    path: '/',
    element: <Home />,
  },
  {
    path: '/login',
    element: <Login />,
  },
]

export default routes
