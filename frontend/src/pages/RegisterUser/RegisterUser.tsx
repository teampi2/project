import Container from '@mui/material/Container'
import Button from '@mui/material/Button'
import Box from '@mui/material/Box'
import {School,} from '@mui/icons-material'
import ManageAccountsIcon from '@mui/icons-material/ManageAccounts'
import SquareFootIcon from '@mui/icons-material/SquareFoot'
import BusinessCenterIcon from '@mui/icons-material/BusinessCenter'

export function RegisterUser() {
  return (
  
    <Container
    maxWidth="xs"
    sx={{
      height: '100vh',
      display: 'flex',
      flexDirection: 'column',
      justifyContent: 'center',
      alignItems: 'center',
    }}
  >
    <Box
      sx={{
        display: 'flex',
        justifyContent: 'center',  
        width: '100%',              
        gap: '100px',   
      }}
    >
      <Box
        sx={{
          display: 'flex',
          flexDirection: 'column',
          justifyContent: 'center',
          alignItems: 'center',
          gap: 1,
        }}
      >
        <School sx={{ fontSize: 100, color: 'primary.main'}} />
        <Button variant="contained" sx={{ minWidth: '120px' }}> Professor </Button>
      </Box>
      
      <Box
        sx={{
          display: 'flex',
          flexDirection: 'column',
          justifyContent: 'center',
          alignItems: 'center',
          gap: 1,
        }}
      >
        <SquareFootIcon sx={{ fontSize: 100, color: 'primary.main'}} />
        <Button variant="contained" sx={{ minWidth: '120px' }}>Aluno</Button>
      </Box>

      <Box
        sx={{
          display: 'flex',
          flexDirection: 'column',
          justifyContent: 'center',
          alignItems: 'center',
          gap: 1,
        }}
      >
        <ManageAccountsIcon sx={{ fontSize: 100, color: 'primary.main'}} />
        <Button variant="contained" sx={{ minWidth: '120px' }}>Coordenador</Button>
      </Box>

      <Box
        sx={{
          display: 'flex',
          flexDirection: 'column',
          justifyContent: 'center',
          alignItems: 'center',
          gap: 1,
        }}
      >
        <BusinessCenterIcon sx={{ fontSize: 100, color: 'primary.main'}} />
        <Button variant="contained" sx={{ minWidth: '120px' }}>Monitor</Button>
      </Box>

    </Box>
    </Container>
  )
}

