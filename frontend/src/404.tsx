import { Container, Typography, Button, Box } from '@mui/material'

export default function NotFound() {
  return (
    <Box display="flex" alignItems="center" height="100vh">
      <Container maxWidth="sm" sx={{ textAlign: 'center' }}>
        <Typography
          variant="h1"
          fontWeight="bold"
          color="grey.500"
          gutterBottom
        >
          404
        </Typography>
        <Typography variant="h4" fontWeight="semibold">
          Desculpe, não conseguimos encontrar a página que você está procurando.
        </Typography>
        <Typography variant="body1" color="grey.600" mt={2} mb={4}>
          Não se preocupe, você pode voltar à página inicial e continuar com
          suas atividades.
        </Typography>
        <Button size="large" variant="contained" href="/dashboard">
          Voltar à página inicial
        </Button>
      </Container>
    </Box>
  )
}
