import PageLayout from '@/layouts/PageLayout'
import ClassesList from '@/templates/Class/ClassesList'
import CreateClassDialog from '@/templates/Class/CreateClassDialog'
import UpdateClassDialog from '@/templates/Class/UpdateClassDialog'
import Tooltip from '@mui/material/Tooltip'
import Fab from '@mui/material/Fab'
import AddIcon from '@mui/icons-material/Add'
import useClasses from '@/hooks/useClasses'

export function Classes() {
  const { handleToggleCreateDialog } = useClasses()

  return (
    <PageLayout>
      <ClassesList />
      <Tooltip title="Adicionar Turma">
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
      <CreateClassDialog />
      <UpdateClassDialog />
    </PageLayout>
  )
}
