import Stack from '@mui/material/Stack'
import Card from '@/templates/Card'

export function ClassesList() {
  return (
    <Stack
      useFlexGap
      direction="row"
      sx={{ flexWrap: 'wrap' }}
      spacing={{ xs: 1, sm: 2 }}
    >
      {[...Array(8)].map((_, index) => (
        <Card
          to="#"
          title={'Turma ' + ++index}
          subtitle="Nome do Coodenador(a)"
        />
      ))}
    </Stack>
  )
}
