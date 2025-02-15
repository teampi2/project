import PageLayout from '@/layouts/PageLayout'
import ProfileSettings from '@/templates/ProfileSettings'
import Box from '@mui/material/Box'

export function Settings() {
  return (
    <PageLayout>
      <Box sx={{ maxWidth: 'md', mx: 'auto' }}>
        <ProfileSettings />
      </Box>
    </PageLayout>
  )
}
