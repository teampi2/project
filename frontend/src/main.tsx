import { StrictMode } from 'react'
import { createRoot } from 'react-dom/client'
import App from './App.tsx'
import './index.css'

import { CssBaseline, ThemeProvider } from '@mui/material'
import theme from '@/config/theme'
import HeaderProvider from '@/providers/HeaderProvider'

createRoot(document.getElementById('root')!).render(
  <StrictMode>
    <ThemeProvider theme={theme}>
      <CssBaseline />
      <HeaderProvider>
        <App />
      </HeaderProvider>
    </ThemeProvider>
  </StrictMode>
)
