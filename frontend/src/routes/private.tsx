import Dashboard from '@/pages/Dasboard'
import Classes from '@/pages/Classes'

const routes: IRoute[] = [
  {
    path: '/dashboard',
    element: <Dashboard />,
  },
  {
    path: '/classes',
    element: <Classes />,
  },
]

export default routes
