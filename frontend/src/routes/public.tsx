import NotFound from '@/404'
import Home from '@/pages/Home'
import SignIn from '@/pages/SignIn'

const routes: IRoute[] = [
  {
    path: '/',
    element: <Home />,
  },
  {
    path: '/signin',
    element: <SignIn />,
  },
  {
    path: '*',
    element: <NotFound />,
  },
]

export default routes
