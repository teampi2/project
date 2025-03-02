import React from 'react'
import Box from '@mui/material/Box'
import Avatar from '@mui/material/Avatar'
import Button from '@mui/material/Button'
import CssBaseline from '@mui/material/CssBaseline'
import TextField from '@mui/material/TextField'
import FormControlLabel from '@mui/material/FormControlLabel'
import Checkbox from '@mui/material/Checkbox'
import LockOutlinedIcon from '@mui/icons-material/LockOutlined'
import Typography from '@mui/material/Typography'
import Container from '@mui/material/Container'
import Anchor from '@mui/material/Link'
import { Link } from 'react-router-dom'
import api from '@/lib/axios'

export function SignIn() {
  const handleSubmit = async (event: React.ChangeEvent<HTMLFormElement>) => {
    event.preventDefault()
    const { email, password } = event.target as HTMLFormElement

    const response = await api.user.login({
      email: email.value,
      password: password.value,
    })

    console.log(response.data)
  }

  return (
    <Container component="main" maxWidth="xs">
      <CssBaseline />
      <Box
        sx={{
          marginTop: 8,
          display: 'flex',
          flexDirection: 'column',
          alignItems: 'center',
        }}
      >
        <Avatar sx={{ m: 1, w: 64, h: 64, bgcolor: 'secondary.main' }}>
          <LockOutlinedIcon />
        </Avatar>
        <Typography component="h1" variant="h4">
          Login
        </Typography>
        <Box component="form" onSubmit={handleSubmit} noValidate sx={{ mt: 1 }}>
          <TextField
            required
            fullWidth
            name="email"
            margin="normal"
            variant="outlined"
            label="E-mail"
            autoFocus
          />
          <TextField
            required
            fullWidth
            name="password"
            type="password"
            margin="normal"
            variant="outlined"
            label="Senha"
          />
          <FormControlLabel
            control={<Checkbox value="remember" color="primary" />}
            label="Lembre-se de mim"
          />
          <Button
            fullWidth
            type="submit"
            color="primary"
            variant="contained"
            sx={{ mt: 3, mb: 2 }}
          >
            Entrar
          </Button>
          <Box textAlign="center">
            Ainda não possui uma conta?{' '}
            <Anchor component={Link} to="#" variant="body2">
              Cadastre-se
            </Anchor>
          </Box>
        </Box>
      </Box>
    </Container>
  )
}
