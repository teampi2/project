import Dashboard from '@/pages/Dasboard'
import Classes from '@/pages/Classes'
import Activities from '@/pages/Activities'
import Settings from '@/pages/Settings'

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
  {
    path: '/settings',
    element: <Settings />,
  },
]

export default routes
