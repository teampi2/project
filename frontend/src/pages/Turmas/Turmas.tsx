import PageLayout from '@/layouts/PageLayout'
import Classes from '@/templates/Classes'
import Tooltip from '@mui/material/Tooltip'
import Fab from '@mui/material/Fab'
import AddIcon from '@mui/icons-material/Add'

export function Turmas() {
  return (
    <PageLayout>
      <Classes />
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
