import { Button, Container } from '@mui/material'

export function Home() {
  return (
    <Container
      sx={{
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center',
        height: '100vh',
      }}
    >
      <Button variant="contained">Home</Button>
    </Container>
  )
}
