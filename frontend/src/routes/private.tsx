import Dashboard from '@/pages/Dasboard'
import Classes from '@/pages/Classes'
import Activities from '@/pages/Activities'

const routes: IRoute[] = [
  {
    path: '/dashboard',
    element: <Dashboard />,
  },
  {
    path: '/classes',
    element: <Classes />,
  },
  {
    path: '/activities',
    element: <Activities />,
  },
]

export default routes
