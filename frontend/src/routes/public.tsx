import Home from '@/pages/Home'
import Verification from '@/pages/Verification'

const routes: IRoute[] = [
  {
    path: '/',
    element: <Home />,
  },
  {
    path: '/verification',
    element: <Verification />,
  },
]

export default routes
