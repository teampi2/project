import { format } from 'date-fns'
import { ptBR } from 'date-fns/locale'
import Card from '@mui/material/Card'
import CardHeader from '@mui/material/CardHeader'
import CardContent from '@mui/material/CardContent'
import CardActions from '@mui/material/CardActions'
import Avatar from '@mui/material/Avatar'
import IconButton from '@mui/material/IconButton'
import Typography from '@mui/material/Typography'
import Divider from '@mui/material/Divider'
import MoreVertIcon from '@mui/icons-material/MoreVert'
import CommentInput from './CommentInput'

interface AnnouncementProps {
  author: string
  date: Date
  announcement: string
}
export function Announcement(props: AnnouncementProps) {
  const { author, date, announcement } = props

  const dateFormatted = format(date, "d 'de' MMM 'de' yyyy", {
    locale: ptBR,
  })

  return (
    <Card variant="outlined" sx={{ borderRadius: 2 }}>
      <CardHeader
        avatar={<Avatar />}
        action={
          <IconButton aria-label="settings">
            <MoreVertIcon />
          </IconButton>
        }
        title={
          <Typography variant="subtitle2" sx={{ color: 'text.secondary' }}>
            {author}
          </Typography>
        }
        subheader={
          <Typography variant="body2" sx={{ color: 'text.secondary' }}>
            {dateFormatted}
          </Typography>
        }
      />
      <CardContent>
        <Typography variant="body2" sx={{ color: 'text.secondary' }}>
          {announcement}
        </Typography>
      </CardContent>
      <Divider />
      <CardActions sx={{ paddingY: 2, px: 3 }}>
        <CommentInput />
      </CardActions>
    </Card>
  )
}
