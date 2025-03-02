/* eslint-disable @typescript-eslint/no-unused-vars */
import {
  FormatBold,
  KeyboardArrowDown,
  FormatItalic,
  AttachFile,
  Download,
} from '@mui/icons-material'
import {
  Box,
  Button,
  FormControl,
  FormLabel,
  IconButton,
  TextField,
  Typography,
  Input,
  Paper,
  CircularProgress,
  Link,
} from '@mui/material'
import React, { useState, useEffect } from 'react'
import PageLayout from '@/layouts/PageLayout'

export function Tasks() {
  const [italic, setItalic] = useState(false)
  const [fontWeight, setFontWeight] = useState('normal')
  const [anchorEl, setAnchorEl] = useState<null | HTMLElement>(null)
  const [selectedFile, setSelectedFile] = useState<File | null>(null)

  const [title, setTitle] = useState<string | null>(null)
  const [instructions, setInstructions] = useState<string | null>(null)
  const [pontuation, setPontuation] = useState<number | null>(null)
  const [teacherPdf, setTeacherPdf] = useState<string | null>(null)

  const [loading, setLoading] = useState(true)

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch('https://api')
        const data = await response.json()

        setTitle(data.title)
        setInstructions(data.instructions)
        setPontuation(data.score)
        setTeacherPdf(data.pdfUrl)
      } catch (error) {
        console.error('Erro ao buscar os dados da atividade:', error)
        setTitle('Atividade.')
        setInstructions(
          'Erro ao carregar as instruções. Tente novamente mais tarde.'
        )
        setPontuation(null)
        setTeacherPdf(null)
      } finally {
        setLoading(false)
      }
    }
    fetchData()
  }, [])

  const handleFileChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    if (event.target.files && event.target.files.length > 0) {
      const file = event.target.files[0]
      if (file.type === 'application/pdf') {
        setSelectedFile(file)
      } else {
        alert('Por favor, selecione um arquivo PDF.')
      }
    }
  }

  return (
    <PageLayout>
      <Box sx={{ maxWidth: 600, mx: 'auto' }}>
        {loading ? (
          <Box display="flex" justifyContent="center" my={2}>
            <CircularProgress size={24} />
          </Box>
        ) : (
          <Typography variant="h5" fontWeight="bold" gutterBottom>
            {title}
          </Typography>
        )}

        {loading ? (
          <Box display="flex" justifyContent="center" my={2}>
            <CircularProgress size={24} />
          </Box>
        ) : (
          instructions && (
            <Paper
              elevation={3}
              sx={{
                p: 2,
                mb: 2,
                backgroundColor: '#f9f9f9',
                borderLeft: '4px solid green',
              }}
            >
              <Typography variant="subtitle1" fontWeight="bold">
                Instruções do Professor:
              </Typography>
              <Typography variant="body2" color="text.secondary">
                {instructions}
              </Typography>
            </Paper>
          )
        )}

        {loading ? (
          <Box display="flex" justifyContent="center" my={2}>
            <CircularProgress size={24} />
          </Box>
        ) : teacherPdf ? (
          <Paper
            elevation={3}
            sx={{
              p: 2,
              mb: 2,
              backgroundColor: '#e3f2fd',
              borderLeft: '4px solid green',
            }}
          >
            <Typography variant="subtitle1" fontWeight="bold">
              Arquivo do Professor:
            </Typography>
            <Link href={teacherPdf} target="_blank" rel="noopener" download>
              <Button variant="outlined" startIcon={<Download />}>
                Baixar PDF
              </Button>
            </Link>
          </Paper>
        ) : (
          <Typography variant="body2" color="text.secondary" mb={2}>
            Nenhum arquivo disponível para download.
          </Typography>
        )}

        <Paper
          elevation={3}
          sx={{
            p: 2,
            mb: 2,
            backgroundColor: '#f1f8e9',
            borderLeft: '4px solid #388e3c',
            textAlign: 'center',
          }}
        >
          <Typography variant="subtitle1" fontWeight="bold">
            Sua Pontuação:
          </Typography>

          {loading ? (
            <CircularProgress size={24} sx={{ mt: 1 }} />
          ) : pontuation !== null ? (
            <Typography variant="h4" color="primary" fontWeight="bold">
              {pontuation}/10
            </Typography>
          ) : (
            <Typography variant="body2" color="text.secondary">
              Nota ainda não atribuída.
            </Typography>
          )}
        </Paper>

        <FormControl fullWidth>
          <FormLabel>Seu comentário</FormLabel>
          <TextField
            placeholder="Digite algo aqui..."
            multiline
            minRows={3}
            InputProps={{
              sx: {
                fontWeight,
                fontStyle: italic ? 'italic' : 'normal',
              },
            }}
          />
          <Box
            sx={{
              display: 'flex',
              gap: 1,
              pt: 1,
              borderTop: '1px solid',
              borderColor: 'divider',
              flex: 'auto',
              alignItems: 'center',
            }}
          >
            <IconButton onClick={(event) => setAnchorEl(event.currentTarget)}>
              <FormatBold />
              <KeyboardArrowDown fontSize="small" />
            </IconButton>

            <IconButton
              color={italic ? 'primary' : 'default'}
              onClick={() => setItalic((prev) => !prev)}
            >
              <FormatItalic />
            </IconButton>

            <Input
              type="file"
              inputProps={{ accept: 'application/pdf' }}
              sx={{ display: 'none' }}
              id="file-upload"
              onChange={handleFileChange}
            />
            <label htmlFor="file-upload">
              <Button
                variant="outlined"
                component="span"
                startIcon={<AttachFile />}
              >
                Anexar PDF
              </Button>
            </label>

            <Button sx={{ ml: 'auto' }}>Enviar</Button>
          </Box>
        </FormControl>
      </Box>
    </PageLayout>
  )
}
