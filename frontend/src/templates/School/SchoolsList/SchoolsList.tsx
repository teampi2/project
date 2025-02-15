import Stack from '@mui/material/Stack'
import SchoolsListItem from '@/templates/School/SchoolsListItem'
import useSchools from '@/hooks/useSchools'

export function SchoolsList() {
  const { schools } = useSchools()

  return (
    <Stack
      useFlexGap
      direction="row"
      sx={{ flexWrap: 'wrap' }}
      spacing={{ xs: 1, sm: 2 }}
    >
      {schools.map((school, index) => (
        <SchoolsListItem key={index} school={school} />
      ))}
    </Stack>
  )
}
