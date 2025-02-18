import React from 'react'
import MuiDrawer from '@mui/material/Drawer'
import Toolbar from '@mui/material/Toolbar'
import List from '@mui/material/List'
import ListItem from '@mui/material/ListItem'
import ListItemButton from '@mui/material/ListItemButton'
import ListItemIcon from '@mui/material/ListItemIcon'
import ListItemText from '@mui/material/ListItemText'
import Divider from '@mui/material/Divider'
import HomeIcon from '@mui/icons-material/HomeOutlined'
import SchoolIcon from '@mui/icons-material/SchoolOutlined'
import FactCheckIcon from '@mui/icons-material/FactCheckOutlined'
import SettingsIcon from '@mui/icons-material/SettingsOutlined'
import { styled, Theme, CSSObject, useTheme } from '@mui/material/styles'
import useMediaQuery from '@mui/material/useMediaQuery'
import { useLocation, Link } from 'react-router-dom'
import useHeader from '@/hooks/useHeader'

const drawerWidth = 300

const openedMixin = (theme: Theme): CSSObject => ({
  width: drawerWidth,
  transition: theme.transitions.create('width', {
    easing: theme.transitions.easing.sharp,
    duration: theme.transitions.duration.enteringScreen,
  }),
  overflowX: 'hidden',
})

const closedMixin = (theme: Theme): CSSObject => ({
  transition: theme.transitions.create('width', {
    easing: theme.transitions.easing.sharp,
    duration: theme.transitions.duration.leavingScreen,
  }),
  overflowX: 'hidden',
  width: `calc(${theme.spacing(7)} + 1px)`,
  [theme.breakpoints.up('sm')]: {
    width: `calc(${theme.spacing(8)} + 1px)`,
  },
})

interface StyledDrawerProps {
  open: boolean
  variant: 'permanent' | 'temporary'
}

const StyledDrawer = styled(MuiDrawer)<StyledDrawerProps>(
  ({ theme, open, variant }) =>
    variant === 'permanent'
      ? {
          width: drawerWidth,
          flexShrink: 0,
          whiteSpace: 'nowrap',
          boxSizing: 'border-box',
          ...(open
            ? {
                ...openedMixin(theme),
                '& .MuiDrawer-paper': openedMixin(theme),
              }
            : {
                ...closedMixin(theme),
                '& .MuiDrawer-paper': closedMixin(theme),
              }),
        }
      : {
          '& .MuiDrawer-paper': { width: drawerWidth },
        }
)

interface ListItemLinkProps {
  to: string
  children: React.ReactNode
  onClick?: () => void
}

const ListItemLink = ({ to, children, onClick }: ListItemLinkProps) => {
  const { pathname } = useLocation()
  return (
    <ListItemButton
      onClick={onClick}
      component={Link}
      to={to}
      selected={pathname === to}
    >
      {children}
    </ListItemButton>
  )
}

export function Menu() {
  const { openMenu, handleToggleMenu } = useHeader()
  const theme = useTheme()
  const isMobile = useMediaQuery(theme.breakpoints.down('sm'))
  const variant: 'temporary' | 'permanent' = isMobile
    ? 'temporary'
    : 'permanent'

  const handleItemClick = () => {
    if (isMobile) {
      handleToggleMenu()
    }
  }

  const drawerContent = (
    <>
      <Toolbar />
      <List>
        <ListItem disablePadding>
          <ListItemLink to="/dashboard" onClick={handleItemClick}>
            <ListItemIcon>
              <HomeIcon />
            </ListItemIcon>
            <ListItemText primary="Início" />
          </ListItemLink>
        </ListItem>
        <ListItem disablePadding>
          <ListItemLink to="/classes" onClick={handleItemClick}>
            <ListItemIcon>
              <SchoolIcon />
            </ListItemIcon>
            <ListItemText primary="Turmas" />
          </ListItemLink>
        </ListItem>
        <ListItem disablePadding>
          <ListItemLink to="/activities" onClick={handleItemClick}>
            <ListItemIcon>
              <FactCheckIcon />
            </ListItemIcon>
            <ListItemText primary="Pendentes" />
          </ListItemLink>
        </ListItem>
      </List>
      <Divider />
      <List>
        <ListItem disablePadding>
          <ListItemLink to="/settings" onClick={handleItemClick}>
            <ListItemIcon>
              <SettingsIcon />
            </ListItemIcon>
            <ListItemText primary="Configurações" />
          </ListItemLink>
        </ListItem>
      </List>
    </>
  )

  return (
    <StyledDrawer
      hideBackdrop
      open={openMenu}
      variant={variant}
      onClose={handleToggleMenu}
      ModalProps={{ keepMounted: true }}
      sx={{ display: 'block' }}
    >
      {drawerContent}
    </StyledDrawer>
  )
}
