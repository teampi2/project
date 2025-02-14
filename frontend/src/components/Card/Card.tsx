import { Card as MuiCard } from '@mui/material'
import CardHeader from '@mui/material/CardHeader'
import CardContent from '@mui/material/CardContent'
import Avatar from '@mui/material/Avatar'
import Truncate from '@/components/Truncate'
import { Link } from 'react-router-dom'

interface CardProps {
  to: string
  title: string
  subtitle: string
  avatar?: string
}

export function Card(props: CardProps) {
  const { to, title, subtitle, avatar } = props

  return (
    <MuiCard sx={{ width: 300 }}>
      <Link to={to}>
        <CardHeader
          title={
            <Truncate
              width={268}
              variant="h6"
              sx={{ textTransform: 'uppercase', fontWeight: 400 }}
            >
              {title}
            </Truncate>
          }
          subheader={
            <Truncate
              width={193}
              variant="body2"
              sx={{ color: 'text.secondary' }}
            >
              {subtitle}
            </Truncate>
          }
          sx={{
            height: 100,
            display: 'flex',
            flexDirection: 'column',
            justifyContent: 'space-between',
            bgcolor: 'grey.200',
          }}
        />
      </Link>
      <CardContent sx={{ height: 137 }}>
        <Avatar
          src={avatar}
          sx={{ width: 75, height: 75, float: 'right', marginTop: -6 }}
        />
      </CardContent>
    </MuiCard>
  )
}
