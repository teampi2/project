import PageLayout from '@/layouts/PageLayout'
import SchoolsList from '@/templates/School/SchoolsList'
import CreateSchoolDialog from '@/templates/School/CreateSchoolDialog'
import UpdateSchoolDialog from '@/templates/School/UpdateSchoolDialog'
import Fab from '@mui/material/Fab'
import Tooltip from '@mui/material/Tooltip'
import AddIcon from '@mui/icons-material/Add'
import useSchools from '@/hooks/useSchools'

export function Dashboard() {
  const { handleToggleCreateDialog } = useSchools()

  return (
    <PageLayout>
      <SchoolsList />
      <Tooltip title="Adicionar Escola">
        <Fab
          color="primary"
          onClick={handleToggleCreateDialog}
          sx={(theme) => ({
            position: 'fixed',
            bottom: theme.spacing(4),
            right: theme.spacing(4),
          })}
        >
          <AddIcon />
        </Fab>
      </Tooltip>
      <CreateSchoolDialog />
      <UpdateSchoolDialog />
    </PageLayout>
  )
}
