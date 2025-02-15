import * as React from 'react'
import MuiCard from '@mui/material/Card'
import CardHeader from '@mui/material/CardHeader'
import CardContent from '@mui/material/CardContent'
import Avatar from '@mui/material/Avatar'
import { styled, alpha } from '@mui/material/styles'
import Menu, { MenuProps } from '@mui/material/Menu'
import { Link } from 'react-router-dom'
import Truncate from '@/components/Truncate'
import stringToColor from '@/functions/stringToColor'

interface CardProps {
  to: string
  title: string
  subtitle: string
  avatar?: string
  action?: React.ReactNode
}

const StyledCard = styled(MuiCard)({
  width: 300,
})

const StyledCardHeader = styled(CardHeader)({
  height: 100,
})

const StyledAvatar = styled(Avatar)({
  width: 75,
  height: 75,
  float: 'right',
  marginTop: -57.5,
})

export const StyledMenu = styled((props: MenuProps) => (
  <Menu
    elevation={0}
    anchorOrigin={{
      vertical: 'bottom',
      horizontal: 'center',
    }}
    transformOrigin={{
      vertical: 'top',
      horizontal: 'center',
    }}
    {...props}
  />
))(({ theme }) => ({
  '& .MuiPaper-root': {
    borderRadius: 6,
    marginTop: theme.spacing(1),
    minWidth: 180,
    color: 'rgb(55, 65, 81)',
    boxShadow:
      'rgb(255, 255, 255) 0px 0px 0px 0px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px, rgba(0, 0, 0, 0.1) 0px 10px 15px -3px, rgba(0, 0, 0, 0.05) 0px 4px 6px -2px',
    '& .MuiMenu-list': {
      padding: '4px 0',
    },
    '& .MuiMenuItem-root': {
      '& .MuiSvgIcon-root': {
        fontSize: 18,
        color: theme.palette.text.secondary,
        marginRight: theme.spacing(1.5),
      },
      '&:active': {
        backgroundColor: alpha(
          theme.palette.primary.main,
          theme.palette.action.selectedOpacity
        ),
      },
    },
    ...theme.applyStyles('dark', {
      color: theme.palette.grey[300],
    }),
  },
}))

export function Card(props: CardProps) {
  const { to, title, subtitle, avatar, action } = props

  return (
    <StyledCard>
      <Link to={to}>
        <StyledCardHeader
          sx={{ bgcolor: stringToColor(title) }}
          title={
            <Truncate
              width={228}
              variant="h6"
              sx={{ textTransform: 'uppercase', fontWeight: 400, mb: 2 }}
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
          action={action}
        />
      </Link>
      <CardContent sx={{ height: 137 }}>
        <StyledAvatar src={avatar} />
      </CardContent>
    </StyledCard>
  )
}
