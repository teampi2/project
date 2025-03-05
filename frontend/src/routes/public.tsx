import NotFound from '@/404'
import SignIn from '@/pages/SignIn'

const routes: IRoute[] = [
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
