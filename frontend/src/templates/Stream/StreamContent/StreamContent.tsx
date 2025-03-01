import Box from '@mui/material/Box'
import Grid from '@mui/material/Grid2'
import Stack from '@mui/material/Stack'
import StreamBanner from '@/templates/Stream/StreamBanner'
import Announcement from '@/templates/Stream/StreamContent/Announcement'
import stringToColor from '@/functions/stringToColor'

interface StreamContentProps {
  cls: IClass
}

export function StreamContent(props: StreamContentProps) {
  const { cls } = props

  return (
    <Box maxWidth={1000} marginInline="auto">
      <StreamBanner name={cls.name} bgcolor={stringToColor(cls.name)} />
      <Grid container spacing={2}>
        <Grid size={{ xs: 0, lg: 2 }} />
        <Grid size={{ xs: 12, lg: 10 }}>
          <Stack marginTop={4} spacing={3}>
            {[...Array(3)].map((_, index) => (
              <Announcement
                key={index}
                author="Nome do autor(a)"
                date={new Date()}
                announcement="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Rhoncus
          dolor purus non enim praesent elementum facilisis leo vel. Risus at
          ultrices mi tempus imperdiet. Semper risus in hendrerit gravida rutrum
          quisque non tellus. Convallis convallis tellus id interdum velit
          laoreet id donec ultrices. Odio morbi quis commodo odio aenean sed
          adipiscing."
              />
            ))}
          </Stack>
        </Grid>
      </Grid>
    </Box>
  )
}
