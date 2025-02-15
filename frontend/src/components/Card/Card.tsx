import MuiCard from '@mui/material/Card'
import CardHeader from '@mui/material/CardHeader'
import CardContent from '@mui/material/CardContent'
import Avatar from '@mui/material/Avatar'
import { styled } from '@mui/material/styles'
import stringToColor from '@/functions/stringToColor'
import Truncate from '@/components/Truncate'
import { Link } from 'react-router-dom'

interface CardProps {
  to: string
  title: string
  subtitle: string
  avatar?: string
}

const StyledCard = styled(MuiCard)({
  width: 300,
})

const StyledCardHeader = styled(CardHeader)({
  height: 100,
  display: 'flex',
  flexDirection: 'column',
  justifyContent: 'space-between',
})

const StyledAvatar = styled(Avatar)({
  width: 75,
  height: 75,
  float: 'right',
  marginTop: -6,
})

export function Card({ to, title, subtitle, avatar }: CardProps) {
  return (
    <StyledCard>
      <Link to={to}>
        <StyledCardHeader
          sx={{ bgcolor: stringToColor(title) }}
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
        />
      </Link>
      <CardContent sx={{ height: 137 }}>
        <StyledAvatar src={avatar} />
      </CardContent>
    </StyledCard>
  )
}
