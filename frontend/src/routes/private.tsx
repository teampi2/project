import Dashboard from '@/pages/Dasboard'
import Turmas from '@/pages/Turmas'

const routes: IRoute[] = [
  {
    path: '/dashboard',
    element: <Dashboard />,
  },
  {
    path: '/turmas',
    element: <Turmas />,
  },
]

export default routes
