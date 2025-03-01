import * as React from 'react'
import Box from '@mui/material/Box'
import Tab from '@mui/material/Tab'
import TabContext from '@mui/lab/TabContext'
import TabList from '@mui/lab/TabList'
import StreamContent from '@/templates/Stream/StreamContent'
import ActivitiesContent from '@/templates/Stream/ActivitiesContent'
import PeopleContent from '@/templates/Stream/PeopleContent'
import { TabPanel as MuiTabPanel } from '@mui/lab'
import { styled } from '@mui/material/styles'
import { useParams } from 'react-router-dom'
import useClasses from '@/hooks/useClasses'
import NotFound from '@/404'

const TabPanel = styled(MuiTabPanel)(({ theme }) => ({
  marginInline: 'auto',
  maxWidth: theme.breakpoints.values.lg,
  [theme.breakpoints.down('lg')]: {
    paddingInline: 0,
  },
}))

export function StreamTabs() {
  const { id } = useParams() as { id: string }
  const { handleFindClass } = useClasses()
  const [value, setValue] = React.useState('1')

  const handleChange = (_: React.SyntheticEvent, newValue: string) => {
    setValue(newValue)
  }

  let cls: IClass | null

  try {
    cls = handleFindClass(+id)
  } catch {
    return <NotFound />
  }

  return (
    <TabContext value={value}>
      <Box sx={{ borderBottom: 1, borderColor: 'divider' }}>
        <TabList onChange={handleChange}>
          <Tab label="Mural" value="1" />
          <Tab label="Atividades" value="2" />
          <Tab label="Pessoas" value="3" />
        </TabList>
      </Box>
      <TabPanel value="1">
        <StreamContent cls={cls} />
      </TabPanel>
      <TabPanel value="2">
        <ActivitiesContent />
      </TabPanel>
      <TabPanel value="3">
        <PeopleContent />
      </TabPanel>
    </TabContext>
  )
}
