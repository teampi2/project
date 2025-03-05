import Card from '@mui/material/Card'
import CardHeader from '@mui/material/CardHeader'
import CardContent from '@mui/material/CardContent'
import Typography from '@mui/material/Typography'
import Box from '@mui/material/Box'
import Avatar from '@mui/material/Avatar'
import Button from '@/components/Button'
import useUser from '@/hooks/useUser'

export function ProfileSettings() {
  const { signout } = useUser()

  return (
    <Card>
      <CardHeader title={<Typography variant="h4">Perfil</Typography>} />
      <CardContent>
        <Typography variant="subtitle2">Foto do perfil</Typography>
        <Box sx={{ display: 'flex', gap: 0.5, p: 1, mb: 2 }}>
          <Avatar sx={{ width: 32, height: 32 }} />
          <Button color="secondary">Alterar</Button>
        </Box>
        <Typography variant="subtitle2">Configurações da conta</Typography>
        <Typography gutterBottom variant="body2">
          Para mudar seu nome, fale com o administrador.
        </Typography>
        <Button uppercase color="secondary">
          Alterar Email
        </Button>
        <br />
        <Button uppercase color="secondary">
          Alterar Senha
        </Button>
        <br />
        <Button uppercase color="secondary" onClick={signout}>
          Sair da conta
        </Button>
      </CardContent>
    </Card>
  )
}
