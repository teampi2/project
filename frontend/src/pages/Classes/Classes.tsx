import PageLayout from '@/layouts/PageLayout'
import ClassesList from '@/templates/ClassesList'
import Tooltip from '@mui/material/Tooltip'
import Fab from '@mui/material/Fab'
import AddIcon from '@mui/icons-material/Add'

export function Classes() {
  return (
    <PageLayout>
      <ClassesList />
      <Tooltip title="Adicionar Turma">
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
