import PageLayout from '@/layouts/PageLayout'
import SchoolsList from '@/templates/SchoolsList'
import Tooltip from '@mui/material/Tooltip'
import Fab from '@mui/material/Fab'
import AddIcon from '@mui/icons-material/Add'

export function Dashboard() {
  return (
    <PageLayout>
      <SchoolsList />
      <Tooltip title="Adicionar Escola">
        <Fab
          color="primary"
          sx={(theme) => ({
            position: 'fixed',
            bottom: theme.spacing(4),
            right: theme.spacing(4),
          })}
        >
          <AddIcon />
        </Fab>
      </Tooltip>
    </PageLayout>
  )
}
