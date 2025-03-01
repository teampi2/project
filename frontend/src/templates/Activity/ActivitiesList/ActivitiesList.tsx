import * as React from 'react'
import Box from '@mui/material/Box'
import Tab from '@mui/material/Tab'
import TabContext from '@mui/lab/TabContext'
import TabList from '@mui/lab/TabList'
import ActivitiesCreatedList from '@/templates/Activity/ActivitiesCreatedList'
import ActivitiesPendingList from '@/templates/Activity/ActivitiesPendingList'
import ActivitiesSubmitedList from '@/templates/Activity/ActivitiesSubmittedList'
import { TabPanel as MuiTabPanel } from '@mui/lab'
import { styled } from '@mui/material/styles'

const TabPanel = styled(MuiTabPanel)(({ theme }) => ({
  marginInline: 'auto',
  maxWidth: theme.breakpoints.values.md,
  [theme.breakpoints.down('md')]: {
    paddingInline: 0,
  },
}))

export function ActivitiesList() {
  const [value, setValue] = React.useState('1')

  const handleChange = (_: React.SyntheticEvent, newValue: string) => {
    setValue(newValue)
  }

  return (
    <TabContext value={value}>
      <Box sx={{ borderBottom: 1, borderColor: 'divider' }}>
        <TabList onChange={handleChange}>
          <Tab label="Atribuído" value="1" />
          <Tab label="Pendente" value="2" />
          <Tab label="Concluída" value="3" />
        </TabList>
      </Box>
      <TabPanel value="1">
        <ActivitiesCreatedList />
      </TabPanel>
      <TabPanel value="2">
        <ActivitiesPendingList />
      </TabPanel>
      <TabPanel value="3">
        <ActivitiesSubmitedList />
      </TabPanel>
    </TabContext>
  )
}
