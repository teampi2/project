import * as React from 'react'
import Button from '@/components/Button'
import Dialog from '@mui/material/Dialog'
import TextField from '@mui/material/TextField'
import DialogTitle from '@mui/material/DialogTitle'
import DialogContent from '@mui/material/DialogContent'
import DialogActions from '@mui/material/DialogActions'
import Stack from '@mui/material/Stack'
import useSchools from '@/hooks/useSchools'

export function CreateSchoolDialog() {
  const { openCreateDialog, handleToggleCreateDialog, handleCreateSchool } =
    useSchools()

  const [form, setForm] = React.useState<ICreateSchoolData>({
    name: '',
    cnpj: '',
    address: '',
    email: '',
    phone: '',
  })

  const data = Object.fromEntries(
    Object.entries(form).filter(([, value]) => value != '')
  )

  const required = !['name', 'cnpj', 'address', 'email'].every(
    (field) => field in data
  )

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setForm({ ...form, [e.target.name]: e.target.value })
  }

  const handleSubmit = () => {
    handleCreateSchool(data as ICreateSchoolData)
    handleToggleCreateDialog()
  }

  return (
    <Dialog
      fullWidth
      open={openCreateDialog}
      onClose={handleToggleCreateDialog}
    >
      <DialogTitle>Criar escola</DialogTitle>
      <DialogContent>
        <Stack
          noValidate
          component="form"
          autoComplete="off"
          direction="column"
          spacing={1}
        >
          <TextField
            fullWidth
            name="name"
            variant="filled"
            label="Nome da escola (obrigatório)"
            onChange={handleChange}
          />
          <TextField
            fullWidth
            name="cnpj"
            variant="filled"
            label="CNPJ da escola (obrigatório)"
            onChange={handleChange}
          />
          <TextField
            fullWidth
            name="address"
            variant="filled"
            label="Endereço (obrigatório)"
            onChange={handleChange}
          />
          <TextField
            fullWidth
            name="email"
            variant="filled"
            label="E-mail (obrigatório)"
            onChange={handleChange}
          />
          <TextField
            fullWidth
            name="phone"
            variant="filled"
            label="Telefone"
            onChange={handleChange}
          />
        </Stack>
      </DialogContent>
      <DialogActions>
        <Button onClick={handleToggleCreateDialog}>Cancelar</Button>
        <Button disabled={required} onClick={handleSubmit}>
          Criar
        </Button>
      </DialogActions>
    </Dialog>
  )
}
