import * as React from 'react'
import PageLayout from '@/layouts/PageLayout'

import Box from '@mui/material/Box'
import Button from '@mui/material/Button'
import FormControl from '@mui/material/FormControl'
import FormLabel from '@mui/material/FormLabel'
import IconButton from '@mui/material/IconButton'
import TextField from '@mui/material/TextField'
import Typography from '@mui/material/Typography'
import Input from '@mui/material/Input'
import Paper from '@mui/material/Paper'
import Link from '@mui/material/Link'

import FormatBoldIcon from '@mui/icons-material/FormatBold'
import KeyboardArrowDownIcon from '@mui/icons-material/KeyboardArrowDown'
import FormatItalicIcon from '@mui/icons-material/FormatItalic'
import AttachFileIcon from '@mui/icons-material/AttachFile'

import { green } from '@mui/material/colors'
import { useParams } from 'react-router-dom'

export function Activity() {
  const { id } = useParams() as { id: string }

  const handleFileChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    if (event.target.files && event.target.files.length > 0) {
      const file = event.target.files[0]
      if (file.type === 'application/pdf') {
        console.log(file)
      } else {
        alert('Por favor, selecione um arquivo PDF.')
      }
    }
  }

  return (
    <PageLayout>
      <Box sx={{ maxWidth: 600, mx: 'auto' }}>
        <Typography variant="h5" fontWeight="bold" gutterBottom>
          Atividade {id}
        </Typography>

        <Paper
          elevation={3}
          sx={{
            p: 2,
            mb: 2,
            backgroundColor: (theme) =>
              theme.palette.mode === 'light'
                ? green[50]
                : theme.palette.background.paper,
            borderLeft: '4px solid #388e3c',
            textAlign: 'center',
          }}
        >
          <Typography variant="subtitle1" fontWeight="bold">
            Sua pontuação:
          </Typography>

          <Typography variant="body2" color="text.secondary">
            Nota ainda não atribuída.
          </Typography>
        </Paper>

        <Paper
          elevation={3}
          sx={{
            p: 2,
            mb: 2,
            backgroundColor: (theme) =>
              theme.palette.mode === 'light'
                ? 'grey.50'
                : theme.palette.background.paper,
            borderLeft: '4px solid green',
          }}
        >
          <Typography variant="subtitle1" fontWeight="bold">
            Descrição:
          </Typography>
          <Typography gutterBottom variant="body2" color="text.secondary">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
            eiusmod tempor incididunt ut labore et dolore magna aliqua. Rhoncus
            dolor purus non enim praesent elementum facilisis leo vel. Risus at
            ultrices mi tempus imperdiet. Semper risus in hendrerit gravida
            rutrum quisque non tellus. Convallis convallis tellus id interdum
            velit laoreet id donec ultrices. Odio morbi quis commodo odio aenean
            sed adipiscing.
          </Typography>
        </Paper>

        <Paper
          elevation={3}
          sx={{
            p: 2,
            mb: 2,
            backgroundColor: (theme) =>
              theme.palette.mode === 'light'
                ? 'grey.50'
                : theme.palette.background.paper,
            borderLeft: '4px solid green',
          }}
        >
          <Typography variant="subtitle1" fontWeight="bold">
            Anexos:
          </Typography>
          <Link href="#" target="_blank" rel="noopener" download>
            <Button
              component="span"
              variant="outlined"
              startIcon={<AttachFileIcon />}
            >
              Enviar atividade
            </Button>
          </Link>
        </Paper>

        <FormControl fullWidth>
          <FormLabel>Comentário</FormLabel>
          <TextField placeholder="Digite algo aqui..." multiline minRows={3} />
          <Box
            sx={{
              pt: 1,
              gap: 1,
              flex: 'auto',
              display: 'flex',
              borderTop: '1px solid',
              borderColor: 'divider',
              alignItems: 'center',
            }}
          >
            <IconButton>
              <FormatBoldIcon />
              <KeyboardArrowDownIcon fontSize="small" />
            </IconButton>

            <IconButton>
              <FormatItalicIcon />
            </IconButton>

            <Input
              type="file"
              id="file-upload"
              inputProps={{ accept: 'application/pdf' }}
              sx={{ display: 'none' }}
              onChange={handleFileChange}
            />

            <Button variant="contained" sx={{ ml: 'auto' }}>
              Enviar
            </Button>
          </Box>
        </FormControl>
      </Box>
    </PageLayout>
  )
}
