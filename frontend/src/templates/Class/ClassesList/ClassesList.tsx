import Stack from '@mui/material/Stack'
import ClassesListItem from '@/templates/Class/ClassesListItem'
import useClasses from '@/hooks/useClasses'

export function ClassesList() {
  const { classes } = useClasses()

  return (
    <Stack
      useFlexGap
      direction="row"
      sx={{ flexWrap: 'wrap' }}
      spacing={{ xs: 1, sm: 2 }}
    >
      {classes.map((cls, index) => (
        <ClassesListItem key={index} cls={cls} />
      ))}
    </Stack>
  )
}
