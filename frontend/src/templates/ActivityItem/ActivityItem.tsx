import { format } from 'date-fns'
import { ptBR } from 'date-fns/locale'
import Accordion from '@mui/material/Accordion'
import AccordionSummary from '@mui/material/AccordionSummary'
import AccordionDetails from '@mui/material/AccordionDetails'
import ExpandMoreIcon from '@mui/icons-material/ExpandMore'
import Typography from '@mui/material/Typography'
import ListItem from '@mui/material/ListItem'
import ListItemText from '@mui/material/ListItemText'
import ListItemAvatar from '@mui/material/ListItemAvatar'
import Avatar from '@mui/material/Avatar'
import Button from '@mui/material/Button'
import AssignmentIcon from '@mui/icons-material/AssignmentOutlined'

interface ActivityItemProps {
  name: string
  description: string
  dueDate: Date
  date: Date
}

export function ActivityItem(props: ActivityItemProps) {
  const { name, description } = props

  const dueDate = format(props.dueDate, "EEEE, d 'de' MMM 'de' yyyy", {
    locale: ptBR,
  })

  const date = format(props.date, "d 'de' MMM 'de' yyyy", {
    locale: ptBR,
  })

  return (
    <Accordion>
      <AccordionSummary color="grey.100" expandIcon={<ExpandMoreIcon />}>
        <ListItem>
          <ListItemAvatar>
            <Avatar sx={{ bgcolor: 'primary.main' }}>
              <AssignmentIcon />
            </Avatar>
          </ListItemAvatar>
          <ListItemText primary={name} secondary={dueDate} />
        </ListItem>
      </AccordionSummary>
      <AccordionDetails>
        <Typography gutterBottom color="text.secondary" variant="body2">
          Postada em: {date}
        </Typography>
        <Typography gutterBottom>{description}</Typography>
        <Button size="small" sx={{ textTransform: 'none' }}>
          Ver detalhes
        </Button>
      </AccordionDetails>
    </Accordion>
  )
}
