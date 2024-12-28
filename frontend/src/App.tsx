import { BrowserRouter, Route, Routes } from 'react-router-dom'

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
          <Route key={key} path={route.path} element={route.element} />
        ))}
      </Routes>
    </BrowserRouter>
  )
}

export default App
