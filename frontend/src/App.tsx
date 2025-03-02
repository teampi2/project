import { BrowserRouter, Routes, Route, Navigate } from 'react-router-dom'
import useUser from './hooks/useUser'

import PUBLIC from '@/routes/public'
import PRIVATE from '@/routes/private'

function App() {
  return (
    <BrowserRouter>
      <Routes>
        {/* public to all users */}
        {PUBLIC.map((route, key) => (
          <Route key={key} path={route.path} element={route.element} />
        ))}
        {/* private for authenticated users */}
        {PRIVATE.map((route, key) => (
          <Route
            key={key}
            path={route.path}
            element={<Private>{route.element}</Private>}
          />
        ))}
      </Routes>
    </BrowserRouter>
  )
}

const Private: React.FC<{
  children: React.ReactNode
}> = ({ children }) => {
  const { loading, authenticated } = useUser()

  if (loading) {
    return <></>
  }

  return authenticated ? children : <Navigate to="/signin" replace />
}

export default App
