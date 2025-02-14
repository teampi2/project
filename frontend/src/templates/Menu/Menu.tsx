import Drawer from '@mui/material/Drawer'
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
import { useLocation, Link } from 'react-router-dom'
import useHeader from '@/hooks/useHeader'

const drawerWidth = 300

export function Menu() {
  const { pathname } = useLocation()
  const { menu, toggleMenu } = useHeader()

  return (
    <Drawer
      sx={{
        width: drawerWidth,
        flexShrink: 0,
        '& .MuiDrawer-paper': {
          width: drawerWidth,
          boxSizing: 'border-box',
        },
      }}
      open={menu}
      hideBackdrop={true}
      onClose={toggleMenu}
      anchor="left"
    >
      <Toolbar />
      <Divider />
      <List>
        <ListItem disablePadding to="/dashboard" component={Link}>
          <ListItemButton selected={pathname == '/dashboard'}>
            <ListItemIcon>
              <HomeIcon />
            </ListItemIcon>
            <ListItemText primary="Início" />
          </ListItemButton>
        </ListItem>
        <ListItem disablePadding to="/turmas" component={Link}>
          <ListItemButton selected={pathname == '/turmas'}>
            <ListItemIcon>
              <SchoolIcon />
            </ListItemIcon>
            <ListItemText primary="Turmas" />
          </ListItemButton>
        </ListItem>
        <ListItem disablePadding>
          <ListItemButton>
            <ListItemIcon>
              <FactCheckIcon />
            </ListItemIcon>
            <ListItemText primary="Pendentes" />
          </ListItemButton>
        </ListItem>
      </List>
      <Divider />
      <List>
        <ListItem disablePadding>
          <ListItemButton>
            <ListItemIcon>
              <SettingsIcon />
            </ListItemIcon>
            <ListItemText primary="Configurações" />
          </ListItemButton>
        </ListItem>
      </List>
    </Drawer>
  )
}
