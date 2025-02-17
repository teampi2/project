import Home from '@/pages/Home'
import { RegisterMonitor } from '@/pages/RegisterUser/RegisterMonitor'
import { RegisterUser } from '@/pages/RegisterUser/RegisterUser'
import { RegisterStudent}from '@/pages/RegisterUser/RegisterStudent'
import { RegisterCoodinator } from '@/pages/RegisterUser/RegisterCoordinator'
import { RegisterTeacher } from '@/pages/RegisterUser/RegisterTeacher'


const routes: IRoute[] = [
  {
    path: '/',
    element: <Home />,
  },

  {
    path: '/register-user',
    element: <RegisterUser />,
  },
  {
    path: '/register-monitor',
    element: <RegisterMonitor />,
  },
  {
    path: '/register-student',
    element: <RegisterStudent/>,
  },
  {
    path: '/register-coordinator',
    element: <RegisterCoodinator/>,
  },
  {
    path: '/register-teacher',
    element: <RegisterTeacher/>,
  },
]

export default routes
