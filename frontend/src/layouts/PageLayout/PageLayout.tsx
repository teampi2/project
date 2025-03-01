import Box from '@mui/material/Box'
import Header from '@/templates/Header'
import Menu from '@/templates/Menu'

interface PageLayoutProps {
  children: React.ReactNode
}

export function PageLayout(props: PageLayoutProps) {
  const { children } = props

  return (
    <>
      <Header />
      <Box sx={{ display: 'flex' }}>
        <Menu />
        <Box component="main" sx={{ flexGrow: 1, p: 3 }}>
          {children}
        </Box>
      </Box>
    </>
  )
}
