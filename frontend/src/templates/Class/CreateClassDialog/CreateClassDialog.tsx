import * as React from 'react'
import Button from '@/components/Button'
import Dialog from '@mui/material/Dialog'
import TextField from '@mui/material/TextField'
import MenuItem from '@mui/material/MenuItem'
import InputLabel from '@mui/material/InputLabel'
import FormControl from '@mui/material/FormControl'
import Select, { SelectChangeEvent } from '@mui/material/Select'
import DialogTitle from '@mui/material/DialogTitle'
import DialogContent from '@mui/material/DialogContent'
import DialogActions from '@mui/material/DialogActions'
import Stack from '@mui/material/Stack'
import useClasses from '@/hooks/useClasses'

export function CreateClassDialog() {
  const { openCreateDialog, handleToggleCreateDialog, handleCreateClass } =
    useClasses()

  const [form, setForm] = React.useState<ICreateClassData>({
    name: '',
    shift: 'MORNING',
    academicYear: '',
  })

  const data = Object.fromEntries(
    Object.entries(form).filter(([, value]) => value != '')
  )

  const required = !['name', 'shift', 'academicYear'].every(
    (field) => field in data
  )

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    setForm({ ...form, [e.target.name]: e.target.value })
  }

  const handleSelect = (e: SelectChangeEvent) => {
    setForm({ ...form, [e.target.name]: e.target.value })
  }

  const handleSubmit = () => {
    handleCreateClass(data as ICreateClassData)
    handleToggleCreateDialog()
  }

  return (
    <Dialog
      fullWidth
      open={openCreateDialog}
      onClose={handleToggleCreateDialog}
    >
      <DialogTitle>Criar turma</DialogTitle>
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
            label="Nome da turma (obrigatório)"
            onChange={handleChange}
          />
          <FormControl fullWidth variant="filled">
            <InputLabel id="shift">Turno</InputLabel>
            <Select
              name="shift"
              label="Turno"
              labelId="shift"
              defaultValue="MORNING"
              onChange={handleSelect}
            >
              <MenuItem value="MORNING">Matutino</MenuItem>
              <MenuItem value="AFTERNOON">Vespertino</MenuItem>
              <MenuItem value="NIGHT">Noturno</MenuItem>
            </Select>
          </FormControl>
          <TextField
            fullWidth
            name="academicYear"
            variant="filled"
            label="Ano letivo (obrigatório)"
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
