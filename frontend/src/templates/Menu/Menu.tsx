import MuiDrawer from '@mui/material/Drawer'
import List from '@mui/material/List'
import ListItem from '@mui/material/ListItem'
import ListItemButton from '@mui/material/ListItemButton'
import ListItemIcon from '@mui/material/ListItemIcon'
import ListItemText from '@mui/material/ListItemText'
import Toolbar from '@mui/material/Toolbar'
import Divider from '@mui/material/Divider'
import HomeIcon from '@mui/icons-material/HomeOutlined'
import SchoolIcon from '@mui/icons-material/SchoolOutlined'
import FactCheckIcon from '@mui/icons-material/FactCheckOutlined'
import SettingsIcon from '@mui/icons-material/SettingsOutlined'
import { styled } from '@mui/material/styles'
import { useLocation, Link } from 'react-router-dom'
import useHeader from '@/hooks/useHeader'

const Drawer = styled(MuiDrawer)({
  '& .MuiDrawer-paper': {
    width: 300,
  },
})

interface ListItemLinkProps {
  to: string
  children: React.ReactNode
}

function ListItemLink(props: ListItemLinkProps) {
  const { to, children } = props
  const { pathname } = useLocation()
  const { toggleMenu } = useHeader()

  return (
    <ListItemButton
      to={to}
      component={Link}
      onClick={toggleMenu}
      selected={pathname == to}
    >
      {children}
    </ListItemButton>
  )
}
export function Menu() {
  const { menu, toggleMenu } = useHeader()

  return (
    <Drawer open={menu} onClose={toggleMenu} anchor="left">
      <Toolbar />
      <Divider />
      <List>
        <ListItem disablePadding>
          <ListItemLink to="/dashboard">
            <ListItemIcon>
              <HomeIcon />
            </ListItemIcon>
            <ListItemText primary="Início" />
          </ListItemLink>
        </ListItem>
        <ListItem disablePadding>
          <ListItemLink to="/classes">
            <ListItemIcon>
              <SchoolIcon />
            </ListItemIcon>
            <ListItemText primary="Turmas" />
          </ListItemLink>
        </ListItem>
        <ListItem disablePadding>
          <ListItemLink to="/activities">
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
          <ListItemLink to="/settings">
            <ListItemIcon>
              <SettingsIcon />
            </ListItemIcon>
            <ListItemText primary="Configurações" />
          </ListItemLink>
        </ListItem>
      </List>
    </Drawer>
  )
}
