import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import App from './App.tsx'
import './index.css'

import theme from '@/config/theme'
import { CssBaseline, ThemeProvider } from '@mui/material'
import UserProvider from '@/providers/UserProvider'
import HeaderProvider from '@/providers/HeaderProvider'
import SchoolsProvider from '@/providers/SchoolsProvider'
import ClassesProvider from '@/providers/ClassesProvider'

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <ThemeProvider theme={theme}>
      <CssBaseline />
      <UserProvider>
        <HeaderProvider>
          <SchoolsProvider>
            <ClassesProvider>
              <App />
            </ClassesProvider>
          </SchoolsProvider>
        </HeaderProvider>
      </UserProvider>
    </ThemeProvider>
  </StrictMode>
)
