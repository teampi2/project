import Box from '@mui/material/Box'
import Truncate from '@/components/Truncate'

interface StreamBannerProps {
  name: string
  bgcolor: string
}

export function StreamBanner(props: StreamBannerProps) {
  const { name, bgcolor } = props

  return (
    <Box
      sx={{
        padding: 2,
        width: '100%',
        height: 240,
        borderRadius: 2,
        placeContent: 'end',
        bgcolor,
      }}
    >
      <Truncate
        width="100%"
        component="h1"
        fontSize="2.25rem"
        lineHeight="2.75rem"
        fontWeight={500}
        color="white"
      >
        {name}
      </Truncate>
    </Box>
  )
}
