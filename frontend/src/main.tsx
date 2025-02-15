import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import App from './App.tsx'
import './index.css'

import theme from '@/config/theme'
import { CssBaseline, ThemeProvider } from '@mui/material'
import HeaderProvider from '@/providers/HeaderProvider'
import SchoolsProvider from '@/providers/SchoolsProvider'

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <ThemeProvider theme={theme}>
      <CssBaseline />
      <HeaderProvider>
        <SchoolsProvider>
          <App />
        </SchoolsProvider>
      </HeaderProvider>
    </ThemeProvider>
  </StrictMode>
)
