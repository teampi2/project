import Home from '@/pages/Home'
import NotFound from '@/404'

const routes: IRoute[] = [
  {
    path: '/',
    element: <Home />,
  },
  {
    path: '*',
    element: <NotFound />,
  },
]

export default routes
