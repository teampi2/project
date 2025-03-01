import * as React from 'react'
import Button from '@/components/Button'
import Dialog from '@mui/material/Dialog'
import TextField from '@mui/material/TextField'
import DialogTitle from '@mui/material/DialogTitle'
import DialogContent from '@mui/material/DialogContent'
import DialogActions from '@mui/material/DialogActions'
import Stack from '@mui/material/Stack'
import useSchools from '@/hooks/useSchools'

export function UpdateSchoolDialog() {
  const {
    currentSchool,
    openUpdateDialog: open,
    handleToggleUpdateDialog: handleClose,
    handleUpdateSchool,
  } = useSchools()

  const [form, setForm] = React.useState<IUpdateSchoolData>({
    name: '',
    cnpj: '',
    address: '',
    email: '',
    phone: '',
  })

  React.useEffect(() => {
    if (currentSchool == null) return

    setForm({
      name: currentSchool.name,
      cnpj: currentSchool.cnpj,
      address: currentSchool.address,
      email: currentSchool.email,
      phone: currentSchool.phone,
    })
  }, [currentSchool])

  if (currentSchool == null) {
    return <></>
  }

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
    handleUpdateSchool(currentSchool.id, data as IUpdateSchoolData)
    handleClose()
  }

  return (
    <Dialog fullWidth open={open} onClose={handleClose}>
      <DialogTitle>Editar escola</DialogTitle>
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
            value={form.name}
            onChange={handleChange}
          />
          <TextField
            fullWidth
            name="cnpj"
            variant="filled"
            label="CNPJ da escola (obrigatório)"
            value={form.cnpj}
            onChange={handleChange}
          />
          <TextField
            fullWidth
            name="address"
            variant="filled"
            label="Endereço (obrigatório)"
            value={form.address}
            onChange={handleChange}
          />
          <TextField
            fullWidth
            name="email"
            variant="filled"
            label="E-mail (obrigatório)"
            value={form.email}
            onChange={handleChange}
          />
          <TextField
            fullWidth
            name="phone"
            variant="filled"
            label="Telefone"
            value={form.phone}
            onChange={handleChange}
          />
        </Stack>
      </DialogContent>
      <DialogActions>
        <Button onClick={handleClose}>Cancelar</Button>
        <Button disabled={required} onClick={handleSubmit}>
          Salvar
        </Button>
      </DialogActions>
    </Dialog>
  )
}
