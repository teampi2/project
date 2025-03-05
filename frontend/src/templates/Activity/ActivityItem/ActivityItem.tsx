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
import AssignmentIcon from '@mui/icons-material/AssignmentOutlined'
import Button from '@/components/Button'
import { Link } from 'react-router-dom'

interface ActivityItemProps {
  id: number
  name: string
  description: string
  dueDate: Date
  date: Date
}

export function ActivityItem(props: ActivityItemProps) {
  const { id, name, description } = props

  const dueDate = format(props.dueDate, "EEEE, d 'de' MMM 'de' yyyy", {
    locale: ptBR,
  })
  const date = format(props.date, "d 'de' MMM 'de' yyyy", {
    locale: ptBR,
  })

  return (
    <Accordion>
      <AccordionSummary expandIcon={<ExpandMoreIcon />}>
        <ListItem>
          <ListItemAvatar>
            <Avatar sx={{ bgcolor: 'primary.main' }}>
              <AssignmentIcon />
            </Avatar>
          </ListItemAvatar>
          <ListItemText primary={name} secondary={dueDate} />
        </ListItem>
      </AccordionSummary>
      <AccordionDetails sx={{ bgcolor: 'primary.light' }}>
        <Typography
          variant="body2"
          color="text.secondary"
          sx={{ mt: 1, mb: 1 }}
        >
          Postada em: {date}
        </Typography>
        <Typography gutterBottom>{description}</Typography>
        <Link to={`/activities/${id}`}>
          <Button size="small">Ver detalhes</Button>
        </Link>
      </AccordionDetails>
    </Accordion>
  )
}
