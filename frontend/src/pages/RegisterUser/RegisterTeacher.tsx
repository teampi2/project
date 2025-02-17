import Container from '@mui/material/Container'
import Button from '@mui/material/Button'
import Box from '@mui/material/Box'
import { TextField, Stack } from "@mui/material"
import InputAdornment from '@mui/material/InputAdornment'
import EmailIcon from '@mui/icons-material/Email'
import PhoneAndroidIcon from '@mui/icons-material/PhoneAndroid'
import LockIcon from '@mui/icons-material/Lock'
import PersonIcon from '@mui/icons-material/Person'
import ArticleIcon from '@mui/icons-material/Article'
import Typography from '@mui/material/Typography'

export function RegisterTeacher(){
    return(
        <Container
        maxWidth="xs"
        sx={{
            height: "100vh",
            display: "flex",
            flexDirection: "column",
            justifyContent: "center",
            alignItems: "center",
        }}>

        <Stack spacing={0} alignItems="center">
          
        <Typography 
            variant="h5"
            fontWeight="bold"
            textAlign="center"
            mb={2}
            textTransform= "none"
            color= 'primary.main' >
            Cadastrar Professor(a)
            <Box sx={{ borderBottom: '1px solid green', width: '100%' }} />
          </Typography>


        </Stack>




          <Box
          sx={{
            border: "1px solid gray",
            borderRadius: "8px",
            padding: "20px",
            width: "100%",
            boxShadow: "2px 2px 10px rgba(0, 0, 0, 0.1)",
          }}>



          <form>
            
        <Stack spacing={3} alignItems="center">

        <TextField 
          fullWidth
          label="Nome"
          type="text"

          InputProps={{
            startAdornment: (
              <InputAdornment position="start">
                <PersonIcon />
              </InputAdornment>
            ),
            }}
        />
        <TextField 
          fullWidth
          label="Email"
          type="email"

          InputProps={{
            startAdornment: (
              <InputAdornment position="start">
                <EmailIcon />
              </InputAdornment>
            ),
            }}
        />

      <TextField 
          fullWidth
          label="CPF"
          type="text"

          InputProps={{
            startAdornment: (
              <InputAdornment position="start">
                <ArticleIcon />
              </InputAdornment>
            ),
            }}
        />

        <Box
          sx={{
            display: 'flex',
            flexDirection: 'row',
            justifyContent: 'center',
            alignItems: 'center',
            gap: 1,
          }}>
            
            <TextField 
              label="Data de Nascimento" 
              type="date" 
              fullWidth 
              InputLabelProps={{ shrink: true }} 
            />

            <TextField
              fullWidth
              label="Contato"
              type="tel"
              placeholder="(99) 99999-9999"
              
                InputProps={{
                  startAdornment: (
                    <InputAdornment position="start">
                      <PhoneAndroidIcon />
                    </InputAdornment>
                  ),
                }}
            />    
        </Box>

            <TextField 
              fullWidth
              label="Senha" 
              type="password"

              InputProps={{
                startAdornment: (
                  <InputAdornment position="start">
                    <LockIcon />
                  </InputAdornment>
                ),
                }}
            />

            <Box
              sx={{
                display: 'flex',
                flexDirection: 'row',
                justifyContent: 'center',
                alignItems: 'center',
                gap: 10,
              }}>

            <Button variant="contained" type="submit">
              Cancelar
            </Button>
              
            <Button variant="contained" type="submit">
              Cadastrar
            </Button>
            
            </Box>

          
        </Stack>
      </form>
          </Box>
        
        </Container>
    )
}

