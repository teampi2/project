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

export function UpdateClassDialog() {
  const {
    currentClass,
    openUpdateDialog,
    handleToggleUpdateDialog,
    handleUpdateClass,
  } = useClasses()

  const [form, setForm] = React.useState<IUpdateClassData>({
    name: '',
    shift: 'MORNING',
    academicYear: '',
  })

  React.useEffect(() => {
    if (currentClass == null) return

    setForm({
      name: currentClass.name,
      shift: currentClass.shift,
      academicYear: currentClass.academicYear,
    })
  }, [currentClass])

  if (currentClass == null) {
    return <></>
  }

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
    handleUpdateClass(currentClass?.id, data as IUpdateClassData)
    handleToggleUpdateDialog()
  }

  return (
    <Dialog
      fullWidth
      open={openUpdateDialog}
      onClose={handleToggleUpdateDialog}
    >
      <DialogTitle>Editar turma</DialogTitle>
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
            value={form.name}
            onChange={handleChange}
          />
          <FormControl fullWidth variant="filled">
            <InputLabel id="shift">Turno</InputLabel>
            <Select
              name="shift"
              label="Turno"
              labelId="shift"
              value={form.shift}
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
            value={form.academicYear}
            onChange={handleChange}
          />
        </Stack>
      </DialogContent>
      <DialogActions>
        <Button onClick={handleToggleUpdateDialog}>Cancelar</Button>
        <Button disabled={required} onClick={handleSubmit}>
          Salvar
        </Button>
      </DialogActions>
    </Dialog>
  )
}
