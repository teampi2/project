import * as React from 'react'
import { Link } from 'react-router-dom'

import MuiCard, { CardProps as MuiCardProps } from '@mui/material/Card'
import CardHeader from '@mui/material/CardHeader'
import CardContent from '@mui/material/CardContent'
import Avatar from '@mui/material/Avatar'
import Menu, { MenuProps } from '@mui/material/Menu'
import { styled, alpha } from '@mui/material/styles'

import Truncate from '@/components/Truncate'
import stringToColor from '@/functions/stringToColor'

interface CardProps extends MuiCardProps {
  to: string
  title: string
  subtitle: string
  avatar?: string
  action?: React.ReactNode
  width?: number
}

const StyledAvatar = styled(Avatar)({
  width: 75,
  height: 75,
  float: 'right',
  marginTop: -57.5,
})

export const StyledMenu = styled((props: MenuProps) => (
  <Menu
    elevation={0}
    anchorOrigin={{ vertical: 'bottom', horizontal: 'center' }}
    transformOrigin={{ vertical: 'top', horizontal: 'center' }}
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

const CardComponent: React.FC<CardProps> = ({
  width = 300,
  to,
  title,
  subtitle,
  avatar,
  action,
  ...rest
}) => {
  const bgColor = React.useMemo(() => stringToColor(title), [title])

  const titleWidth = React.useMemo(() => width - 72, [width])
  const subtitleWidth = React.useMemo(() => width - 107, [width])

  return (
    <MuiCard sx={{ position: 'relative' }} {...rest}>
      <Link
        to={to}
        style={{ position: 'absolute', width: '100%', height: 100 }}
      />
      <CardHeader
        title={
          <Truncate
            variant="h6"
            width={titleWidth}
            textTransform="uppercase"
            fontWeight={500}
            color="white"
            gutterBottom
          >
            {title}
          </Truncate>
        }
        subheader={
          <Truncate width={subtitleWidth} variant="body2" color="white">
            {subtitle}
          </Truncate>
        }
        action={action}
        sx={{ bgcolor: bgColor }}
      />
      <CardContent sx={{ height: 137 }}>
        <StyledAvatar src={avatar} />
      </CardContent>
    </MuiCard>
  )
}

export const Card = React.memo(CardComponent)
