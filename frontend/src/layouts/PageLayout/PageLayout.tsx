import Container from '@mui/material/Container'
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
      <Menu />
      <Container maxWidth="xl" sx={{ paddingY: { xs: 2, md: 3 } }}>
        {children}
      </Container>
    </>
  )
}
