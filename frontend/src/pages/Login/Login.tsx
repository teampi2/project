import OutlinedInput from '@mui/material/OutlinedInput'
import InputAdornment from '@mui/material/InputAdornment'
import Container from '@mui/material/Container'
import Stack from '@mui/material/Stack'
import Link from '@mui/material/Link'
import Button from '@mui/material/Button'
import EmailIcon from '@mui/icons-material/Email'
import LockIcon from '@mui/icons-material/Lock'

export function Login() {
  return (
    <Container
      maxWidth="xs"
      sx={{
        height: '100vh',
        display: 'flex',
        flexDirection: 'column',
        justifyContent: 'center',
      }}
    >
      <form>
        <Stack spacing={3} alignItems="center" justifyContent="center">
          <OutlinedInput
            fullWidth
            placeholder="Email"
            startAdornment={
              <InputAdornment position="start">
                <EmailIcon />
              </InputAdornment>
            }
          />
          <OutlinedInput
            fullWidth
            type="password"
            placeholder="Senha"
            startAdornment={
              <InputAdornment position="start">
                <LockIcon />
              </InputAdornment>
            }
          />
          <Link href="#" underline="none">
            Esqueci minha senha
          </Link>
          <Button variant="contained" sx={{ maxWidth: '8rem' }}>
            Entrar
          </Button>
        </Stack>
      </form>
    </Container>
  )
}
