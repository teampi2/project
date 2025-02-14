import Stack from '@mui/material/Stack'
import ActivityItem from '@/templates/ActivityItem'

export function ActivitiesCreatedList() {
  return (
    <Stack>
      {[...Array(8)].map((_, index) => (
        <ActivityItem
          name={'Atividade ' + ++index}
          dueDate={new Date()}
          date={new Date()}
          description="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Rhoncus
          dolor purus non enim praesent elementum facilisis leo vel. Risus at
          ultrices mi tempus imperdiet. Semper risus in hendrerit gravida rutrum
          quisque non tellus. Convallis convallis tellus id interdum velit
          laoreet id donec ultrices. Odio morbi quis commodo odio aenean sed
          adipiscing."
        />
      ))}
    </Stack>
  )
}
