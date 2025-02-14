import AppBar from '@mui/material/AppBar'
import Toolbar from '@mui/material/Toolbar'
import Typography from '@mui/material/Typography'
import Avatar from '@mui/material/Avatar'
import Tooltip from '@mui/material/Tooltip'
import IconButton from '@mui/material/IconButton'
import MenuIcon from '@mui/icons-material/Menu'
import useHeader from '@/hooks/useHeader'
import { Link } from 'react-router-dom'

export function Header() {
  const { toggleMenu } = useHeader()

  return (
    <>
      <AppBar
        position="fixed"
        sx={{ zIndex: (theme) => theme.zIndex.drawer + 1 }}
        elevation={0}
      >
        <Toolbar>
          <Tooltip title="Menu">
            <IconButton
              size="large"
              edge="start"
              color="inherit"
              sx={{ mr: 2 }}
              onClick={toggleMenu}
            >
              <MenuIcon />
            </IconButton>
          </Tooltip>
          <Typography variant="h6" component="div" sx={{ flexGrow: 1 }} />
          <Link to="#">
            <Avatar />
          </Link>
        </Toolbar>
      </AppBar>
      <Toolbar />
    </>
  )
}
